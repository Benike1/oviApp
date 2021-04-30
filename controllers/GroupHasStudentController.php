<?php

namespace app\controllers;

use Yii;
use app\models\GroupHasStudent;
use app\models\search\GroupHasStudentSearch;
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
            'only' => ['index', 'create', 'update', 'view'],
            'rules' => [
                [
                    'actions' => ['index', 'create', 'update', 'view'],
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
     * Displays a single GroupHasStudent model.
     * @param integer $group_id
     * @param integer $student_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($group_id, $student_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($group_id, $student_id),
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
            return $this->redirect([
                'view',
                'group_id' => $post['GroupHasStudent']['group_id'],
                'student_id' => $post['GroupHasStudent']['student_id']
            ]);
        }
        if ($model->load($post) && $model->save()) {
            return $this->redirect(['view', 'group_id' => $model->group_id, 'student_id' => $model->student_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing GroupHasStudent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $group_id
     * @param integer $student_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($group_id, $student_id)
    {
        $model = $this->findModel($group_id, $student_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'group_id' => $model->group_id, 'student_id' => $model->student_id]);
        }

        return $this->render('update', [
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
