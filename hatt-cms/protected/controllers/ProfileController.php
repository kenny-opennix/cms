<?php

class ProfileController extends Controller
{
    public $form;

    public function actionIndex()
    {
        $this->_checkAuth();
        $this->render('index', array('user_info' => $_SESSION[AuthService::CA]));
    }

    public function actionEdit()
    {
        $this->_checkAuth();
        $model = Users::model()->findByPk($_SESSION[AuthService::CA]['id']);

        if (isset($_POST['Users'])) {
            $model->setAttributes($_POST['Users']);
            if ($model->validate()) {
                $model->save();
            }
        }

        $this->form = $this->beginWidget('CActiveForm', [
            'id' => 'users-edit-form',
            'enableAjaxValidation' => false
        ]);

        $this->render('edit', array('model' => $model));
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