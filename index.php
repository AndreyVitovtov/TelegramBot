<?php

use App\Controllers\RequestHandlerBot;

require_once "vendor/autoload.php";


//(new RequestHandlerBot())->setWebhook();

(new RequestHandlerBot())->execute();
