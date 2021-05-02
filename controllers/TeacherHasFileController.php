<?php

namespace app\controllers;

use Throwable;
use Yii;
use app\models\TeacherHasFile;
use app\models\search\TeacherHasFileSearch;
use yii\db\StaleObjectException;
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
     * Creates a new TeacherHasFile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TeacherHasFile();
        $post = Yii::$app->request->post();
        
        if ($model->load($post) && $model->save()) {
            return $this->redirect(['view', 'teacher_id' => $model->teacher_id, 'file_id' => $model->file_id]);
        }

        return $this->render('create', [
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
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function actionDelete(int $teacher_id, int $file_id)
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
    protected function findModel(int $teacher_id, int $file_id)
    {
        if (($model = TeacherHasFile::findOne(['teacher_id' => $teacher_id, 'file_id' => $file_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
