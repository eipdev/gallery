<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\gallery\common\models\GalleryImage */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('gallery', 'Админка'), 'url' => ['/admin/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('gallery', 'Галерея'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('@app/modules/gallery/common/views/_alert', [
    'module' => Yii::$app->getModule('gallery'),
]) ?>

<div class="gallery-image-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('gallery', 'Изменить'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('gallery', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('gallery', 'Вы уверены, что хотите удалить это изображение?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'path',
                'value' => call_user_func(function($data){
                    return Html::img($data->thumbnail);
                }, $model),
                'format' => 'html',
            ],
            'description:ntext',
            'authorName',
            [
                //'attribute' => 'path',
                'label' => Yii::t('gallery', 'Теги'),
                'value' => call_user_func(function($data){
                    $html = '';
                    $i = 0;
                    foreach ($data->tags as $tag) {
                        $html .= '<span class="label label-success">' . Html::encode($tag->name) . '</span>&nbsp;';
                    }
                    return $html;
                }, $model),
                'format' => 'html',
            ],
            'created_date:datetime',
            'updated_date:datetime',
        ],
    ]) ?>

</div>
