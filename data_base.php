<?php
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=football_clubs', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $pdo->prepare('SELECT * FROM clubs');
    $statement->execute();
    $clubs = $statement->fetchAll(PDO::FETCH_ASSOC);
    $club_in_db = false;
    function fetch_from_base()
    {
        global $pdo;
        global $search;
        $stmt = $pdo->prepare('SELECT * FROM clubs');
        $stmt->execute();
        $added = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($added as $club){
            if(str_contains(strtolower($club["club"]), strtolower($search))){
                return $club;
            }
        }
    }
    function search_in_db()
    {
        global $clubs;
        global $search;
        global $club_in_db;
        if($clubs != null){
            foreach($clubs as $club){
                if(str_contains(strtolower($club["club"]), strtolower($search))){
                    $club_in_db = true;
                    return $club;
                }
            }
            if(!$club_in_db){
                require_once './helper.php';
                $club_in_db = false;
                return fetch_from_base();
            }
        }else {
            require_once './helper.php';
            return fetch_from_base();
        }
    }