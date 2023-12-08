<?php

use common\models\Articles;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\FilterArticles $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Articles', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'article_id',
            'title',
            'content:ntext',
            'id_author',
            'publish_date',
            //'id_category',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Articles $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'article_id' => $model->article_id]);
                 }
            ],
        ],
    ]); ?>


</div>
