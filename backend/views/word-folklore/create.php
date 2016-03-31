<?php

/* @var $this yii\web\View */
/* @var $model common\models\WordFolklore */
/* @var $word common\models\Word */

$this->title = 'В фольклоре ' . ' ' . $word->title;
$this->params['breadcrumbs'][] = [
    'label' => 'Фольклорные цитаты',
    'url' => ['index', 'id' => $word->id]
];
$this->params['breadcrumbs'][] = 'Создание';
?>
<h1>
    Новая фольклорная цитата словарного слова
    <strong>
        <?= Yii::$app->accent->lows($word) ?>
    </strong>
</h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>