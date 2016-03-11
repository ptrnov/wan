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
use modulprj\models\hrd\Karyawan;
/*	KARTIK WIDGET -> Penambahan componen dari yii2 dan nampak lebih cantik*/
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use kartik\builder\Form;
//use \modulprj\models\hrd\Karyawan;
use backend\assets\AppAsset; 	/* CLASS ASSET CSS/JS/THEME Author: -ptr.nov-*/
AppAsset::register($this);		/* INDEPENDENT CSS/JS/THEME FOR PAGE  Author: -ptr.nov-*/

/*Title page Modul*/
$this->mddPage = 'absensi';
$this->title = Yii::t('app', 'Employe Finger');
$this->params['breadcrumbs'][] = $this->title;
//$combo_Mesin=ArrayHelper::map(\modulprj\models\hrd\Mesin::find()->orderBy('MESIN_NM')->asArray()->all(), 'TerminalID','MESIN_NM,CAB_ID','');
//$combo_Mesin=Karyawan::find()->where(['KAR_ID'=>'SYS.HO.000002'])->one();
//echo  \yii\helpers\Json::encode($combo_Mesin);

	/*DEPARTMENT Author: -ptr.nov */
	//print_r($dataProvider);
	$widget_finger= GridView::widget([
		'dataProvider' => $dataProvider_Finger,
		'filterModel' => $searchModel_Finger,
		'columns' => [
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
			//['class' => 'yii\grid\SerialColumn'],
			'NO_URUT',
            'KAR_ID',
            [
               'attribute' => 'karOne.KAR_NM',
               'filter' =>ArrayHelper::map(\modulprj\models\hrd\Karyawan::find()->orderBy('KAR_NM')->asArray()->all(), 'KAR_NM','KAR_NM')
            ],
            'TerminalID',
            [
                'attribute' =>'mesinOne.MESIN_NM',
                'filter' =>ArrayHelper::map(\modulprj\models\hrd\Mesin::find()->orderBy('MESIN_NM')->asArray()->all(), 'MESIN_NM','MESIN_NM'),//$combo_Mesin,
            ],
            //'FingerPrintID',
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' =>'FingerPrintID',
                //'readonly'=>function($model, $key, $index, $widget) {
                //        return (10==$model->STATUS); // do not allow editing of inactive records
                //    },
                'editableOptions' => [
                    'header' => 'Finger Print',
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT,
                    //'options' => [
                    //    'pluginOptions' => ['min'=>0, 'max'=>5000]
                    // ]
                ],

            ],

        ],
		'panel'=>[
            //'heading' =>true,// $hdr,//<div class="col-lg-4"><h8>'. $hdr .'</h8></div>',
            'type' =>GridView::TYPE_SUCCESS,//TYPE_WARNING, //TYPE_DANGER, //GridView::TYPE_SUCCESS,//GridView::TYPE_INFO, //TYPE_PRIMARY, TYPE_INFO
            //'after'=> Html::a('<i class="glyphicon glyphicon-plus"></i> Add', '#', ['class'=>'btn btn-success']) . ' ' .
            //Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Save', ['class'=>'btn btn-primary']) . ' ' .
            //    Html::a('<i class="glyphicon glyphicon-remove"></i> Delete  ', '#', ['class'=>'btn btn-danger'])
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'Create {modelClass}',
                        ['modelClass' => 'Employee Finger',]),
                    ['create'], ['class' => 'btn btn-success']),
        ],
        'pjax'=>true,
        'pjaxSettings'=>[
            'options'=>[
                'enablePushState'=>false,
                'id'=>'active',
            ],
        ],
        'hover'=>true, //cursor select
        'responsive'=>true,
        'bordered'=>true,
        'striped'=>true,
        //'autoXlFormat'=>true,
        'export'=>[//export like view grid --ptr.nov-
            'fontAwesome'=>true,
            'showConfirmAlert'=>false,
            'target'=>GridView::TARGET_BLANK
        ],
	]);


$items=[
    [
        'label'=>'<i class="glyphicon glyphicon-home"></i> Employe Finger List','content'=>$widget_finger,
        //'active'=>true,

    ],

];



echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    //'height'=>'tab-height-xs',
    'bordered'=>true,
    'encodeLabels'=>false,
    //'align'=>TabsX::ALIGN_LEFT,

]);
?>

