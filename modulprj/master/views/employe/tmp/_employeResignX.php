<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use kartik\builder\Form;


$empResign= GridView::widget([
    'id'=>'resign-emp',
    'dataProvider' => $dataProvider1,
    'filterModel' => $searchModel1,
    'columns' => [
        //['class' => 'yii\grid\SerialColumn'],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view}',
            //'template' => '{view} {update}',
            //Yii::t('app', 'Emplo'),
        ],

        [
            // Author -ptr.nov- image
            'attribute' => 'PIC',
            'format' => 'html', //'format' => 'image',
            'value'=>function($data){
                    return Html::img(Yii::getAlias('@HRD_EMP_UploadUrl') . '/'. $data->EMP_IMG, ['width'=>'40']);
                },
        ],

        'KAR_ID',
        'KAR_NM',

        [
            //--DEPARMENT-- Author -ptr.nov-
            'attribute' =>'deptOne.DEP_NM',
            'filter' => $aryDept,
        ],
        [
            //--CABANG-- Author -ptr.nov-
            'attribute' =>'cabOne.CAB_NM',
            'filter' => $aryCbgID,
        ],
        [
            //--JABATAN-- Author -ptr.nov-
            'attribute' =>'jabOne.JAB_NM',
            'filter' => $aryJab,
        ],
        [
            //--STSTUS-- Author -ptr.nov-
            'attribute' =>'stsOne.KAR_STS_NM',
            'filter' => $aryStt,
        ],
        [
            'attribute' =>'KAR_TGLM',
            'filterType'=> \kartik\grid\GridView::FILTER_DATE_RANGE,
            'filterWidgetOptions' =>([
                    'attribute' =>'KAR_TGLM',
                    'presetDropdown'=>TRUE,
                    'convertFormat'=>true,
                    'pluginOptions'=>[
                        'format'=>'Y-m-d',
                        'separator' => ' TO ',
                        'opens'=>'left'
                    ],
                    //'pluginEvents' => [
                    //	"apply.daterangepicker" => "function() { aplicarDateRangeFilter('EMP_JOIN_DATE') }",
                    //]
                ]),

        ],
        [
            'attribute' =>'KAR_TGLK',
            'filterType'=> \kartik\grid\GridView::FILTER_DATE_RANGE,
            'filterWidgetOptions' =>([
                    'attribute' =>'KAR_TGLK',
                    'presetDropdown'=>TRUE,
                    'convertFormat'=>true,
                    'pluginOptions'=>[
                        'format'=>'Y-m-d',
                        'separator' => ' TO ',
                        'opens'=>'left'
                    ],
                    //'pluginEvents' => [
                    //	"apply.daterangepicker" => "function() { aplicarDateRangeFilter('EMP_JOIN_DATE') }",
                    //]
                ]),

        ],
    ],
    'panel'=>[
        //'heading' =>true,// $hdr,//<div class="col-lg-4"><h8>'. $hdr .'</h8></div>',
        'type' =>GridView::TYPE_SUCCESS,//TYPE_WARNING, //TYPE_DANGER, //GridView::TYPE_SUCCESS,//GridView::TYPE_INFO, //TYPE_PRIMARY, TYPE_INFO
        //'after'=> Html::a('<i class="glyphicon glyphicon-plus"></i> Add', '#', ['class'=>'btn btn-success']) . ' ' .
        //Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Save', ['class'=>'btn btn-primary']) . ' ' .
        //    Html::a('<i class="glyphicon glyphicon-remove"></i> Delete  ', '#', ['class'=>'btn btn-danger'])
		

    ],
    'pjax'=>true,
    'pjaxSettings'=>[
        'options'=>[
            'enablePushState'=>false,
            'id'=>'resign-emp',
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

?>

	<?=$empResign?>
