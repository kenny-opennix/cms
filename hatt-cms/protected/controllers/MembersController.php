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

    public function actionShow($id = null)
    {
        $id = intval($id);
        $isset = Categories::model()->count(array('condition' => 'id=' . $id));
        if (is_null($id) || !$isset) {
            throw new CHttpException(404, 'Плохой параметр!');
        }

        /** @var CDbCommand $command */
        $command = Yii::app()->db->createCommand();
        $command->select(array('users.id', 'users.login', 'users.gender', 'users.birthday', 'users.level', 'users.avatar'))->from('users')->join('users2groups', 'users2groups.users_id=users.id')->where('users2groups.users_groups_id=:id');
        $users = $command->queryAll(true, array(':id' => $id));

        $this->render('show', array('USERS' => $users));
    }

    public function actionTeam()
    {
        $groups = UsersGroups::model()->findAll(array('condition' => "level > '0'"));
        $this->render('team', array('GROUPS' => $groups));
    }

    public function init()
    {
        if (!AuthService::getInstance()->checkAuth()) {
            $this->redirect(array('profile/login'));
        }
    }
}