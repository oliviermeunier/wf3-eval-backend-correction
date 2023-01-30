<?php 


// Si le formulaire est soumis...

use App\Model\ProductModel;

const IMAGE_FOLDER = 'images';

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
    $filename = '';

    // Gestion de l'image le cas échéant
    if (isset($_FILES['image']) && $_FILES['image']['name']) {

        // @TODO validation de l'image : poids max et type de fichier

        // On clean le nom du fichier
        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $filename = slugify(explode('.', $_FILES['image']['name'])[0]) . uniqid() . '.' . $extension;

        // On vérifie que le dossier 'images' existe, sinon on le crée
        if(!file_exists(IMAGE_FOLDER)) {
            mkdir(IMAGE_FOLDER);
        }

        // On copie le fichier temporaire dans le dossier de destination
        move_uploaded_file($_FILES['image']['tmp_name'], IMAGE_FOLDER . '/' . $filename);
    }

    // Enregistrement
    $productModel = new ProductModel();
    $productModel->insert($title, $description, $price, $city, $postalCode, $filename);

    // Redirection vers la page d'accueil
    header('Location: index.php');
    exit;
}

// Inclusion du template
$template = 'add-product';
include '../templates/base.phtml';