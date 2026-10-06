<?php
require __DIR__ . '/config/auth.php';
requireLogin();

$role = $_SESSION['user']['role'];
$redirects = [
    'registrar' => '/registrar/dashboard.php',
    'cashier' => '/cashier/dashboard.php',
    'library' => '/library/dashboard.php',
    'attendance' => '/attendance/dashboard.php',
    'grading' => '/grading/dashboard.php',
];

header('Location: ' . $redirects[$role]);
exit;
