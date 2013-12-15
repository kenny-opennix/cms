<?php
/**
 * User: dimka3210
 * Date: 14.12.13
 * Time: 12:21
 */

class UtilsService
{
    /**
     * Принимаем на вход набор объектов и возвращаем массив, из полей, переданных вторым параметром
     * @param CActiveRecord $set
     * @param $field
     * @return array
     */
    public static function getSetField($set, $field)
    {
        $result = array();
        foreach ($set as $item) {
            $result[] = $item->$field;
        }
        return $result;
    }
} 