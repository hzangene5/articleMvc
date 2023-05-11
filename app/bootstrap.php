<?php
// Load Config
require_once 'config/config.php';








function article_mvc($calassName){
    require_once 'libraries/'. $calassName .'.php';
}

spl_autoload_register('article_mvc');