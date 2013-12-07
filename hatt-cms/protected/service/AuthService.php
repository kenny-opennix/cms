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
    /**
     * @const string Key from _SESSION
     */
    const CA = 'current_user';

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
        $authToken = (isset($_COOKIE['auth_token'])) ? htmlspecialchars($_COOKIE['auth_token']) : false;
        if (!$authToken) {
            return false;
        }

        if (isset($_SESSION[self::CA])) {
            return true;
        }

        $user = Users::model()->find('auth_token=:at', array(':at' => $authToken));
        if ($user) {
            $_SESSION[self::CA] = $user->getAttributes();
            return true;
        }

        return false;
    }
} 