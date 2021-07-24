<?php

namespace Views;
use Smarty;

class View
{
    static $smarty;
    static function display(string $v, $params = null)
    {
        self::$smarty = new Smarty();
        self::$smarty->template_dir = 'Views';
        self::$smarty->compile_dir = 'Views/tmp';
        if (isset($_SESSION)) self::$smarty->assign("_SESSION", $_SESSION);
        if (isset($params)) {
            foreach ($params as $key => $value) {
                self::$smarty->assign($key, $value);
            }
        }
        self::$smarty->display($v . '.tpl');
    }
}
