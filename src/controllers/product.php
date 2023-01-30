<?php 

// Récupération et validation de l'id de l'URL

use App\Model\ProductModel;

if (!array_key_exists('id', $_GET) || !ctype_digit($_GET['id'])) {
    http_response_code(404);
    echo 'Erreur : produit introuvable';
    exit;
} 

$id = $_GET['id'];

// @TODO l'id existe-t-il bien ?

// Création du modèle
$productModel = new ProductModel();

// Traitement du formulaire de réservation
if (!empty($_POST)) {

    // Récupération des données du formulaire
    $message = $_POST['message'];

    // @TODO validation

    // Enregistrement
    $productModel->book($message, $id);

    // Redirection
    header('Location: /product?id=' . intval($id));
    exit;
}

// Sélection du produit à afficher

$product = $productModel->getOneById($id);

// Inclusion du template
$template = 'product';
include '../templates/base.phtml';