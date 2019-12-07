<h1>CONTACTS</h1>

<?php
if (isset($_POST['frmContact'])) {
  echo "<td align=centre>Je viens du formulaire</td>";
}

else {
  echo "Je viens du futur";
}

require 'frmContact.php';
