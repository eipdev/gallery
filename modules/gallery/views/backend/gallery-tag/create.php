<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\gallery\models\GalleryTag;
use dosamigos\selectize\SelectizeTextInput;
use app\modules\gallery\assets\TagAsset;

TagAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\modules\gallery\models\GalleryTag */

$this->title = 'Add tags';
$this->params['breadcrumbs'][] = ['label' => 'Gallery Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-tag-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="gallery-tag-form">

        <?php $form = ActiveForm::begin(); ?>
        <?php
            echo SelectizeTextInput::widget([
                'name' => 'tags',
                'clientOptions' => [
                    'plugins' => ['remove_button'],
                    'persist' => false,
                    'delimeter' => GalleryTag::DELIMITER,                    
                    'create' => 'function(input) {
                                    return {
                                        value: input,
                                        text: input
                                    }
                                }'
                ],
            ]);
        ?>

        <div class="form-group">
            <?= Html::submitButton('Add new tags', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
