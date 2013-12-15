<?php

class CategoriesController extends Controller
{
    const INDEX_PAGE_CATEGORIES = 'index_page_categories';

    public function actionIndex()
    {
        /**
         * @var CDbCriteria $criteria - условия для вывода категорий
         * @var Categories $categories - список категорий
         */
        $cache = $this->getCache();
        if (!$categories = $cache->get(self::INDEX_PAGE_CATEGORIES)) {
            $categories = $this->getCategories();
        }

        $this->render('index', array(
            'CATEGORIES' => $categories,
            'CATEGORIES_COUNT' => count($categories)
        ));
    }

    /**
     * Получить список категории с группами
     * @param bool $cached - флаг для кеширования. По умолчанию обновляет кеш по кдючу self::INDEX_PAGE_CATEGORIES
     * @return Categories|array
     */
    private function getCategories($cached = true)
    {
        $criteria = new CDbCriteria(array(
            'alias' => 't',
            'condition' => 't.is_main > 0'
        ));
        $cat = Categories::model()->getActiveFinder('categoriesGroup')->query($criteria, true);

        if ($cached) {
            $cache = $this->getCache();
            $cache->set(self::INDEX_PAGE_CATEGORIES, $cat, 10);
        }
        return $cat;
    }
}