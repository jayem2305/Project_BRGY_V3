<?php
$host = 'sql104.infinityfree.com';
$db = 'if0_37261226_barangayproject';
$user = 'if0_37261226';
$pass = '8hGH0DMUo43w';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to the database successfully!";
} catch (PDOException $e) {
    echo "Database connection error: " . $e->getMessage();
}
