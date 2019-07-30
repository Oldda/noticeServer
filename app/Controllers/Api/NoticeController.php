<?php
namespace App\Controllers\Api;

use Swoft\Http\Message\Server\Request;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Http\Server\Bean\Annotation\RequestMethod;
use Swoft\Bean\Annotation\Inject;

/**
 * Class NoticeController
 * @package App\Controllers\Api
 * @Controller(prefix="/notice")
 */
class NoticeController
{
    /**
     * @Inject("JsonReturn")
     */
    private $jsonReturn;

    /**
     * @Inject()
     * @var \Swoft\Redis\Redis
     */
    private $redis;

    /**
     * @Inject("UserFdTool")
     */
    private $userFdTool;
    /**
     * @param Request $request
     * @RequestMapping(route="push",method={RequestMethod::POST})
     */
    public function push(Request $request)
    {
        $user_id = $request->post('user_id');
        $data = $request->post('msg');
        $fdArr = $this->userFdTool->getFdByUid($user_id);
        if ($fdArr !== []){
            \Swoft::$server->sendToSome($data,$fdArr);
            return $this->jsonReturn->push('PUSH_SUCCESS');
        }
        return $this->jsonReturn->push('PUSH_FAILD');
    }
}