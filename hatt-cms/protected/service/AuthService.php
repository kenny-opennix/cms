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

    /**
     * @param $login имя пользователя
     * @param $pass пароль, можно хеш. Тогда третий параметр установить в true
     * @param bool $isHash флаг, показывающий что нам прислали (хеш или пароль в открытом виде)
     * @return bool залогинены мы или нет
     */
    public function login($login, $pass, $isHash = false)
    {
        if (!$isHash) {
            $pass = md5($pass);
        }

        if (isset($_SESSION[self::CA])) {
            return true;
        }

        $user = Users::model()->find('login=:l AND pass=:p', array(':l' => $login, ':p' => $pass));
        if ($user) {
            $user->setAttribute('auth_token', md5($user->login . time()));
            $user->save();
            $_SESSION[self::CA] = $user->getAttributes();
            setcookie('auth_token', $user->getAttribute('auth_token'));
            return true;
        }

        return false;
    }

    public function logout()
    {
        setcookie('auth_token', null, time());
        unset($_SESSION[self::CA]);
    }
} 