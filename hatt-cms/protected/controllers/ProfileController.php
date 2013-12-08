<?php

class ProfileController extends Controller
{
    public function actionIndex()
    {
        $this->_checkAuth();
        $this->view('user_info', $_SESSION[AuthService::CA]);
        $this->render('index');
    }

    public function actionEdit()
    {
        $this->render('edit', array('a' => 'b'));
    }

    public function actionLogin()
    {
        /**
         * Если авторизован, то кидаем на страницу просмотра профиля
         */
        if (AuthService::getInstance()->checkAuth()) {
            $this->redirect(array('profile/index'));
        }

        /**
         * Если метод POST, то пытаемся залогинить
         */
        if (Yii::app()->request->getIsPostRequest()) {
            $login = Yii::app()->request->getParam('login', false);
            $pass = Yii::app()->request->getParam('pass', false);
            if ($login && $pass) {
                if (!AuthService::getInstance()->login($login, $pass)) {
                    $this->render('login', array('login' => $login));
                    return;
                } else {
                    $this->redirect(array('profile/index'));
                }
            }
        }

        $this->render('login');
    }

    public function actionLogout()
    {
        AuthService::getInstance()->logout();
        $this->redirect(array('profile/login'));
    }

    private function  _checkAuth()
    {
        if (!AuthService::getInstance()->checkAuth()) {
            $this->redirect(array('profile/login'));
        }
    }
}