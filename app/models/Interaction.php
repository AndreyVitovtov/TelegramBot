<?php

namespace app\models;

use core\Database;
use PDO;

class Interaction
{
    private static PDO $db;

    public function __construct()
    {
        self::$db = Database::instance()->getDbh();
    }

    public static function get($chat)
    {
        $stmt = self::$db->prepare("
            SELECT `command`, `params` 
            FROM `interaction` 
            WHERE `chat` = :chat
        ");
        $stmt->execute([
            'chat' => $chat
        ]);
        return $stmt->fetchAll()[0] ?? [];
    }

    public static function set($chat, $command = null, $params = null)
    {
        self::delete($chat);
        $stmt = self::$db->prepare("
            INSERT INTO `interaction` (
               `chat`, `command`, `params`
            ) VALUES (
                :chat, :command, :params
            )
        ");
        $stmt->execute([
            'chat' => $chat,
            'command' => $command,
            'params' => $params
        ]);
    }

    public static function delete($chat)
    {
        $stmt = self::$db->prepare("
            DELETE FROM `interaction` 
            WHERE `chat` = :chat
        ");
        $stmt->execute([
            'chat' => $chat
        ]);
    }
}
