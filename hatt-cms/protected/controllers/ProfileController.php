<?php

class ProfileController extends Controller
{
    public function actionIndex()
    {
        $this->_checkAuth();
        $this->render('index');
    }

    public function actionEdit()
    {
        echo md5('123');
        $this->render('edit');
    }

    public function actionLogin()
    {
        if (Yii::app()->request->getIsPostRequest()) {
            $login = Yii::app()->request->getParam('login', false);
            $pass = Yii::app()->request->getParam('pass', false);
            if ($login && $pass) {
                if (!AuthService::getInstance()->login($login, $pass)) {
                    $this->render('login');
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