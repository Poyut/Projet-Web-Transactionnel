<?php

$_SESSION = array();

if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() -42000, '/');
}
    session_destroy();
    var_dump($_SESSION);
    header("Location: https://moderma.zonedns.education");
?>