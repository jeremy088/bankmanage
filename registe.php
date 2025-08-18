
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="CONTENT-TYPE" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Formulaire</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
   <div class="form-container">
    <h2>Inscription</h2>
    <form>
      <div class="input-group">
        <input name ="nom" id="nom" type="text" required>
        <span class="highlight"></span>
        <label>Nom de famille</label>
      </div>

              <div class="input-group">
        <input name ="prenom" id="prenom" type="text" required>
        <span class="highlight"></span>
        <label>Prénom</label>
      </div>

      <div class="input-group">
        <input id="email" name="email" type="email" required>
        <span class="highlight"></span>
        <label>Email</label>
      </div>

      <div class="input-group">
        <input id ="passwd" name="passwd"type="password" required>
        <span class="highlight"></span>
        <label>Mot de passe</label>
      </div>

              <div class="input-group">
        <input id ="passwd1" name="passwd1"type="password" required>
        <span class="highlight"></span>
        <label>Confirmer le mot de passe</label>
      </div>

      <input class="btn" onclick ="enregistrer()"id ="sinscrire"type="submit" value="S'inscrire"/>
    </form>
      <script>
        function enregistrer() {
    const email = document.getElementById("email").value.trim();
    const passwd = document.getElementById("passwd").value;
   const nom = document.getElementById("nom").value;  
const prenom = document.getElementById("prenom").value;    
// const nom = document.getElementById("nom").value;             

    if(email === "" || passwd === "") {
        alert("❌ Veuillez remplir tous les champs !");
        return;
    }

    // Envoyer les données au serveur
    fetch('enregistrer.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: `email=${encodeURIComponent(email)}&passwd=${encodeURIComponent(passwd)}&nom=${encodeURIComponent(nom)}&prenom=${encodeURIComponent(prenom)}`
    })
    .then(response => response.text())
    .then(data => alert(data)) // affiche le message comme JOptionPane
    .catch(error => alert("Erreur : " + error));
}
        
        </script>  
        
    </form>
      <br>
             <button onclick="index.html" value="Se connecter"></button>
  </div>

</body>
</html>
