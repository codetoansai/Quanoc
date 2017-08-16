<?php

namespace backend\controllers;

use common\models\Categorys;
use common\models\ImageUpload;
use Yii;
use common\models\Article;
use common\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();
        $model_category=new Categorys();
        $data_cate=$model_category->getAllCate(0);
        if(empty($data_cate)){
            $data_cate=[];
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id=Yii::$app->user->identity->id ;
            $model->created_by=Yii::$app->user->identity->id ;
            $model->created_at=date('Y-m-d');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'data_cate'=>$data_cate
            ]);
        }
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model_category=new Categorys();
        $data_cate=$model_category->getAllCate(0);
        if(empty($data_cate)){
            $data_cate=[];
        }
        if ($model->load(Yii::$app->request->post()) ) {
            $model->updated_at=date('Y-m-d');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'data_cate'=>$data_cate
            ]);
        }
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionSetImage($id){
        $model=new ImageUpload();
        if(Yii::$app->request->isPost){
            $article=$this->findModel($id);
            $file=UploadedFile::getInstance($model,'image');
            if($article->saveImage($model->uploadFile($file,$article->image))){
                return $this->redirect(["view",'id'=>$article->id]);
            }
        }
        return $this->render('image',['model'=>$model]);
    }
}
