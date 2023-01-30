<?php 

// Inclusion des dépendances
require '../config.php';
require '../lib/functions.php';

// Sélection des produits
$pdo = getPDOConnection();

$sql = 'SELECT * FROM produit ORDER BY created_at DESC';
$pdoStatement = $pdo->prepare($sql);
$pdoStatement->execute();

$products = $pdoStatement->fetchAll();

// Inclusion du template
$template = 'all-products';
include '../templates/base.phtml';