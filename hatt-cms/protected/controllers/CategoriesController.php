<?php

class CategoriesController extends Controller
{
    const CATEGORIES_TREE = 'categories:group:tree';

    public function actionIndex()
    {
        $cache = $this->getCache();
        if (!$categoriesWithGroups = $cache->get(self::CATEGORIES_TREE)) {
            $groups = CategoriesGroup::model()->findAll(array('select' => 't.id, t.name', 'alias' => 't', 'condition' => 't.is_show > 0', 'order' => 'sort_index DESC'));
            $categories = Categories::model()->findAll(array('condition' => 'categories_group_id IN (' . implode(',', UtilsService::getSetField($groups, 'id')) . ') AND is_show > 0'));
            $categoriesWithGroups = $this->createCategoriesWithGroups($groups, $categories);
            $cache->set(self::CATEGORIES_TREE, $categoriesWithGroups, 60);
        }

        $this->render('index', array('CATEGORIES' => $categoriesWithGroups));
    }

    /**
     * @param $groups
     * @param $categories
     * @return array
     */
    private function createCategoriesWithGroups($groups, $categories)
    {
        $tree = array();
        foreach ($groups as $group) {
            $tree[$group->id] = array('item' =>$group, 'child' => array());

            foreach ($categories as $cat) {
                if ($cat->categories_group_id == $group->id) {
                    $tree[$group->id]['child'][] = $cat;
                }
            }
        }

        return $tree;
    }

}