<?php
require_once('../repositories/TokenRepository.php');
require_once ('../repositories/URLReposotory.php');
class URLController
{
    private const string returnableUrl = "http://localhost/token/";
    private const int liveTime = 12;
    static function getNewToken(string $url) : array{
        $token = TokenRepository::GenerateToken();
        URLReposotory::SaveURL($url, $token, self::liveTime);
        return ['token' => self::returnableUrl.$token];
    }
}