CREATE TABLE IF NOT EXISTS  `users` (
                                        `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
                                        `name` CHAR(100) NOT NULL,
    `age` TINYINT UNSIGNED DEFAULT NULL,
    `email` CHAR NOT NULL UNIQUE,
    `password` CHAR NOT NULL,
    `gender` ENUM('male', 'female'),
    `deleted_at` TIMESTAMP DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB CHARACTER SET utf8;


INSERT INTO `users`(`name`, `email`, `password`, `gender`) VALUES ('Jim', 'jim@gmail.com', 'password', 'male');

INSERT INTO `users`(`name`, `email`, `password`, `gender`, `age`) VALUES ('Mike', 'mike@gmail.com', 'password', 'male', 30);

INSERT INTO `users`(`name`, `email`, `password`, `gender`, `age`) VALUES ('Kate', 'kate@ukr.net', 'password', 'female', 22),
                                                                         ('Jon', 'jone@ukr.net', 'password', 'male', 25),
                                                                         ('Jane', 'jane@gmail.com', 'password', 'male', 27);

INSERT INTO `users`(`name`, `email`, `password`, `gender`, `age`) VALUES ('Oliver', 'oliver@ukr.net', 'password', 'male', 45),
                                                                         ('Jon', 'jon@ukr.net', 'password', 'male', 35),
                                                                         ('Ann', 'ann@gmail.com', 'password', 'female', 50);


SELECT `email` FROM `users`;
SELECT `name`, `age` FROM `users`;
SELECT * FROM `users` WHERE `age` > 20;
SELECT `email` FROM `users` WHERE `name` = 'kate';
SELECT `name` FROM `users` WHERE `email` LIKE '%@ukr.net';
SELECT * FROM `users` WHERE `email` NOT LIKE '%@ukr%';
SELECT * FROM `users` WHERE `age` BETWEEN 22 AND 25;
SELECT * FROM `users` WHERE `id` IN (1,2,3);
SELECT * FROM `users` WHERE `id` NOT IN (1,2);
SELECT * FROM `users` WHERE `age` > 20 AND `email` LIKE '%@gmail.com';
SELECT * FROM `users` WHERE `age` > 20 AND (`email` LIKE '%@gmail.com' OR `id` > 3);
SELECT * FROM `users` WHERE `age` > 25 AND `email` LIKE '%@gmail.com' ORDER BY  `age` DESC;
SELECT * FROM `users` WHERE `email` = 'jone@ukr.net' AND `deleted_at` IS NULL;
SELECT * FROM `users` WHERE `deleted_at` IS NOT NULL;
SELECT * FROM `users` ORDER BY `age` DESC LIMIT 1, 1;

UPDATE `users` SET `age` = 33, `name` = 'TOM' WHERE `id` = 1;
UPDATE `users` SET `gender` = 'female', `name` = 'July', `email` = 'july@ukr.net' WHERE `id` = 1;

DELETE FROM `users` WHERE `id` = 4;


CREATE TABLE IF NOT EXISTS  `posts` (
                                        `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
                                        `title` CHAR(255) NOT NULL,
    `content` TEXT NOT NULL,
    `user_id` INT UNSIGNED DEFAULT NULL,
    `deleted_at` TIMESTAMP DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
    );

CREATE TABLE IF NOT EXISTS  `tags` (
                                       `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
                                       `title` CHAR(255) NOT NULL,
    `deleted_at` TIMESTAMP DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

CREATE TABLE IF NOT EXISTS  `post_tag` (
                                           `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
                                           `post_id` INT UNSIGNED,
                                           `tag_id` INT UNSIGNED,
                                           FOREIGN KEY (`post_id`) REFERENCES `posts`(`id`),
    FOREIGN KEY (`tag_id`) REFERENCES `tags`(`id`)
    );

INSERT INTO `posts`(`title`, `content`, `user_id`) VALUES ('post title', 'post content', 2);

INSERT INTO `tags`(`title`) VALUES ('IT'), ('FINANCE'), ('SPORT');

INSERT INTO `post_tag`(`post_id`, `tag_id`) VALUES (1, 1), (1, 2);

SELECT * FROM `posts`;

SELECT * FROM `post_tag` WHERE `post_id` IN (1);

SELECT * FROM `tags` WHERE `id` IN (1, 2);

SELECT COUNT(`id`) as counter FROM `users` WHERE `age` > 20;
SELECT AVG(`age`) as avg FROM `users`;