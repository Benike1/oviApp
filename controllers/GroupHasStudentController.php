<?php

namespace app\controllers;

use Throwable;
use Yii;
use app\models\GroupHasStudent;
use app\models\search\GroupHasStudentSearch;
use yii\db\StaleObjectException;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * GroupHasStudentController implements the CRUD actions for GroupHasStudent model.
 */
class GroupHasStudentController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
            'class' => AccessControl::class,
            'only' => ['index', 'create'],
            'rules' => [
                [
                    'actions' => ['index', 'create'],
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
        ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all GroupHasStudent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GroupHasStudentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return string|Response
     */
    public function actionCreate()
    {
        $model = new GroupHasStudent();
        $post = Yii::$app->request->post();
        if (isset($post['GroupHasStudent']) && GroupHasStudent::findOne([
                'group_id' => $post['GroupHasStudent']['group_id'],
                'student_id' => $post['GroupHasStudent']['student_id'],
            ])) {
            return $this->actionIndex();
        }
        if ($model->load($post) && $model->save()) {
            return $this->actionIndex();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GroupHasStudent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $group_id
     * @param integer $student_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function actionDelete($group_id, $student_id)
    {
        $this->findModel($group_id, $student_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GroupHasStudent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $group_id
     * @param integer $student_id
     * @return GroupHasStudent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($group_id, $student_id)
    {
        if (($model = GroupHasStudent::findOne(['group_id' => $group_id, 'student_id' => $student_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
