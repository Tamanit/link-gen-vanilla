<?php
require_once('../repositories/TokenRepository.php');
class TokenController
{
    public static function GetURL(string $token) : string {
        if (!TokenRepository::IsAvailable($token)){
            return '';
        }
        return (TokenRepository::GetURL($token));
    }
}