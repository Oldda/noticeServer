<?php
namespace App\Tools;

use Swoft\Bean\Annotation\Bean;
use Swoft\Bean\Annotation\Inject;
/**
 * Class CustomTool
 * @package App\Tools
 * @Bean("UserFdTool")
 */
class UserFdTool
{
    /**
     * @Inject()
     * @var \Swoft\Redis\Redis
     */
    private $redis;

    public function getUidByFd($fd):array
    {
        $uid = [];
        $keysArr = $this->redis->keys('fd_'.$fd.':*');
        if ($keysArr !== []){
            foreach ($keysArr as $key){
                $arr = explode(':',$key);
                $uid[] = substr($arr[1],5);
            }
        }
        return $uid;
    }

    public function getFdByUid($uid):array
    {
        $fd = [];
        $keysArr = $this->redis->keys('*:user_'.$uid);
        if ($keysArr !== []){
            foreach ($keysArr as $key){
                $arr = explode(':',$key);
                $fd[] = substr($arr[0],11);
            }
        }
        return $fd;
    }
}