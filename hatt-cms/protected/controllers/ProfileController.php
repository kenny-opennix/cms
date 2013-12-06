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
        $this->render('edit');
    }

    public function actionLogin()
    {
        if (Yii::app()->request->getIsPostRequest()) {

        }

        $this->render('login');
    }

    private function  _checkAuth()
    {
        if (!AuthService::getInstance()->checkAuth()) {
            $this->redirect(array('profile/login'));
        }
    }
}