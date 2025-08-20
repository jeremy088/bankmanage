
<?php
try {
    // Chemin vers le fichier SQLite (il sera créé s'il n'existe pas)
    $db = new PDO('sqlite:compte.db');

    // Activer les erreurs PDO
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     include("config.php");
 
        $nom = $_POST['nom']??'';
  $email = $_POST['email']??'';
        $prenom=$_POST['prenom']??'';
    //    $photo=$_POST['photo']??'';
       $passwd=$_POST['passwd']??'';
    $passwd1=$_POST['passwd1']??'';
       include("verifier.php");
            if(strlen($passwd)<8 || strlen($passwd1)<8){
        echo"Le mot de passe doit contenir au moins 8 caractères";
            
         exit;   
        }
    
    if(!($passwd==$passwd1)){
        echo"Les mots de passe que vous avez entré sont différents ,verifier svp !";
        exit;
    }
    
   
        // Préparer la requête pour éviter les injections SQL
        $stmt = $db->prepare("INSERT INTO utilisateurs (email,nom,prenom,passwd) VALUES (:email,:nom, :prenom,:passwd)");
    $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
    
//       $stmt->bindParam(':photo', $photo);
       $stmt->bindParam(':passwd', $passwd);
        $stmt->execute();
        print"OK";
/*    } else {
        echo "Veuillez remplir tous les champs.";
    }
*/
$db = new PDO('sqlite:compte.db');
$stmt = $db->query("SELECT * FROM utilisateurs");

/*while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: " . $row['id'] . " - Nom: " . $row['nom'] . " - Email: " . $row['email'] . "<br>";
}*/

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

