ALTER TABLE `produit` ADD `image` VARCHAR(255) NOT NULL AFTER `created_at`;
ALTER TABLE `produit` CHANGE `image` `image` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL;v