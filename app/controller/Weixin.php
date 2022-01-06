<?php
namespace app\controller;

use Error;
use Exception;
use app\model\Counters;
use think\response\Json;
use think\facade\Log;

class Weixin
{
    public function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        
        $token = 'PArnMjT048vw7GJ5';
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, 2);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
        
        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
}
