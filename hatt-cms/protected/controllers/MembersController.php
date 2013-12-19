<?php

class MembersController extends Controller
{
	public function actionGroup()
	{
		$this->render('group');
	}

	public function actionIndex()
	{
        $groups = UsersGroups::model()->findAll(array('condition' => 'level > 1'));
        $this->render('index', array('GROUPS' => $groups));
	}

	public function actionShow()
	{
		$this->render('show');
	}

	public function actionTeam()
	{
		$this->render('team');
	}

    public function init(){
        if (!AuthService::getInstance()->checkAuth()) {
            $this->redirect(array('profile/login'));
        }
    }
}