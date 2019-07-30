<?php
return [
    //websocket服务器返回
    'PARAMETER_LOST' => [
        'status'   =>  false,
        'err_code' =>  100,
        'msg'      =>  '参数缺失',
    ],
    'PARAMETER_FORMAT_ERROR' => [
        'status'   =>  false,
        'err_code' =>  101,
        'msg'      =>  '参数格式错误',
    ],
    'CONNECT_SUCCESS' => [
        'status'   =>  true,
        'err_code' =>  200,
        'msg'      =>  '连接成功',
    ],
    //restApi服务器返回
    'USER_NOT_CONNECT' => [
        'status'   =>  false,
        'err_code' =>  1000,
        'msg'      =>  '该用户未连接',
    ],
    'PUSH_SUCCESS' => [
        'status'   =>  true,
        'err_code' =>  201,
        'msg'      =>  '发送消息成功！',
    ],
    'PUSH_FAILD' => [
        'status'   =>  false,
        'err_code' =>  1001,
        'msg'      =>  '发送消息成功！',
    ],
    'SIGN_ERROR' => [
        'status'   =>  false,
        'err_code' =>  1002,
        'msg'      =>  '签名错误！',
    ],
];