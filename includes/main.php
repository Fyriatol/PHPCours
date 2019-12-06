<main>

<?php

$page = isset ($_GET['page']) ? $_GET['page'] : 'accueil';

if (isset($_GET['page'])) {
  $page = $_GET['page'];
}

else {
  $page = 'accueil';
}

$liste=glob("./includes/*.inc.php");
$page ="./includes/" . $page . ".inc.php";

if (in_array($page, $liste)) {
  require $page;
}

else {
  require "./includes/accueil.inc.php";
}
 ?>

</main>
