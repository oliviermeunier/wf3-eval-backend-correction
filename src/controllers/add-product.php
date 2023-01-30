<?php 


// Si le formulaire est soumis...

use App\Model\ProductModel;

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
    $productModel = new ProductModel();
    $productModel->insert($title, $description, $price, $city, $postalCode);

    // Redirection vers la page d'accueil
    header('Location: index.php');
    exit;
}

// Inclusion du template
$template = 'add-product';
include '../templates/base.phtml';