<?php

namespace app\controllers;

use app\models\InlineButtons;
use app\models\Text;
use core\BaseRequestHandler;

class RequestHandler extends BaseRequestHandler
{
    use MethodsFromGroupAndChat;

    public function __construct()
    {
        parent::__construct();
    }

    public function start()
    {
        // EXAMPLE
        $this->send(Text::example(), InlineButtons::example());
        $this->send(Text::example(), InlineButtons::custom(
            [[
                'id' => 1,
                'name' => 'Test1'
            ], [
                'id' => 2,
                'name' => 'Test2'
            ]], 2, 'start', 'name', null, 'id'
        ));
        // END EXAMPLE
    }
}
