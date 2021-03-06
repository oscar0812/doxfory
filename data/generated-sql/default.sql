
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- contact_info
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `contact_info`;

CREATE TABLE `contact_info`
(
    `user_id` INTEGER NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(64) NOT NULL,
    `phone_number` VARCHAR(32) NOT NULL,
    `facebook_username` VARCHAR(64) NOT NULL,
    `twitter_username` VARCHAR(64) NOT NULL,
    `google_plus_username` VARCHAR(64) NOT NULL,
    `instagram_username` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`user_id`),
    CONSTRAINT `contact_info_ibfk_1`
        FOREIGN KEY (`user_id`)
        REFERENCES `user` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- job
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `job`;

CREATE TABLE `job`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `is_completed` TINYINT(1) NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `description` VARCHAR(4098) NOT NULL,
    `images` VARCHAR(4098) NOT NULL,
    `payment` INTEGER NOT NULL,
    `user_id` INTEGER NOT NULL,
    `provider_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `user_id` (`user_id`),
    INDEX `provider_id` (`provider_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(16) NOT NULL,
    `last_name` VARCHAR(16) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `profile_picture` VARCHAR(255) NOT NULL,
    `about_me` VARCHAR(4098) NOT NULL,
    `up_votes` INTEGER NOT NULL,
    `confirmation_key` VARCHAR(32) NOT NULL,
    `reset_key` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
