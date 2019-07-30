<?php
namespace App\Tools;


use App\Models\Entity\LoginLogs;
use Swoft\Bean\Annotation\Bean;
use Swoft\Bean\Annotation\Inject;
use Swoft\Db\Db;
use Swoft\Db\Query;

/**
 * Class MessageHandler
 * @package App\Tools
 * @Bean("MessageHandler")
 */
class MessageHandler
{
    /**
     * @param Server $server
     * @param Request $request
     * @param int $fd
     * @Inject("JsonReturn")
     */
    private $jsonReturn;

    /**
     * @Inject("UserFdTool")
     */
    private $userFdTool;

    //处理客户端发来的消息
    public function handler($server,$frame)
    {
        $content = json_decode($frame->data,true);
        if (!$content || !isset($content['Type']) || !isset($content['Sign'])){
            $server->push($frame->fd,'内容解析错误！');
        }
        //验签
        $result = $this->checkSign($content['Sign']);
        if (!$result){
            //报错
            $server->push($frame->fd,$this->jsonReturn->push('SIGN_ERROR'));
            //断开连接
            $server->close($frame->fd);
            return ;
        }
        switch ($content['Type']){
            case 'Heartbeat'://心跳
                $server->push($frame->fd,'pong');
                break;
            case 'Transform': //消息转发
                $this->TransformHandler($server,$content,$frame->fd);
                break;
            case 'Statistics': //系统统计
                $this->StatisticsHandler($server,$content,$frame->fd);
                break;
            default:
                $server->push($frame->fd, '不支持的类型！');
                break;
        }
    }
    //处理消息转发
    private function TransformHandler($server,$data,$from_fd)
    {
        //消息记录
        //todo...
        if ($data['ToUid'] === 'all'){ //推送给所有人
            $list = $server->getClientList();
            foreach ($list as $l){
                $server->push($l,$data['Data']);
            }
        }else{//推送给部分用户
            if (is_array($data['ToUid'])){
                foreach ($data['ToUid'] as $uid){
                    //获取fd
                    $fds = $this->userFdTool->getFdByUid($uid);
                    //发送消息
                    foreach ($fds as $fd){
                        $from_uid = $this->userFdTool->getUidByFd($from_fd); //消息发送者id
                        $data['Data']['from_uid'] = $from_uid[0];
                        $server->push($fd,$data['Data']);
                    }
                }
            }else{
                $server->push($from_fd,$this->jsonReturn->push('PARAMETER_FORMAT_ERROR'));
            }
        }
    }

    //系统统计处理
    private function StatisticsHandler($server,$data,$from_fd)
    {
        $server->push($from_fd,$server->getClientList());
    }

    //验证签名
    public function checkSign($sign)
    {
        //验证签名-简单版
        $has = Db::query('select * from login_logs where deleted_at is null and login_token = "'.$sign.'"')->getResult();
        if (!$has){
            return false;
        }
        return true;
    }
}