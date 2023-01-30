<?php 

// Inclusion des dépendances
require '../config.php';
require '../lib/functions.php';

// Récupération et validation de l'id de l'URL
if (!array_key_exists('id', $_GET) || !ctype_digit($_GET['id'])) {
    http_response_code(404);
    echo 'Erreur : produit introuvable';
    exit;
} 

$id = $_GET['id'];

// @TODO l'id existe-t-il bien ?

// Connexion à la base de données
$pdo = getPDOConnection();

// Traitement du formulaire de réservation
if (!empty($_POST)) {

    // Récupération des données du formulaire
    $message = $_POST['message'];

    // @TODO validation

    // Enregistrement
    $sql = 'UPDATE produit SET reservation_text	= ? WHERE id_produit = ?';
    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute([$message, $id]);

    // Redirection
    header('Location: product.php?id=' . intval($id));
    exit;
}

// Sélection du produit à afficher
$sql = 'SELECT * FROM produit WHERE id_produit = ?';
$pdoStatement = $pdo->prepare($sql);
$pdoStatement->execute([$id]);

$product = $pdoStatement->fetch();

// Inclusion du template
$template = 'product';
include '../templates/base.phtml';