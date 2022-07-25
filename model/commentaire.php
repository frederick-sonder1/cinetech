<?php

// namespace App\Models;

class Commentaire{

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
			$host = "localhost:3306";
            $db_name = "frederick-sonder_cinetech";
            $username = "frederick";
            $password = "Besteur1";
        $conn = null;
		
  		if(isset($_SESSION['user'])){

            $user_id = $_SESSION['user']['id'];
            $str = $_POST['commentaire'];
            $com = htmlentities($str);


            $comm= new Commentaire();
            $params = $comm->id_film();

            $request = "INSERT INTO `commentaires`(`user_id`, `commentaire`, `support_id`,`type`) VALUES (?,?,?,?)";
            
            $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $stmt = $conn->prepare($request);
            $stmt-> execute(array($user_id,$com,$params[1],$params[0])); 
        }
        else{
            echo "Vous devez être connecté pour commenter";
        }
    }

        public function get_commentaires(){
			$host = "localhost:3306";
            $db_name = "frederick-sonder_cinetech";
            $username = "frederick";
            $password = "Besteur1";
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
	   public function getAllComments() {
        $host = "localhost:3306";
            $db_name = "frederick-sonder_cinetech";
            $username = "frederick";
            $password = "Besteur1";
        $conn = null; 

        $request = "SELECT * FROM `utilisateurs` INNER JOIN `commentaires` ON  utilisateurs.id = commentaires.user_id";
        
        $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $stmt = $conn->prepare($request);
        $stmt-> execute();
        $result = $stmt->fetchAll(); 

        return $result;
    }

    public function deletcom($id){
       $host = "localhost:3306";
            $db_name = "frederick-sonder_cinetech";
            $username = "frederick";
            $password = "Besteur1";
        $conn = null;

        $requ = "DELETE FROM `commentaires` WHERE `id`= $id  ";

        $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
        $stmt = $conn->prepare($requ);
        $stmt-> execute();

    }
}
?>