<?php
const DB_HOST = '127.0.0.1';
const DB_NAME = 'escuela';
const DB_USER = 'root';
const DB_PASS = ''; 

function db(): PDO {
  $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.'; charset=utf8mb4';
  
  $opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
  ];

  return new PDO($dsn, DB_USER, DB_PASS, $opt);
}

function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
?>