<?php

namespace app\controllers;

use app\models\Catering;
use app\models\search\CateringSearch;
use kartik\mpdf\Pdf;
use Mpdf\MpdfException;
use setasign\Fpdi\PdfParser\CrossReference\CrossReferenceException;
use setasign\Fpdi\PdfParser\PdfParserException;
use setasign\Fpdi\PdfParser\Type\PdfTypeException;
use Yii;
use yii\base\InvalidConfigException;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * CateringController implements the CRUD actions for Catering model.
 */
class CateringController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Catering models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CateringSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Catering model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Catering model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Catering();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Catering model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Catering model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Catering model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Catering the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Catering::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @param int $catering_id
     * @return mixed
     * @throws CrossReferenceException
     * @throws InvalidConfigException
     * @throws MpdfException
     * @throws PdfParserException
     * @throws PdfTypeException
     */
    public function actionGeneratePdf(int $catering_id)
    {
        $catering = Catering::findOne(['id' => $catering_id]);

        $content = $this->renderPartial('_catering_sheet', [
            'catering' => $catering,
        ]);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE,
            'content' => $content,
            'filename' => 'Étkeztetési_nyilvántartás '.date('yyyy-mm-dd'),
            'cssInline' => '.kv-heading-1{font-size:18px} .table, th, td {border: 1px solid black; border-collapse: collapse;}',
            'options' => [
                'title' => 'Étkeztetési nyilvántartás'
            ],
            'methods' => [
                'SetHeader' => ['Étkeztetési lista'],
            ]
        ]);

        return $pdf->render();
    }
}
