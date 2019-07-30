<?php
namespace App\Tools;

use Swoft\Bean\Annotation\Bean;
/**
 * Class JsonReturn
 * @package App\Tools
 * @Bean("JsonReturn")
 */
class JsonReturn
{
    /**
     * @param string $str
     * @param array $data
     * @return string
     */
    public function push($str = '',$data = [])
    {
        $config = config('json_return');
        if( array_key_exists ($str,$config)){
            if ($data){
                $config[$str]['data'] = $data;
            }
            return json_encode($config[$str],JSON_UNESCAPED_UNICODE);
        }
        return json_encode(['status'=>false,'response_code'=>10000,'msg'=>'未知错误！'],JSON_UNESCAPED_UNICODE);
    }
}
