<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    /**
     * @var CCache экземпляр кеша.
     */
    protected $cache = null;
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    /**
     * @return CCache
     */
    public function getCache()
    {
        if (is_null($this->cache)) {
            $this->cache = Yii::app()->getCache();
        }
        return $this->cache;
    }

    public function init()
    {
        if (isset($_GET['clear_cache']) && $_GET['clear_cache'] == '1') {
            $this->getCache()->flush();
        }

        // Update cookie
        if (isset($_COOKIE['auth_token'])) {
            setcookie('auth_token', $_COOKIE['auth_token'], time() + 3600, '/');
        }
    }
}