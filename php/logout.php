<?php
session_start();
include 'db_const.php';
session_unset();
session_destroy();
session_write_close();

setcookie('uPass','',time()-3600,'/');
setcookie('uName','',time()-3600,'/');

header('location:'.BASE_URL.'logoutPage.php');

?>