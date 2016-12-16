<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\DataSearch */
/* @var $form yii\widgets\ActiveForm */

$years = $model->find()->select('YEAR(`date`) as year')->groupBy('YEAR(`date`)')->all();
$years = ArrayHelper::map($years,'year','year');
$month = $model->find()->select('MONTH(`date`) as month')->groupBy('MONTH(`date`)')->all();
$month = ArrayHelper::map($month,'month','month');
foreach ($month as &$mnt){
	$mnt = date('F', mktime(0, 0, 0, $mnt, 10));
}
?>

<div class="data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'card_number') ?>

    <?php echo $form->field($model, 'year')->dropDownList($years,['prompt' => 'Year is not selected']); ?>
    
     <?= $form->field($model, 'month')->dropDownList($month,['prompt' => 'Month is not selected']) ?>

    <?php // echo $form->field($model, 'address_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php //echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
