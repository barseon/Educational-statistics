<?php
namespace app\ViewLoader;

/**
 * Class ViewLoader
 * @package app\ViewLoader
 */
class ViewLoader
{
    /**
     * @param $tpl
     * @param $data
     */
    static function loadTpl($tpl,$data)
    {
        $tpl_name = $_SERVER['DOCUMENT_ROOT'].'/views/' . $tpl;
        //check if file exist, load this file or error
        if (file_exists($tpl_name)) {
            include_once $tpl_name;
        } else {
            echo "Error";
        }
    }
}