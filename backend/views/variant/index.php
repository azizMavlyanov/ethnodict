<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helpers\VariantTypeHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $word common\models\Word */

$this->title = 'Варианты';
$this->params['breadcrumbs'][] = 'Варианты';
?>

<h1>
    Варианты словарного слова
    <strong>
        <?= Yii::$app->accent->lows($word) ?>
    </strong>
</h1>

<p>
    <?= Html::a('Новый вариант', ['create','id_word' => $word->id],
        ['class' => 'btn btn-success']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'attribute' => 'id_type',
            'value' => function($model, $key, $index, $column) {
                    return $model->type->name;
                },
            'filter' => Html::activeDropDownList($searchModel, 'id_type',
                    VariantTypeHelper::typesArray(),
                    ['prompt' => 'Поиск','class' => 'form-control']),
        ],
        [
            'attribute' => 'id_variant',
            'format' => 'raw',
            'value' => function($model, $key, $index, $column) {
                    return Yii::$app->accent->full($model->variant);
                }
        ],
        'comment',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}{delete}',
            'header' => 'Действия'
        ],
    ],
]); ?>