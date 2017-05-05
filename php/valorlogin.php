<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Echo session variables that were set on previous page
echo "login = " . $_SESSION["$username"] . ".<br>";
if ($_SESSION["$username"]==0)    
		echo "Maior<br>"

?>

</body>
</html>