<?php
/*
 * By ptr.nov
 * Load Config CSS/JS
 */
/* YII CLASS */
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;

/* TABLE CLASS DEVELOPE -> |DROPDOWN,PRIMARYKEY-> ATTRIBUTE */
use app\models\hrd\Dept;
/*	KARTIK WIDGET -> Penambahan componen dari yii2 dan nampak lebih cantik*/
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use kartik\builder\Form;
//use dosamigos\chartjs\Chart;
//use miloschuman\highcharts\Highcharts;
//use yii\web\JsExpression;
//CLASS Chart GoogleChart
use scotthuangzl\googlechart\GoogleChart;

use modulprj\assets\AppAsset; 	/* CLASS ASSET CSS/JS/THEME Author: -ptr.nov-*/
AppAsset::register($this);		/* INDEPENDENT CSS/JS/THEME FOR PAGE  Author: -ptr.nov-*/
$this->mddPage = 'absensi';
$this->title = Yii::t('app', 'Absensi Dashboard ');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="row row-centered">
        <div class="col-lg-12">
            ABSENSI DASHBOARD
            </div>
        </div>
    </div>
    <div class="row row-left">    
		<div class="col-sm-4">    
			<?php
				echo GoogleChart::widget(array('visualization' => 'PieChart',
					'data' => array(
						array('Task', 'Hours per Day'),
						array('Work', 11),
						array('Eat', 2),
						array('Commute', 2),
						array('Watch TV', 2),
						array('Sleep', 7)
					),
				'options' => array('title' => 'Employee Properties')));		
			?>
		</div>
		<div class="col-sm-4">    
			<?php
				echo GoogleChart::widget(array('visualization' => 'PieChart',
					'data' => array(
						array('Task', 'Hours per Day'),
						array('Work', 11),
						array('Eat', 2),
						array('Commute', 2),
						array('Watch TV', 2),
						array('Sleep', 7)
					),
				'options' => array('title' => 'Employee Status')));		
			?>
		</div>
	</div>
</div>