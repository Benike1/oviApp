<?php

namespace app\controllers;

use Yii;
use app\models\GroupHasTeacher;
use app\models\search\GroupHasTeacherSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GroupHasTeacherController implements the CRUD actions for GroupHasTeacher model.
 */
class GroupHasTeacherController extends Controller
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
     * Lists all GroupHasTeacher models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GroupHasTeacherSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new GroupHasTeacher model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GroupHasTeacher();
        $post = Yii::$app->request->post();

        if (isset($post['GroupHasTeacher']) && GroupHasTeacher::findOne([
                'group_id' => $post['GroupHasTeacher']['group_id'],
                'teacher_id' => $post['GroupHasTeacher']['teacher_id'],
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
     * Deletes an existing GroupHasTeacher model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $group_id
     * @param integer $teacher_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($group_id, $teacher_id)
    {
        $this->findModel($group_id, $teacher_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GroupHasTeacher model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $group_id
     * @param integer $teacher_id
     * @return GroupHasTeacher the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($group_id, $teacher_id)
    {
        if (($model = GroupHasTeacher::findOne(['group_id' => $group_id, 'teacher_id' => $teacher_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
