<?php
namespace App\WebSocket;

use Swoft\Http\Message\Server\Request;
use Swoft\Http\Message\Server\Response;
use Swoft\WebSocket\Server\Bean\Annotation\WebSocket;
use Swoft\WebSocket\Server\HandlerInterface;
use Swoole\WebSocket\Frame;
use Swoole\WebSocket\Server;
use Swoft\Bean\Annotation\Inject;

/**
 * Class NoticeController
 * @package App\WebSocket
 * @WebSocket("/notice")
 */
class NoticeController implements HandlerInterface
{
    /**
     * @param Server $server
     * @param Request $request
     * @param int $fd
     * @Inject("JsonReturn")
     */
    private $jsonReturn;

    /**
     * @Inject()
     * @var \Swoft\Redis\Redis
     */
    private $redis;

    /**
     * @Inject("MessageHandler")
     */
    private $MessageHandler;

    /**
     * @param Request $request
     * @param Response $response
     * @return array
     */
    public function checkHandshake(Request $request, Response $response): array
    {
        // TODO: Implement checkHandshake() method.
        return [0, $response];
    }

    /**
     * @param Server $server
     * @param Request $request
     * @param int $fd
     */
    public function onOpen(Server $server, Request $request, int $fd)
    {
        $user_id = $request->query('user_id');
        if (!$user_id){
            //报错
            $server->push($fd,$this->jsonReturn->push('PARAMETER_LOST'));
            //断开连接
            $server->close($fd);
            return ;
        }
        //验签
        $result = $this->MessageHandler->checkSign($request->query('sign'));
	$result = true;
        if (!$result){
            //报错
            $server->push($fd,$this->jsonReturn->push('SIGN_ERROR'));
            //断开连接
            $server->close($fd);
            return ;
        }
        //绑定用户到对象属性
        $server->bind($fd,$user_id);
        //绑定用户到外部存储
        $this->redis->set('fd_'.$fd.':user_'.$user_id,time());
        $server->push($fd, $this->jsonReturn->push('CONNECT_SUCCESS'));
    }

    /**
     * @param Server $server
     * @param Frame $frame
     */
    public function onMessage(Server $server, Frame $frame)
    {
        $this->MessageHandler->handler($server,$frame);
    }

    /**
     * @param Server $server
     * @param int $fd
     * @return mixed|void
     */
    public function onClose(Server $server, int $fd)
    {
        //删除外部存储绑定信息
        $keysArr = $this->redis->keys('*fd_'.$fd.':*');
        if ($keysArr !== []){
            foreach ($keysArr as $key){
                $this->redis->delete(substr($key,8));
            }
        }
    }

}
