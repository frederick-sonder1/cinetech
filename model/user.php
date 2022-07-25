<?php 

    class User{
        
        public function __construct() {
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

        public function connexion() {
            $host = "localhost:3306";
            $db_name = "frederick-sonder_cinetech";
            $username = "frederick";
            $password = "Besteur1";
            $conn = null;

            $request = "SELECT * FROM utilisateurs";

            $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $stmt = $conn->prepare($request);
            $stmt-> execute();
            $user= $stmt->fetchAll();

            $pseudo= strip_tags($_POST['pseudo']);
            $motdepasse = strip_tags($_POST['motdepasse']);
            
            if (isset($pseudo,$motdepasse) && !empty($pseudo) && !empty($motdepasse)){ 
                foreach($user as $key => $value){ 
                    if ($pseudo == $value['pseudo'] &&  password_verify($motdepasse, $value['mdp'])){
                        if($value['droit_id']=="1"){
                            $_SESSION['user'] = $value;
                            header('Location: admin.php');
                            exit();
                        }
                        else{
                            $_SESSION['user'] = $value;
                            header('Location: ../index.php');
                            exit();
                        }
                    }
                    else{
                        echo "votre mot de passe est incorrect.";
                    }
                }
            }
        }


        public function inscription(){
            $host = "localhost";
            $db_name = "frederick-sonder_cinetech";
            $username = "frederick";
            $password = "Besteur1";
            $conn = null;

            $pseudo= strip_tags($_POST['pseudo']);
            $email = strip_tags($_POST['email']);
            $motdepasse = strip_tags($_POST['motdepasse']);
            $motdepasse2 = strip_tags($_POST['motdepasse2']);

            $request = "SELECT * FROM `utilisateurs` WHERE pseudo = '$pseudo'";

            $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $stmt = $conn->prepare($request);
            $stmt-> execute();
            $user= $stmt->fetchAll();

            $request2 = "SELECT * FROM `utilisateurs` WHERE mail = '$email'";
            $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $stmt = $conn->prepare($request2);
            $stmt-> execute();
            $user2= $stmt->fetchAll();

            if ($motdepasse == $motdepasse2){
                if($pseudo == $user[0]['pseudo']){
                    echo "Ce pseudo est déjà utilisé.";
                }
                elseif($email == $user2[0]['mail']){
                    echo "Cet email est déjà utilisé.";
                }
                else{ 
                    $motdepasse = password_hash(strip_tags($_POST['motdepasse']), PASSWORD_ARGON2I);
                    $request2 = "INSERT INTO `utilisateurs`( `pseudo`, `mail`, `mdp`, `droit_id`) VALUES ('$pseudo', '$email', '$motdepasse','2')";
                    $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                    $stmt = $conn->prepare($request2);
                    $stmt-> execute();
                    echo "Vous êtes inscrit.";
                    header("Location: connexion.php");
                }            
            } 
            else{
                echo "Les mots de passe ne correspondent pas.";
            }
        }

        public function getPseudo($id){

            $host = "localhost:3306";
            $db_name = "frederick-sonder_cinetech";
            $username = "frederick";
            $password = "Besteur1";
            $conn = null;

            $request = "SELECT `pseudo` FROM `utilisateurs` WHERE `id` = '$id'";
            $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $stmt = $conn->prepare($request);
            $stmt-> execute();
            $pseudo = $stmt->fetchAll();
            return $pseudo[0]['pseudo'];

        }

        public function updateuser()
        {
            $host = "localhost:3306";
            $db_name = "frederick-sonder_cinetech";
            $username = "frederick";
            $password = "Besteur1";
            $conn = null;
            $email = strip_tags($_POST['email']);
            $motdepasse = strip_tags($_POST['motdepasse']);
            $motdepasse2 = strip_tags($_POST['motdepasse2']);
            $pseudo= $_SESSION['user']['pseudo'];
            
            if($motdepasse == $motdepasse2){
                $motdepasse = password_hash($motdepasse, PASSWORD_ARGON2I);
                $request = "UPDATE `utilisateurs` SET `mail`='$email',`mdp`='$motdepasse' WHERE `pseudo`='$pseudo' ";
                $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $stmt = $conn->prepare($request);
                $stmt-> execute();
                echo "Votre profil a bien été mis à jour.";
            }
            else{
                echo "Les mots de passe ne correspondent pas.";
            }           
        }

        public function add_Fav(){
            $host = "localhost:3306";
            $db_name = "frederick-sonder_cinetech";
            $username = "frederick";
            $password = "Besteur1";
            $conn = null; 
            $user_id = $_SESSION['user']['id'];

            require_once '../model/commentaire.php';
            $comm= new Commentaire();
            $params = $comm->id_film();

            $request = "SELECT * FROM `favoris` WHERE `user_id` = '$user_id' AND `support_id` = '$params[1]' AND `type` = '$params[0]'";
            $request2 = "INSERT INTO `favoris`( `user_id`, `support_id`, `type`) VALUES ('$user_id','$params[1]','$params[0]')";
            
            $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $stmt = $conn->prepare($request);
            $stmt -> execute();
            $user= $stmt->fetchAll();
            
            if(!empty($_SESSION['user'])){
                if(empty($user)){
                    $stmt = $conn->prepare($request2);
                    $stmt -> execute();
                    echo "Film ajouté aux favoris.";
                }
                else{
                    echo "Film déjà dans les favoris.";
                }
            }
        }

        public function delet_fav(){
            $host = "localhost:3306";
            $db_name = "frederick-sonder_cinetech";
            $username = "frederick";
            $password = "Besteur1";
            $conn = null; 
            $user_id = $_SESSION['user']['id'];

            require_once '../model/commentaire.php';
            $comm= new Commentaire();
            $params = $comm->id_film();
              
            $request = "SELECT * FROM `favoris` WHERE `user_id` = '$user_id' AND `support_id` = '$params[1]' AND `type` = '$params[0]'";
            $request2 = "DELETE FROM `favoris` WHERE `user_id` = '$user_id' AND `support_id` = '$params[1]' AND `type` = '$params[0]'";
            
            $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $stmt = $conn->prepare($request);
            $stmt-> execute();
            $user = $stmt->fetchAll();
            
            if(!empty($user)){
                $stmt2 = $conn->prepare($request2);
                $stmt2-> execute();
                echo "Film supprimé des favoris.";
            }
            else{
                echo " Ce film n'est pas dans les favoris.";
            }
        }
    }
?>