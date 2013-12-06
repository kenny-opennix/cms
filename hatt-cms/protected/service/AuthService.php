<?php
/**
 * User: dimka3210
 * Date: 05.12.13
 * Time: 23:27
 */

/**
 * Class AuthService Singleton
 */
class AuthService
{
    private static $instance = null;

    /**
     * @return AuthService
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @return bool
     */
    public function checkAuth()
    {
        if (!isset($_COOKIE['auth_token'])) {
            return false;
        }

        $user = Users::model();
        $user->auth_token = $_COOKIE['auth_token'];
        /**
         * @var CActiveDataProvider
         */
        $user = $user->search();
        if ($user->getItemCount()) {
            return true;
        }

        return false;
    }
} 