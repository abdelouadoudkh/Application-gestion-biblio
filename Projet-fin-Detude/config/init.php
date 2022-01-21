<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'config.php';
include 'db.php';
include 'common.php';





?>