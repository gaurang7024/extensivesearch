<html>

<form method="POST" action="newfile.php">
<input type="text" name="hello">
<input type="submit" name="submit">
</html>

<?php
include "dbkeymgr.php";
include "clean.php";
$a = $_POST['hello'];
echo cleanString($a);

?>