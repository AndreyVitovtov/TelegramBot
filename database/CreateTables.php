<?php

namespace database;

use core\Database;
use PDO;

class CreateTables
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::instance()->getDbh();
    }

    public function interaction()
    {
        $this->db->exec("
            CREATE TABLE `interaction` (
                `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
                `chat` VARCHAR(255) UNIQUE,
                `command` VARCHAR(255) DEFAULT NULL,
                `params` TEXT DEFAULT NULL 
            )
        ");
    }
}
