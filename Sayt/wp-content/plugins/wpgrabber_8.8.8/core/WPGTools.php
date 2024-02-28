<?php

class WPGTools
{
    public static function getValue($jDHxI9c, $EdLN2B8 = '')
    {
        if (isset($_POST[$jDHxI9c])) {
            return $_POST[$jDHxI9c];
        }
        if (isset($_GET[$jDHxI9c])) {
            return $_GET[$jDHxI9c];
        }
        return $EdLN2B8;
    }
    public static function isSubmit($jDHxI9c)
    {
        if (!(isset($_POST[$jDHxI9c]) or isset($_GET[$jDHxI9c]))) {
            return false;
        }
        return true;
    }
    public static function redirect($OV9DEXc, $Jatvh_1 = null)
    {
        if (!$Jatvh_1) {
            header("Location: " . $OV9DEXc);
            exit;
        }
        header("Location: " . $OV9DEXc, true, $Jatvh_1);
        exit;
    }
    public static function addSuccess($mbqPvCu)
    {
    }
    public static function addError($mbqPvCu)
    {
    }
    public static function addLog($mbqPvCu)
    {
    }
    public static function esc($mbqPvCu)
    {
        return htmlentities($mbqPvCu, ENT_COMPAT, "utf-8");
    }
}
