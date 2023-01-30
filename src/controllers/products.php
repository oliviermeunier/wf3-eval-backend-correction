<?php 

use App\Model\ProductModel;

// Sélection des produits
$productModel = new ProductModel();
$products = $productModel->getAll();

// Inclusion du template
$template = 'all-products';
include '../templates/base.phtml';