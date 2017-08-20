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
use modulprj\master\models\karyawan;
use modulprj\master\models\Dept;
use modulprj\master\models\cbg;
use modulprj\master\models\Jabatan;
use modulprj\master\models\Status;
use modulprj\sistem\models\M1000;

/*	KARTIK WIDGET -> Penambahan componen dari yii2 dan nampak lebih cantik*/
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use kartik\builder\Form;
use kartik\sidenav\SideNav;

use modulprj\assets\AppAsset; 	/* CLASS ASSET CSS/JS/THEME Author: -ptr.nov-*/
AppAsset::register($this);		/* INDEPENDENT CSS/JS/THEME FOR PAGE  Author: -ptr.nov-*/

/*Title page Modul*/
$this->mddPage = 'hrd';
$this->params['breadcrumbs'][] = $this->title;
$this->sideCorp="Employee"; 

/*variable Dropdown*/
$Combo_Dept = ArrayHelper::map(Dept::find()->all(), 'DEP_NM','DEP_NM');//->orderBy('SORT')->asArray()->all(), 'DEP_NM','DEP_NM');
$ComboDept = ArrayHelper::map(Dept::find()->all(), 'DEP_NM','DEP_NM');//->orderBy('SORT')->asArray()->all(), 'DEP_NM','DEP_NM');
$Combo_Cab=ArrayHelper::map(Cbg::find()->all(), 'CAB_NM','CAB_NM');
$Combo_Jab = ArrayHelper::map(Jabatan::find()->all(), 'JAB_NM','JAB_NM');
$Combo_Status = ArrayHelper::map(Status::find()->all(), 'KAR_STS_NM','KAR_STS_NM');

//$Combo_Corp = ArrayHelper::map(Corp::find()->orderBy('SORT')->asArray()->all(), 'CORP_NM','CORP_NM');

//$side_menu=\yii\helpers\Json::decode(M1000::find()->findMenu('hrd')->one()->jval);


	
	/*
	 * GRIDVIEW COLUMN
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	*/	

	$attDinamik =[];
	$filterWidgetOpt=[];
	$attDinamik[] =[			
			'class'=>'kartik\grid\SerialColumn',
			'contentOptions'=>['class'=>'kartik-sheet-style'],
			'width'=>'10px',
			'header'=>'No.',
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'10px',
					'font-family'=>'verdana, arial, sans-serif',
					'font-size'=>'9pt',
					'background-color'=>'rgba(97, 211, 96, 0.3)',
				]
			],
			'contentOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'10px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'9pt',
				]
			],					
	];
	/*Action*/
	$attDinamik[]=[
		'class'=>'kartik\grid\ActionColumn',
		'dropdown' => true,
		'template' => '{view}{update}{edit}{price}{lihat}',
		'dropdownOptions'=>['class'=>'pull-right dropup'],
		'buttons' => [
			'view' =>function($url, $model, $key){
					return  '<li>' .Html::a('<span class="fa fa-eye fa-dm"></span>'.Yii::t('app', 'View'),
												['/master/barang/view','id'=>$model->KAR_ID],[
												'data-toggle'=>"modal",
												'data-target'=>"#modal-view",
												'data-title'=> $model->KAR_ID,
												]). '</li>' . PHP_EOL;
			},
			'update' =>function($url, $model, $key){
					return  '<li>' . Html::a('<span class="fa fa-edit fa-dm"></span>'.Yii::t('app', 'Edit'),
												['update','id'=>$model->KAR_ID],[
												'data-toggle'=>"modal",
												'data-target'=>"#modal-create",
												'data-title'=> $model->KAR_ID,
												]). '</li>' . PHP_EOL;
			},
			'edit' =>function($url, $model, $key){
					return  '<li>' . Html::a('<span class="fa fa-edit fa-dm"></span>'.Yii::t('app', 'Create Kode Alias'),
												['createalias','id'=>$model->KAR_ID],[
												'data-toggle'=>"modal",
												'data-target'=>"#modal-create",
												'data-title'=> $model->KAR_ID,
												]). '</li>' . PHP_EOL;
			},
			'price' =>function($url, $model, $key) {
					//$gF=getPermissionEmp()->GF_ID;
					//if ($gF<=4){
						return  '<li>' . Html::a('<span class="fa fa-money fa-dm"></span>'.Yii::t('app', 'Price List Items'),
												['/master/barang/login-price-view'],[
												'data-toggle'=>"modal",
												'data-target'=>"#modal-price",
												]). '</li>' . PHP_EOL;
					//}
			},
			'lihat' =>function($url, $model, $key) {
				//$gF=getPermissionEmp()->GF_ID;
				//if ($gF<=4){
					return  '<li>' . Html::a('<span class="fa fa-user"></span>'.Yii::t('app', 'Alias Data List'),
											['/master/barang/loginalias'],[
											'data-toggle'=>"modal",
											'data-target'=>"#modal-alias",
											]). '</li>' . PHP_EOL;
				//}
			},
		],
		'headerOptions'=>[
			'style'=>[
				'text-align'=>'center',
				'width'=>'150px',
				'font-family'=>'tahoma, arial, sans-serif',
				'font-size'=>'9pt',
				'background-color'=>'rgba(97, 211, 96, 0.3)',
			]
		],
		'contentOptions'=>[
			'style'=>[
				'text-align'=>'left',
				'width'=>'150px',
				'height'=>'10px',
				'font-family'=>'tahoma, arial, sans-serif',
				'font-size'=>'9pt',
			]
		],
	
	];
	foreach($gvAttribute as $key =>$value[]){
		
		if ($value[$key]['FIELD']=='deptOne.DEP_NM'){
			$gvfilterType=GridView::FILTER_SELECT2;
			//$gvfilterType=false;
			$gvfilter =$filterDept;	
			$filterWidgetOpt=[				
					'pluginOptions'=>['allowClear'=>true],				
			];
		}elseif($value[$key]['FIELD']=='cabOne.CAB_NM'){
			$gvfilterType=false;
			$gvfilter =$filterCbg;
		}elseif($value[$key]['FIELD']=='jabOne.JAB_NM'){
			$gvfilterType=false;
			$gvfilter =$filterJab;
		}elseif($value[$key]['FIELD']=='stsOne.KAR_STS_NM'){
			$gvfilterType=false;
			$gvfilter =$filterStt;
		}elseif($value[$key]['FIELD']=='golonganOne.TT_GRP_NM'){
			$gvfilterType=false;
			$gvfilter=$filterGol;
		}elseif($value[$key]['FIELD']=='KAR_TGLM'){
			$gvfilterType=GridView::FILTER_DATE_RANGE;
			//$gvfilterType=false;
			$gvfilter=true;
			$filterWidgetOpt=[
				'attribute' =>'KAR_TGLM',
				'presetDropdown'=>TRUE,
				'convertFormat'=>true,
					'pluginOptions'=>[
						'format'=>'Y-m-d',
						'separator' => '-',
						'opens'=>'left'
					],
			];
		}else{
			$gvfilterType=false;
			$gvfilter=true;		
			$filterWidgetOpt=false;			
		};				
			
		$attDinamik[]=[		
			'attribute'=>$value[$key]['FIELD'],
			'label'=>$value[$key]['label'],
			'filterType'=>$gvfilterType,
			'filter'=>$gvfilter,
			'filterWidgetOptions'=>$filterWidgetOpt,			
			'hAlign'=>'right',
			'vAlign'=>'middle',
			//'mergeHeader'=>true,
			'noWrap'=>true,			
			'headerOptions'=>[		
					'style'=>[									
					'text-align'=>'center',
					'width'=>$value[$key]['FIELD'],
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
					'background-color'=>'rgba(97, 211, 96, 0.3)',
				]
			],  
			'contentOptions'=>[
				'style'=>[
					'text-align'=>$value[$key]['align'],
					//'width'=>'12px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
					//'background-color'=>'rgba(13, 127, 3, 0.1)',
				]
			],
			//'pageSummaryFunc'=>GridView::F_SUM,
			//'pageSummary'=>true,
			'pageSummaryOptions' => [
				'style'=>[
						'text-align'=>'right',		
						//'width'=>'12px',
						'font-family'=>'tahoma',
						'font-size'=>'8pt',	
						'text-decoration'=>'underline',
						'font-weight'=>'bold',
						'border-left-color'=>'transparant',		
						'border-left'=>'0px',									
				]
			],	
		];			
	}







    //print_r($dataProvider);												/*SHOW ARRAY YII Author: -Devandro-*/
	//echo  \yii\helpers\Json::encode($dataProvider->getModels());			/*SHOW ARRAY JESON Author: -ptr.nov-*/
$tab_employe_active= GridView::widget([
    'id'=>'active',
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
	'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],				
    'columns' => $attDinamik,
	/* [
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
            'filter' => $Combo_Dept,
        ],
        [
            //--CABANG-- Author -ptr.nov-
            'attribute' =>'cabOne.CAB_NM',
            'filter' => $Combo_Cab,
        ],
        [
            //--JABATAN-- Author -ptr.nov-
            'attribute' =>'jabOne.JAB_NM',
            'filter' => $Combo_Jab,
        ],
        [
            //--STSTUS-- Author -ptr.nov-
            'attribute' =>'stsOne.KAR_STS_NM',
            'filter' => $Combo_Status,
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
        //['class' => 'yii\grid\CheckboxColumn'],
        //['class' => '\kartik\grid\RadioColumn'],
    ], */
    'panel'=>[
        //'heading' =>true,// $hdr,//<div class="col-lg-4"><h8>'. $hdr .'</h8></div>',
        'type' =>GridView::TYPE_SUCCESS,//TYPE_WARNING, //TYPE_DANGER, //GridView::TYPE_SUCCESS,//GridView::TYPE_INFO, //TYPE_PRIMARY, TYPE_INFO
        //'after'=> Html::a('<i class="glyphicon glyphicon-plus"></i> Add', '#', ['class'=>'btn btn-success']) . ' ' .
            //Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Save', ['class'=>'btn btn-primary']) . ' ' .
        //    Html::a('<i class="glyphicon glyphicon-remove"></i> Delete  ', '#', ['class'=>'btn btn-danger'])
        'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'Create {modelClass}',
                ['modelClass' => 'Karyawan',]),
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

$tab_employe_resign= GridView::widget([
    'id'=>'resign',
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
            'filter' => $Combo_Dept,
        ],
        [
            //--CABANG-- Author -ptr.nov-
            'attribute' =>'cabOne.CAB_NM',
            'filter' => $Combo_Cab,
        ],
        [
            //--JABATAN-- Author -ptr.nov-
            'attribute' =>'jabOne.JAB_NM',
            'filter' => $Combo_Jab,
        ],
        [
            //--STSTUS-- Author -ptr.nov-
            'attribute' =>'stsOne.KAR_STS_NM',
            'filter' => $Combo_Status,
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
                        'separator' => '-',
                        'opens'=>'left'
                    ],
                    //'pluginEvents' => [
                    //	"apply.daterangepicker" => "function() { aplicarDateRangeFilter('EMP_JOIN_DATE') }",
                    //]
                ]),

        ],
        //['class' => 'yii\grid\CheckboxColumn'],
        //['class' => '\kartik\grid\RadioColumn'],
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


	/* echo Breadcrumbs::widget([
				'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			]);
	*/
	$items=[
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Employe Active','content'=>$tab_employe_active,
			//'active'=>true,

		],
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Employe Resign','content'=>$tab_employe_resign,
		],
        /*
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Test Affix','content'=>$KiriMenu.$affk,//$sortImg,// ,
		],
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Alrt','content'=>$strRat,//$sortImg,// ,
		],
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> RATING','content'=>$strRat,//$sortImg,// ,
		],
		*/

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

