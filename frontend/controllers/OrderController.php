<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Order;
use frontend\models\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Mpdf\Mpdf; 

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
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
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
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
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
public function actionCreate()
    {
        $model = new Order();

         $mpdf = new Mpdf();
                    // pdf is a name of view file responsible for this pdf document
                    $mpdf->WriteHTML($this->renderPartial('orderdetails',['model' => $model])); 
                    $path = $mpdf->Output('', 'S');
    
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->mailer->compose([
            
                ])
            // $send = Yii::$app->mail->compose()->attachContent($path, ['orderdetails' => 'Order #'.$model->order_id.'.pdf',   'contentType' => 'application/pdf']);
                    ->setFrom(\Yii::$app->params['senderEmail'])
                    ->setTo('duka@example.com')
                    ->setSubject('Your order has been successful placed')
                    ->send();
                    Yii::$app->session->setFlash('success', 'Thank you for purchasing @ duka.io');
            return $this->redirect(['view', 'id' => $model->order_id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }


  public function actionOrderdetails($id)
    {
        $pdfcontent= $this->renderPartial('orderdetails', [
            'model' => $this->findModel($id),
        ]);
        
        $mpdf = new Mpdf();
        $mpdf->WriteHtml($pdfcontent);
        $mpdf->Output();
        exit;
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->order_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Order model.
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
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
