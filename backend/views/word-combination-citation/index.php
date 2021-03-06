<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helpers\Utf8;
use common\models\Region;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CombinationCitationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $parentModel common\models\WordCombination */

$this->params['breadcrumbs'][] = [
    'label' => 'Словосочетания',
    'url' => ['combination/index', 'id' => $parentModel->word->id]
];
$this->title = 'Цитаты';
$this->params['breadcrumbs'][] = 'Цитаты';
?>

<h1>
    Текстовые цитаты словосочетаний словарного слова
    <strong>
        <?= Yii::$app->accent->lows($parentModel->word) ?>
    </strong>
</h1>
<h2><em>Словосочетание </em><?= $parentModel->combination ?></h2>

<p>
    <?= Html::a('Новая цитата', ['create','id_parent' => $parentModel->id],
        ['class' => 'btn btn-success']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
            [
            'attribute' => 'fragment',
            'value' => function($model) {
                    return Utf8::mb_trunc($model->fragment,60);
                },
            ],
            [
            'attribute' => 'id_region',
            'value' => function($model) {
                    return $model->region ? $model->region->name : null;
                },
            'filter' => Html::activeDropDownList($searchModel, 'id_region',
                    Region::find()->select(['name','id'])->orderBy('name')->indexBy('id')->column(),
                    ['prompt' => 'Поиск','class' => 'form-control']),
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}{delete}',
            'header' => 'Действия'
        ],
    ],
]); ?>
