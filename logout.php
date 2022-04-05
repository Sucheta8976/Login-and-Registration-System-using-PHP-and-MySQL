<?php
session_start();
unset($_Session['sess_user']);
session_destroy();
header("location:login.php");

?>