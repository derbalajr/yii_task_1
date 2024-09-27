<?php

use app\models\Freelancer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Freelancers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="freelancer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Freelancer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'country',
                'value' => function ($model) {
                    return $model->country0 ? $model->country0->name : 'Not set';  // Adjust 'country0' to your actual relation name
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Freelancer $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>