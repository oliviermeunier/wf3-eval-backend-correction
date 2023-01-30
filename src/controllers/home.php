<?php 

use App\Model\ProductModel;

// Flash messages
$flashMessage = fetchFlash();

// Sélection des produits
$productModel = new ProductModel();
$products = $productModel->getAll(15);

// Inclusion du template
$template = 'home';
include '../templates/base.phtml';