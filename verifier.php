<?php
try{
    $db =new PDO( "sqlite:compte.db");

$db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 include("config.php");
    $email = $_POST['email'] ?? '';


    // Chercher l'utilisateur par email
    $stmt = $db->prepare("SELECT * FROM utilisateurs WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user) {
        echo"L'adresse email que vous avez saisie est déjà associée à un compte , veuillez verifier svp";
        exit();
    }

} catch (PDOException $e) {
    echo "Erreur SQLite : " . $e->getMessage();
}
?> 
