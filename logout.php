<?php

// Acción de desloguear
@session_start();
session_destroy();
header("Location: login.php");
// Redirige a login