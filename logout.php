<?php

ob_start();
session_start();

$_SESSION['user'] = null;
header("Location: login.php");