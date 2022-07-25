<?php 
session_start();
    function favoris(){
			$host = "localhost:3306";
            $db_name = "frederick-sonder_cinetech";
            $username = "frederick";
            $password = "Besteur1";
            $conn = null; 
            $user_id = $_SESSION['user']['id'];

            $request = "SELECT * FROM `favoris` WHERE `user_id` = '$user_id'";
            
            $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $stmt = $conn->prepare($request);
            $stmt-> execute();

            $user = $stmt->fetchAll();
            echo json_encode($user);    
    }
    favoris();
?>