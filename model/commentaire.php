<?php

// namespace App\Models;

class Commentaire{

    public function __construct(){
        $host = "localhost";
        $db_name = "cinetech";
        $username = "root";
        $password = "";
        $conn = null;

        try{   
            $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }

        catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
    }

    function id_film(){
        $r = $_SERVER['REQUEST_URI']; 
        $r = explode('?', $r);
        // $r = explode('=', $r)
        $r = array_filter($r);
        $r = array_merge($r, array()); 

        $endofurl = $r[1];

        $endofurl = explode('=', $endofurl);
        $endofurl = array_filter($endofurl);
        $endofurl = array_merge($endofurl, array());
        $key = $endofurl[0];
        $value = $endofurl[1];
        $value = (int)$value;   

        return $endofurl;
    }

    public function commentaire(){
        $host = "localhost";
        $db_name = "cinetech";
        $username = "root";
        $password = "";
        $conn = null;

        $user_id = $_SESSION['user']['id'];
        $com = strip_tags($_POST['commentaire']);

        $comm= new Commentaire();
        $params = $comm->id_film();

        $request = "INSERT INTO `commentaires`(`user_id`, `commentaire`, `support_id`,`type`) VALUES ('$user_id','$com','$params[1]','$params[0]')";

        $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $stmt = $conn->prepare($request);
        $stmt-> execute(); 
    }

        public function get_commentaires(){
            $host = "localhost";
            $db_name = "cinetech";
            $username = "root";
            $password = "";
            $conn = null;      

            $comm= new Commentaire();
            $params = $comm->id_film();

            $request = "SELECT * FROM `commentaires` WHERE `type` = '$params[0]' AND `support_id` = '$params[1]'";

            $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $stmt = $conn->prepare($request);
            $stmt-> execute();
            $result = $stmt->fetchAll(); 
            return $result; 
        }
}
?>