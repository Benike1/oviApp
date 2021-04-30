<?php

namespace app\controllers;

use Yii;
use app\models\TeacherHasFile;
use app\models\search\TeacherHasFileSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TeacherHasFileController implements the CRUD actions for TeacherHasFile model.
 */
class TeacherHasFileController extends Controller
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
     * Lists all TeacherHasFile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TeacherHasFileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TeacherHasFile model.
     * @param integer $teacher_id
     * @param integer $file_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($teacher_id, $file_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($teacher_id, $file_id),
        ]);
    }

    /**
     * Creates a new TeacherHasFile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TeacherHasFile();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'teacher_id' => $model->teacher_id, 'file_id' => $model->file_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TeacherHasFile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $teacher_id
     * @param integer $file_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($teacher_id, $file_id)
    {
        $model = $this->findModel($teacher_id, $file_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'teacher_id' => $model->teacher_id, 'file_id' => $model->file_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TeacherHasFile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $teacher_id
     * @param integer $file_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($teacher_id, $file_id)
    {
        $this->findModel($teacher_id, $file_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TeacherHasFile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $teacher_id
     * @param integer $file_id
     * @return TeacherHasFile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($teacher_id, $file_id)
    {
        if (($model = TeacherHasFile::findOne(['teacher_id' => $teacher_id, 'file_id' => $file_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
