<?php
require_once('../db/dbAdapter.php');
class TokenRepository{

    private const string symbols = "abcdefghijklmnopqrstuvwxyz1234567890";

    public static function GetURL(string $token): string
    {
        return (new \dbAdapter())->GetURL($token);
    }

    public static function GenerateToken() : string{
        $lastToken = (new \dbAdapter())->GetLastToken();
        $newToken = $lastToken;

        if ($lastToken == ''){
            return 'aaaaaaa';
        }

        for($i = 6; $i >= 0; $i--){
            $char = $lastToken[$i];
            if ($char == '0'){
                $newToken = substr_replace($newToken, self::symbols[0], $i, 1);
            }
            else{
                $newToken = substr_replace($newToken, self::symbols[strripos(self::symbols, $char)+1], $i, 1);
                break;
            }
        }

        return $newToken;
    }

    public static function IsAvailable(string $token) : bool
    {
        $currentTime = mktime(date('H'), date('i'), 0, date("m"),   date("d"),   date("Y"));

        $formattedCurrentTime = date('Y-m-d H:i:s', $currentTime);
        $tokenTime = (new \dbAdapter())->CheckTime($token);

        return $formattedCurrentTime < $tokenTime;
    }

}