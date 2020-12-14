<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Shoes;
use frontend\models\Images;
use frontend\models\Cart;
use frontend\models\ShoesSearch;
use frontend\models\ShoeCategory;
use frontend\models\ShoeBrand;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ShoesController implements the CRUD actions for Shoes model.
 */
class ShoesController extends Controller
{
    public $enableCsrfValidation = false;
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
     * Lists all Shoes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ShoesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $category = ShoeCategory::find();
        $shoes_cat = $category->orderBy('cat_id ASC')->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'shoes_cat' => $shoes_cat,
        ]);
    }

//find shoes 
    public function actionSearch($keyword)
    {
        $this->layout = 'main';
        $query = Shoes::find();
       
        if ($keyword) {
            $query->byKeyword($keyword)
            ->orderBy("MATCH(shoe_name, description)
        AGAINST (:keyword)", ['keyword' => $keyword]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);
        
        return $this->render('shoesearch', [
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Displays a single Shoes model.
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
     * Creates a new Shoes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Shoes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            
            return $this->redirect(['addimage', 'shoe_id' => $model->shoe_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


public function actionOrder()
{
    $model = new \frontend\models\Order();


    if ($model->load(Yii::$app->request->post())) {
        
        $model->save();

            return $this->redirect(['site/index']);
      
    }

    return $this->render('order', [
        'model' => $model,
    ]);
}



    // add to cart
    public function actionAddcart($shoe_id)
{
    $model = new Cart();

    if ($model->load(Yii::$app->request->post())) {

        $model->save();

            return $this->redirect(['shoes/checkout']);

    }

    return $this->renderAjax('addcart', [
        'model' => $model,
        'shoe_id' => $shoe_id,
    ]);
}

// checkout

        public function actionCheckout()
    {
        return $this->render('checkout');
    }
    // add brand and logo
    public function actionAddbrand()
{
    $model = new ShoeBrand();

    if ($model->load(Yii::$app->request->post())) {
         //generates images with unique names
        $imageName = bin2hex(openssl_random_pseudo_bytes(10));
        $model->brand_logo = UploadedFile::getInstance($model, 'brand_logo');
        //saves file in the root directory
        $model->brand_logo->saveAs('img/brand/'.$imageName.'.'.$model->brand_logo->extension);
        //save in the db
        $model->brand_logo='img/brand/'.$imageName.'.'.$model->brand_logo->extension;

        $model->save();
       
            return $this->redirect(['create']);
        
    }

    return $this->renderAjax('addbrand', [
        'model' => $model,
    ]);
}

// add category
    public function actionAddcategory()
{
    $model = new \frontend\models\ShoeCategory();

    if ($model->load(Yii::$app->request->post())) {
         if ($model->validate() && $model->save()) {
            // form inputs are valid, do something here
            return $this->redirect(['create']);
        }
    }

    return $this->renderAjax('addcategory', [
        'model' => $model,
    ]);
}

    // upload image
    public function actionAddimage($shoe_id)
{
    $model = new Images();

    if ($model->load(Yii::$app->request->post())) {

    //generates images with unique names
    $imageName = bin2hex(openssl_random_pseudo_bytes(10));
    $model->img_path = UploadedFile::getInstance($model, 'img_path');
    //saves file in the root directory
    $model->img_path->saveAs('img/shoes/'.$imageName.'.'.$model->img_path->extension);
    //save in the db
    $model->img_path='img/shoes/'.$imageName.'.'.$model->img_path->extension;

    $model->save();

            return $this->redirect(['index']);
        }
    
    return $this->render('addimage', [
        'model' => $model,
        'shoe_id' =>$shoe_id,
    ]);
}

    /**
     * Updates an existing Shoes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'shoe_id' => $model->shoe_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Shoes model.
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
     * Finds the Shoes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Shoes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Shoes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
