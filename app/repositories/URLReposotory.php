<?php

class URLReposotory
{
    public static function SaveURL(string $url,string $token,int $liveTime): void{
        $time = mktime(date('H')+$liveTime, date('i'), 0, date("m"),   date("d"),   date("Y"));
        $formattedTime = date('Y-m-d H:i:s', $time);
        (new \dbAdapter())->SetData($url, $token, $formattedTime);
    }
}