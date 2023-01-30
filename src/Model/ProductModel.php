<?php 

// Définition du namespace
namespace App\Model;

// Import des classes
use PDO;
use App\Core\AbstractModel;

class ProductModel extends AbstractModel {

   public function getAll(?int $limit = null): array 
   {
        $sql = 'SELECT * FROM produit ORDER BY created_at DESC';
        $params = [];

        if ($limit) {
            $sql .= ' LIMIT :limit';
        }

        $pdoStatement = self::$pdo->prepare($sql);

        if ($limit) {
            $pdoStatement->bindValue(':limit', $limit, PDO::PARAM_INT);
        }

        $pdoStatement->execute();

        $products = $pdoStatement->fetchAll();

        if (!$products) {
            return [];
        }

        return $products;
   }

   public function insert(string $title, string $description, int $price, string $city, string $postalCode, string $image)
   {
        $sql = 'INSERT INTO produit 
                (title, description, price, city, postal_code, created_at, image)
                VALUES (?,?,?,?,?, NOW(), ?)';
        $pdoStatement = self::$pdo->prepare($sql);
        $pdoStatement->execute([$title, $description, $price, $city, $postalCode, $image]);
   }

   public function getOneById(int $id): ?array
   {
        $sql = 'SELECT * FROM produit WHERE id_produit = ?';
        $pdoStatement = self::$pdo->prepare($sql);
        $pdoStatement->execute([$id]);

        $product = $pdoStatement->fetch();

        if (!$product) {
            return null;
        }

        return $product;
   }

   public function book(string $message, int $id) 
   {
        $sql = 'UPDATE produit SET reservation_text	= ? WHERE id_produit = ?';
        $pdoStatement = self::$pdo->prepare($sql);
        $pdoStatement->execute([$message, $id]);
   }
}