-- commandes SQL 

ALTER TABLE posts ADD COLUMN `status` ENUM('published', 'unpublished') DEFAULT 'unpublished';

ALTER TABLE posts ADD COLUMN `published_at` DATETIME NULL;