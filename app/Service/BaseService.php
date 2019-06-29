<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2017/12/30
 * Time: 12:16
 */

namespace App\Service;


class BaseService{

    public function returnArray($array,$token = ''){
        if(isset($array['data'])) {
            $array['error'] = '';
            $code = 200;
        } elseif (isset($array['error'])) {
            $code = 400;
            $array['data'] = '';
        }
        return [
            'code'  => $code,
            'token' =>  $token,
            'data'  => $array['data'],
            'error' => $array['error']
        ];
    }
}