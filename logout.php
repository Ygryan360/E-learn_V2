<?php
session_start();
session_destroy();
session_unset();
require_once './functions.php';
$url = 'index.php';
redirectToUrl($url);