<?php
/* start session */
session_start();

/* logout user */
session_unset();
session_destroy();
header("Location: login.php");
exit();
?>
