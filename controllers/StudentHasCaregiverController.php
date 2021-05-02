<?php

namespace app\controllers;

use app\models\search\StudentHasCaregiverSearch;
use app\models\StudentHasCaregiver;
use Throwable;
use Yii;
use yii\db\StaleObjectException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * StudentHasCaregiverController implements the CRUD actions for StudentHasCaregiver model.
 */
class StudentHasCaregiverController extends Controller
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
     * Lists all StudentHasCaregiver models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentHasCaregiverSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new StudentHasCaregiver model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StudentHasCaregiver();
        $post = Yii::$app->request->post();
        if (isset($post['StudentHasCaregiver']) && StudentHasCaregiver::findOne([
                'caregiver_id' => $post['StudentHasCaregiver']['caregiver_id'],
                'student_id' => $post['StudentHasCaregiver']['student_id'],
            ])) {
            return $this->redirect([
                'view',
                'student_id' => $post['StudentHasCaregiver']['caregiver_id'],
                'caregiver_id' => $post['StudentHasCaregiver']['student_id']
            ]);
        }
        if ($model->load($post) && $model->save()) {
            return $this->redirect(['view', 'student_id' => $model->student_id, 'caregiver_id' => $model->caregiver_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing StudentHasCaregiver model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $student_id
     * @param integer $caregiver_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function actionDelete(int $student_id, int $caregiver_id)
    {
        $this->findModel($student_id, $caregiver_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StudentHasCaregiver model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $student_id
     * @param integer $caregiver_id
     * @return StudentHasCaregiver the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($student_id, $caregiver_id)
    {
        if (($model = StudentHasCaregiver::findOne(['student_id' => $student_id, 'caregiver_id' => $caregiver_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Az oldal nem található.');
    }
}
