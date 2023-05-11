<?php
// Load Config
require_once 'config/config.php';

require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';


function article_mvc($calassName){
    require_once 'libraries/'. $calassName .'.php';
}

spl_autoload_register('article_mvc');