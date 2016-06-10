<?php

class functions
{
    public static function flatten_array($a)
    {
        if (is_object($a)) {
            $a = get_object_vars($a);
        }
        $r = [];
        foreach ($a as $k => $ar) {
            if (is_array($ar)) {
                $r = array_merge($r, self::flatten_array($ar));
            } elseif (is_object($ar)) {
                $r = array_merge($r, self::flatten_array(get_object_vars($ar)));
            } else {
                $r[$k] = $ar;
            }
        }

        return $r;
    }
}
