<?php
    class Admin{
        
        public function __construct(){
            $host = "localhost:3306";
            $db_name = "frederick-sonder_cinetech";
            $username = "frederick";
            $password = "Besteur1";
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
    }
?>