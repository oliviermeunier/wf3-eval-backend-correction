<?php 

// Inclusion des dépendances
require '../config.php';
require '../lib/functions.php';

// Si le formulaire est soumis...
if (!empty($_POST)) {

    // Récupération des données
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $city = $_POST['city'];
    $postalCode = $_POST['postal-code'];

    // @TODO Validation

    // Autres traitements
    $price *= 100;

    // Enregistrement
    $pdo = getPDOConnection();
    $sql = 'INSERT INTO produit 
            (title, description, price, city, postal_code, created_at)
            VALUES (?,?,?,?,?, NOW())';
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute([$title, $description, $price, $city, $postalCode]);

    // Redirection vers la page d'accueil
    header('Location: index.php');
    exit;
}

// Inclusion du template
$template = 'add-product';
include '../templates/base.phtml';