<?php

use yii\helpers\Html;
use yii\grid\GridView;
//use yii\helpers\VarDumper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
    	<div class="col-lg-2">
			<?php echo $this->render('_conuntTransactions',['years'=>$years,'months' => $months])?>
    	</div>
    	<div class="col-lg-10">
    	
    	<div><?php echo Html::encode($err)?></div>
<!--     	<div>Говори по-русски</div>  -->
    	
	    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
	
	<!--     <p> -->
	<!--           Html::a('Create Data', ['create'], ['class' => 'btn btn-success']) -->
	<!--     </p> -->
	    <?= GridView::widget([
	        'dataProvider' => $dataProvider,
	        //'filterModel' => $searchModel,
	        'columns' => [
	            //['class' => 'yii\grid\SerialColumn'],
	
	            'id',
	            'card_number',
	            'date',
	            'volume',
	            'service',
	            // 'address_id',
	
	            //['class' => 'yii\grid\ActionColumn'],
	        ],
	    ]); ?>    	
    	</div>
    </div>

</div>
