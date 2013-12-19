<?php

class MembersController extends Controller
{
	public function actionGroup()
	{
        $groups = UsersGroups::model()->findAll(array('condition' => "level <= '0'"));
        $this->render('group', array('GROUPS' => $groups));
	}

	public function actionIndex()
	{
        $groups = UsersGroups::model()->findAll();
        $this->render('index', array('GROUPS' => $groups));
	}

	public function actionShow()
	{
		$this->render('show');
	}

	public function actionTeam()
	{
        $groups = UsersGroups::model()->findAll(array('condition' => "level > '0'"));
        $this->render('team', array('GROUPS' => $groups));
	}

    public function init(){
        if (!AuthService::getInstance()->checkAuth()) {
            $this->redirect(array('profile/login'));
        }
    }
}