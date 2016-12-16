<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="count-transactions">

<?php 
$j = 0;
$count = count($months);
foreach ($years as $year){
	echo Html::encode($year['year']).'('.Html::encode($year['cnt']).')';
	echo '<ul>';
	for ($i = $j; $i < $count; $i++) {
		if($year['year'] != $months[$i]['year']){
			$j = $i;
			break;
		}
		echo '<li>'.Html::encode(date('F', mktime(0, 0, 0, $months[$i]['month'], 10))).'('.Html::encode($months[$i]['cnt']).')'.'</li>';
	}
	echo '</ul>';
}
?>    
</div>