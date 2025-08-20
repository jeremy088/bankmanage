<?php
try{
    $db =new PDO( "sqlite:compte.db");

$db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 include("config.php");
    $email = $_POST['email'] ?? '';
    $passwd = $_POST['passwd'] ?? '';

    if($email === '' || $passwd === '') {
        exit("❌ Veuillez remplir tous les champs !");
    }

    // Chercher l'utilisateur par email
    $stmt = $db->prepare("SELECT * FROM utilisateurs WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user) {
        // Vérifier le mot de passe (si stocké en clair)
        if($user['passwd'] === $passwd) {
            print"OK";
            
        } else {
            echo "❌ Mot de passe incorrect !";
            
        }
    } else {
        echo "❌ Aucun compte associé à cet email !";
        
    }

} catch (PDOException $e) {
    echo "Erreur SQLite : " . $e->getMessage();
}
?> 