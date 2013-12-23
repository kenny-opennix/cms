<?php
/**
 * User: dimka3210
 * Date: 14.12.13
 * Time: 12:21
 */

class UtilsService
{
    /** @const string - ключ для кеша с категориями */
    const CATEGORIES_HTML = 'utils:get_categories_html';

    /** @const string - формат даты для БД */
    const DATE_FORMAT = 'Y-m-d H:i:s';


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

    /**
     * Получить html селекта с категориями
     * @param CCache $cache
     * @param string $selectName
     * @param string $selectId
     * @return string
     */
    public static function getCategoriesHtml(CCache $cache, $selectName = '', $selectId = '')
    {
        if (!$html = $cache->get(self::CATEGORIES_HTML)) {
            $html = '<select name="' . $selectName . '" id="' . $selectId . '">';
            $categoriesGroup = CategoriesGroup::model()->findAll(array('condition' => 'is_show=1', 'order' => 'sort_index'));
            $categories = Categories::model()->findAll(array('condition' => 'is_show=1', 'order' => 'sort_index'));
            foreach ($categoriesGroup as $group) {
                $html .= '<optgroup label="' . $group->name . '">';
                foreach ($categories as $cat) {
                    if ($cat->categories_group_id == $group->id) {
                        $html .= '<option value="' . $cat->id . '">' . $cat->name . '</option>';
                    }
                }
                $html .= '</optgroup>';
            }
            $html .= '</select>';

            $cache->set(self::CATEGORIES_HTML, $html, 300);
        }

        return $html;
    }
} 