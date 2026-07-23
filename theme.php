<?php
/* save theme */
$theme = $_GET["theme"];

setcookie("theme", $theme, time() + (30 * 24 * 60 * 60));

header("Location: index.php");
exit();
?>
