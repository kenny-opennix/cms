<?php

class TopicsController extends Controller
{
    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        if(!AuthService::getInstance()->checkAuth()) {
            $this->redirect('/profile/login');
        }

        $model = new Topics;

        if (Yii::app()->request->isPostRequest) {
            $model->setAttribute('users_id', AuthService::getInstance()->getUserId());
            $model->setAttribute('categories_id', $_POST['categories']);
            $model->setAttribute('name', $_POST['name']);
            $model->setAttribute('text', $_POST['text']);
            $model->setAttribute('text_html', $_POST['text']);
            $model->setAttribute('text_html', $_POST['text']);
            $model->setAttribute('created_date', date(UtilsService::DATE_FORMAT, time()));
            $model->setAttribute('modify_date', date(UtilsService::DATE_FORMAT, time()));
            $model->setAttribute('status', 1);
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            } else {
                CVarDumper::dump($model->getErrors());
            }
        }

        $this->render('create', array(
            'MODEL' => $model,
            'CATEGORIES_HTML' => UtilsService::getCategoriesHtml($this->getCache(), 'categories', 'Topics_categories')
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Topics'])) {
            $model->attributes = $_POST['Topics'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $topics = Topics::model();
        $this->render('index', array(
            'topics' => $topics,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Topics('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Topics']))
            $model->attributes = $_GET['Topics'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Topics the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Topics::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Topics $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'topics-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
