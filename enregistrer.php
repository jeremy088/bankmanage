
<?php
try {
    // Chemin vers le fichier SQLite (il sera créé s'il n'existe pas)
    $database = new PDO('sqlite:compte.db');

    // Activer les erreurs PDO
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Connexion réussie !";

    // Exemple : créer une table
/*    $database->exec("CREATE TABLE IF NOT EXISTS utilisateurs (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
        nom TEXT,
      prenom TEXT,
        email TEXT,
    passwd  TEXT
    )");*/
    
 // Vérifier si le formulaire a été soumis
/*    if(isset($_POST['nom']) && isset($_POST['email'] && isset($_POST['prenom']) &&isset($_POST['photo'])&&isset($_POST['passwd'])&&isset($_POST['passwd1'])) {
  
  if ($_POST['nom']===null || $_POST['nom']==""||$_POST['email']===null || $_POST['email']==""||$_POST['passwd']===null || $_POST['passwd']==""||$_POST['passwd1']===null || $_POST['passwd1']==""){
            echo "<script>
  alert('Tous les champs sont obligatoires!'); 
  </script>";
    exit("");
  }
         /*if ($_POST['passwd']!= $_POST['passwd1']){
echo "<scr"i*/
        $nom = $_POST['nom']??'';
  $email = $_POST['email']??'';
        $prenom=$_POST['prenom']??'';
    //    $photo=$_POST['photo']??'';
       $passwd=$_POST['passwd']??'';
        
        // Préparer la requête pour éviter les injections SQL
        $stmt = $database->prepare("INSERT INTO utilisateurs (nom,prenom,email,passwd) VALUES (:nom, :prenom,:email,:passwd)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
//       $stmt->bindParam(':photo', $photo);
       $stmt->bindParam(':passwd', $passwd);
        $stmt->execute();
        echo "<script>
  alert('Utilisateur enregistré avec succès !'); 
  </script>";
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

