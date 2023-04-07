<?php
    session_start();
    session_destroy();
    header("location: /gete/pages/login.php");
?>