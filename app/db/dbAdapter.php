<?php

class dbAdapter
{
    private PDO $db;
    private const string connectionString = 'pgsql:host=db;port=5432;dbname=postgres;user=root;password=root';

    public function __construct(){
        $this
            ->db = new PDO(self::connectionString);
    }

    function GetLastToken() : string {
        $result = $this->db->prepare('SELECT token FROM urls ORDER BY id DESC LIMIT 1');
        $result->execute();
        $row = $result->fetchColumn();
        return $row !== false ? $row : "";
    }

    function SetData(string $url, string $token, $time): bool{
        $query = $this->db->prepare("INSERT INTO urls (url, token, time_expire) VALUES (:gettedURL, :gettedToken, :gettedTime)");

        $query->bindParam(':gettedURL', $url);
        $query->bindParam(':gettedToken', $token);
        $query->bindParam(':gettedTime', $time);
        return $query->execute();
    }

    function GetURL(string $token): string{
        $query = $this->db->prepare("SELECT url FROM urls where token=:gettedToken LIMIT 1");
        $query->bindParam(':gettedToken', $token);
        $query->execute();
        $row = $query->fetchColumn();
        return $row !== false ? $row : "";
    }

    function CheckTime(string $token): string{
        $query = $this->db->prepare("SELECT time_expire FROM urls where token=:gettedToken LIMIT 1");
        $query->bindParam(':gettedToken', $token);
        $query->execute();
        $row = $query->fetchColumn();
        return $row !== false ? $row : "";
    }
}