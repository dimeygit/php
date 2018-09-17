<?php

$user = 'root';
$password = '';
try {
    $db = new PDO('mysql:host=localhost;dbname=test;charset=UTF-8', $user, $password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


