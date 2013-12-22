<?php

class CategoriesController extends Controller
{
    const CATEGORIES_TREE = 'categories:group:tree';

    /** @var array */
    private $categories = array();

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

    public function actionGroup($id = null)
    {
        $this->checkCategories($id, 'categories_group_id');

        $this->render('group', array('CATEGORIES' => $this->categories));
    }

    /**
     * Просмотр топиков по категории
     * @param null $id категории
     */
    public function actionView($id = null)
    {
        $this->checkCategories($id, 'id');
        $criteria = new CDbCriteria(array('condition' => 'categories_id=' . $id, 'order' => 't.id DESC'));
        $topics = Topics::model()->getActiveFinder('users')->query($criteria, true);

        $this->render('view', array('TOPICS' => $topics));
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
            $tree[$group->id] = array('item' => $group, 'child' => array());

            foreach ($categories as $cat) {
                if ($cat->categories_group_id == $group->id) {
                    $tree[$group->id]['child'][] = $cat;
                }
            }
        }

        return $tree;
    }

    /**
     * @param int $id
     * @param string $field
     * @throws CHttpException
     */
    private function checkCategories($id, $field = 'id')
    {
        $this->categories = Categories::model()->findAll(array('condition' => $field . '=' . intval($id) . ' AND is_show > 0'));

        if (is_null($id) || !intval($id) || !count($this->categories)) {
            throw new CHttpException(404, 'Плохой параметр!');
        }
    }

}