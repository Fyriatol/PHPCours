<?php
function checkInput($chaine) {
  return htmlspecialchars(addslashes(urldecode(trim($chaine))));
}
