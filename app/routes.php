<?php 

/**
 * On définit dans le tableau associatif $routes lal iste de nos routes.
 * Pour chaque route, on définit : 
 * - son nom 
 * - path (qui apparaît dans l'URL)
 * - controller : fichier à appeler 
 */

$routes = [

    // Page d'accueil
    'home' => [
        'path' => '/',
        'controller' => 'home.php'
    ],

    // Formulaire d'ajout d'un produit
    'add-product' => [
        'path' => '/add-product',
        'controller' => 'add-product.php'
    ],

    // Page Tous les produits
    'products' => [
        'path' => '/products',
        'controller' => 'products.php'
    ],

    // Déconnexion
    'product' => [
        'path' => '/product',
        'controller' => 'product.php'
    ],
];

return $routes;