<?php
    if( ! isset($_SESSION)) session_start();
    session_destroy();
    setcookie(session_name(), "", time() - 3600, "/");
    header("location: ../../index.php");