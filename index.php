<?php

require __DIR__.'/vendor/autoload.php';
require_once 'app/Configs/.config.php';

use \App\Controller\Pages\Home;

echo Home::home();