<h1>S'INSCRIRE</h1>
<?php
if (isset($_POST['frmInscription'])) {
  $nom = checkInput($_POST['nom']);
  $prenom = checkInput($_POST['prenom']);
  $mail = checkInput($_POST['mail']);
  $psw = checkInput($_POST['password']);
  $erreur = array();
  if ($nom === "")
    array_push($erreur, "Veuillez saisir votre nom");
  if ($prenom === "")
    array_push($erreur, "Veuillez saisir un prénom");
  if ($mail === "")
    array_push($erreur, "Veuillez saisir une adresse mail");
  if ($msg === "")
    array_push($erreur, "Veuillez saisir un mot de passe");
  if (count($erreur) > 0) {
    $message = '<ul>';
    for($i = 0 ; $i < count($erreur) ; $i++) {
      $message .= '<li>';
      $message .= $erreur[$i];
      $message .= '</li>';
    }
    $message .= '</ul>';
    echo $message;
    require 'frmInscription.php';
  }

  else {
    $sqlVerif = "SELECT COUNT(*) FROM clients
    WHERE mail='" . $mail ."'";
    $nbrOccurences = $pdo->query($sqlVerif)->fetchColumn();

    if ($nbrOccurences > 0) {
      echo "Déjà dans la base";
    }

    else {
      $sql = "INSERT INTO clients
      (nom, prenom, mail, message)
      VALUES ('" . $nom . "', '" . $prenom . "', '" . $mail ."', '" . $msg ."')";
      $query = $pdo->prepare($sql);
      $query->bindValue('nom', $nom, PDO::PARAM_STR);
      $query->bindValue('prenom', $prenom, PDO::PARAM_STR);
      $query->bindValue('mail', $mail, PDO::PARAM_STR);
      $query->bindValue('password', $psw, PDO::PARAM_STR);
      $query->execute();
      echo "ENregistrement OK";
    }

    $sql = "INSERT INTO clients
    (nom, prenom, mail, message)
    VALUES ('" . $nom . "', '" . $prenom . "', '" . $mail ."', '" . $msg ."')";
    $query = $pdo->prepare($sql);
    $query->bindValue('nom', $nom, PDO::PARAM_STR);
    $query->bindValue('prenom', $prenom, PDO::PARAM_STR);
    $query->bindValue('mail', $mail, PDO::PARAM_STR);
    $query->bindValue('password', $psw, PDO::PARAM_STR);
    $query->execute();
    echo "ENregistrement OK";
  }
}
else {
  $nom = $prenom = $mail = $psw = "";
  require 'frmInscription.php';
}
