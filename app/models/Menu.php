<?php

namespace App\Models;

/**
 * @method static main()
 */
class Menu extends Buttons
{
    public static function __callStatic($name, $arguments): array
    {
        if (method_exists(self::class, $name)) {
            return (new Menu)->replyMarkup(self::$name($arguments), $arguments);
        } else {
            return self::default();
        }
    }

    public function __call($name, $arguments): array
    {
        if (method_exists($this, $name)) {
            return $this->replyMarkup($this->$name($arguments), $arguments);
        } else {
            return self::default();
        }
    }

    private function replyMarkup($buttons, $arguments): array
    {
        return [
            'keyboard' => $buttons,
            'resize_keyboard' => $arguments['resizeKeyboard'] ?? true,
            'one_time_keyboard' => $arguments['oneTimeKeyboard'] ?? false,
            'parse_mode' => $arguments['parse_mode'] ?? 'HTML',
            'selective' => $arguments['selective'] ?? true
        ];
    }

    public function hide(): array
    {
        return [
            'hide_keyboard' => true
        ];
    }
}
