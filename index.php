<?php

use app\controllers\RequestHandler;

require_once "vendor/autoload.php";

//(new RequestHandler())->setWebhook();

(new RequestHandler())->execute();
