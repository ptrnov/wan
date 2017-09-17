<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\base\DynamicModel;
use modulprj\absensi\models\AbsenImportFile;
$model = new AbsenImportFile();
$this->registerCss("
	/**
	 * CSS - Border radius Sudut.
	 * piter novian [ptr.nov@gmail.com].
	 * 'clientOptions' => [
	 *		'backdrop' => FALSE, //Static=disable, false=enable
	 *		'keyboard' => TRUE,	// Kyboard 
	 *	]
	*/
	.modal-content { 
		border-radius: 5px;
	}
	
");

/**
* ===============================
 * Button Permission.
 * Modul ID	: 11
 * Author	: ptr.nov2gmail.com
 * Update	: 01/02/2017
 * Version	: 2.1
 * ===============================
*/
	function getPermission(){
		if (Yii::$app->getUserOpt->Modul_akses('11')){
			return Yii::$app->getUserOpt->Modul_akses('11');
		}else{
			return false;
		}
	}
	/*
	 * Backgroun Icon Color.
	*/
	function bgIconColor(){
		//return '#f08f2e';//kuning.
		//return '#1eaac2';//biru Laut.
		return '#25ca4f';//Hijau.
	}
	
	
/**
* ===============================
 * Button & Link Modal Import
 * Author	: ptr.nov2gmail.com
 * Update	: 05/09/2017
 * Version	: 2.1
 * ===============================
*/
	/*
	 * LINK BUTTON : Link Button Refresh
	*/
	function tombolRefresh(){
		$paramFile=Yii::$app->getRequest()->getQueryParam('id');
		$title = Yii::t('app','Refresh');
		$url =  Url::toRoute(['/absensi/absen-import','id'=>$paramFile]);
		$options = ['id'=>'tmp-id-refresh',
				  'data-pjax' => true,
				  'class'=>"btn btn-warning btn-xs",
				  'title'=>'Refresh'
				];
		$icon = '<span class="fa-stack fa-sm text-left">
				  <b class="fa fa-circle fa-stack-2x" style="color:#ffffff"></b>
				  <b class="fa fa-history fa-stack-1x" style="color:#000000"></b>
				</span>
		';
		$label = $icon.' '.$title ;
		return $content = Html::a($label,$url,$options);
	}
	
	/*
	 * LINK BUTTON : Link Button Refresh
	*/
	function tombolClear(){
		$title = Yii::t('app','Clear');
		$url =  Url::toRoute(['/absensi/absen-import/clear-tmp']);
		$options = ['id'=>'tmp-id-clear',
				  'data-pjax' => true,
				  'class'=>"btn btn-danger btn-xs",
				  'title'=>'Clear Data'
				];
		$icon = '<span class="fa-stack fa-sm text-left">
				  <b class="fa fa-circle fa-stack-2x" style="color:#ffffff"></b>
				  <b class="fa fa-trash fa-stack-1x" style="color:#000000"></b>
				</span>
		';
		$label = $icon.' '.$title ;
		return $content = Html::a($label,$url,$options);
	}
	
	/*
	 * LINK BUTTON : Link Button Refresh
	*/
	function tombolRefreshLog(){
		$title = Yii::t('app','Refresh');
		$url =  Url::toRoute(['/absensi/absen-import#ai-tab1']);
		$options = ['id'=>'actual-id-refresh',
				  'data-pjax' => true,
				  'class'=>"btn btn-warning btn-xs",
				  'title'=>'Refresh'
				];
		$icon = '<span class="fa-stack fa-sm text-left">
				  <b class="fa fa-circle fa-stack-2x" style="color:#ffffff"></b>
				  <b class="fa fa-history fa-stack-1x" style="color:#000000"></b>
				</span>
		';
		$label = $icon.' '.$title ;
		return $content = Html::a($label,$url,$options);
	}
	
	/*
	 * TEMPORARY: CREATE
	*/
	function tombolCreateTmp(){
		// if(getPermission()){
			// if(getPermission()->BTN_PROCESS1==1){				
				$title= Yii::t('app','Add');
				$url = Url::toRoute(['/absensi/absen-import/create-tmp']);
				$options1 = ['value'=>$url,
							'id'=>'import-button-create',
							'data-pjax' => false,
							'class'=>"btn btn-success btn-xs",
							'title'=>'Tambah Data Secara Manual'
				];
				$icon1 = '<span class="fa-stack fa-sm text-left">
						  <b class="fa fa-circle fa-stack-2x" style="color:#ffffff"></b>
						  <b class="fa fa-plus fa-stack-1x" style="color:#000000"></b>
						</span>
				';
				$label1 = $icon1.' '.$title ;
				$content = Html::button($label1,$options1);
				return $content;
			// }
		// }
	}
	
	/*
	 * TEMPORARY: PERIODE
	*/
	function tombolCreatePeriode(){
		// if(getPermission()){
			// if(getPermission()->BTN_PROCESS1==1){				
				$title= Yii::t('app','Set Periode');
				$url = Url::toRoute(['/absensi/absen-import/create-periode']);
				$options1 = ['value'=>$url,
							'id'=>'import-button-periode',
							'data-pjax' => false,
							'class'=>"btn btn-success btn-xs",
							'title'=>'Setting Periode Aktif'
				];
				$icon1 = '<span class="fa-stack fa-sm text-left">
						  <b class="fa fa-circle fa-stack-2x" style="color:#ffffff"></b>
						  <b class="fa fa-calendar fa-stack-1x" style="color:#000000"></b>
						</span>
				';
				$label1 = $icon1.' '.$title ;
				$content = Html::button($label1,$options1);
				return $content;
			// }
		// }
	}
	
	/*
	 * ACTUAL: CREATE
	*/
	function tombolCreateAct(){
		// if(getPermission()){
			// if(getPermission()->BTN_PROCESS1==1){				
				$title1 = Yii::t('app','Add');
				$url = Url::toRoute(['/absensi/absen-import/create-act']);
				$options1 = ['value'=>$url,
							'id'=>'import-button-create',
							'data-pjax' => true,
							'class'=>"btn btn-success btn-xs",
							'title'=>'Tambah Data Secara Manual'
				];
				$icon = '<span class="fa-stack fa-sm text-left">
						  <b class="fa fa-circle fa-stack-2x" style="color:#ffffff"></b>
						  <b class="fa fa-plus fa-stack-1x" style="color:#000000"></b>
						</span>
				';
				$label1 = $icon1.' '.$title ;
				$content = Html::button($label1,$options1);
				return $content;
			// }
		// }
	}
	
	/*
	 * LINK EXPORT FORMAT
	*/
	function tombolExportFormat(){
		// if(getPermission()){
			// if(getPermission()->BTN_PROCESS1==1){
				$title1 = Yii::t('app', 'Download Format');
				$url = Url::toRoute(['/absensi/absen-import/export']);
				$options1 = [
							'id'=>'import-button-export-formula',
							'data-pjax' => true,
							'class'=>"btn btn-info btn-xs",
							'title'=>'Download Format'
				];
				$icon1 = '<span class="fa-stack fa-sm text-left">
						  <b class="fa fa-circle fa-stack-2x" style="color:#ffffff"></b>
						  <b class="fa fa-download fa-stack-1x" style="color:#000000"></b>
						</span>';
				$label1 = $icon1 . ' ' . $title1;
				$content = Html::a($label1,$url,$options1);
				return $content;
			// }
		// }
	}

	/*
	 * UPLOAD BUTTON
	*/
	function tombolUpload(){
		// if(getPermission()){
			// if(getPermission()->BTN_PROCESS1==1){				
				$title1 = Yii::t('app','Upload Absensi');
				//$url = Url::toRoute(['/absensi/absen-import/upload']);
				$options1 = [
							//'value'=>$url,
							//'id'=>'import-button-upload',
							'data-toggle'=>"modal",
							'data-target'=>"#file-import",
							'data-pjax' => true,
							'class'=>"btn btn-danger btn-xs",
							'title'=>'Upload Absensi'
				];
				$icon1 = '<span class="fa-stack fa-sm text-left">
						  <b class="fa fa-circle fa-stack-2x" style="color:#ffffff"></b>
						  <b class="fa fa-upload fa-stack-1x" style="color:#000000"></b>
						</span>
				';
				$label1 = $icon1 . ' ' . $title1;
				$content = Html::a($label1,'',$options1);
				return $content;
			// }
		// }
	}
	
	/*
	 * LINK SYNC DATABASE
	*/
	function tombolSync(){
		// if(getPermission()){
			// if(getPermission()->BTN_PROCESS1==1){
				$title1 = Yii::t('app', 'Save');
				$url = Url::toRoute(['/absensi/absen-import/sync']);
				$options1 = ['value'=>$url,
							'id'=>'import-button-save-db',
							'data-pjax' => false,
							'class'=>"btn btn-primary btn-xs",
							'title'=>'Save to Database'
				];
				// $options1 = [
							// 'data-toggle'=>"modal",
							// 'data-target'=>"#sync_save",
							// 'data-pjax' => true,
							// 'class'=>"btn btn-primary btn-xs",
							// 'title'=>'Save to Database'							
				// ]; 
				$icon1 = '<span class="fa-stack fa-sm text-left">
						  <b class="fa fa-circle fa-stack-2x" style="color:#ffffff"></b>
						  <b class="fa fa-save fa-stack-1x" style="color:#000000"></b>
						</span>';
				$label1 = $icon1 . ' ' . $title1;
				$content = Html::button($label1,$options1);
				return $content;
			// }
		// }
	}
	
	/*
	 * LINK BUTTON : Button - EXPORT EXCEL.
	*/
	function tombolExportExcel(){
		// if(getPermission()){
			// if(getPermission()->BTN_PROCESS1==1){
				$title1 = Yii::t('app', ' Export Excel');
				$url = Url::toRoute(['/absensi/absen-import/export']);
				$options1 = [
							'id'=>'import-button-export-excel',
							'data-pjax' => true,
							'class'=>"btn btn-info btn-sm"  
				];
				$icon1 = '<span class="fa fa-clone fa-lg"></span>';
				$label1 = $icon1 . ' ' . $title1;
				$content = Html::a($label1,$url,$options1);
				return $content;
			// }
		// }
	}		
		
	/*
	 *  TEMPORARY = VIEW
	*/
	function tombolReviewTmp($url, $model){
		// if(getPermission()){
			//Jika BTN_CREATE Show maka BTN_CVIEW Show.
			// if(getPermission()->BTN_VIEW==1 OR getPermission()->BTN_CREATE==1){
				$title1 = Yii::t('app',' Review');
				$options1 = [
					'value'=>url::to(['/absensi/absen-import/view-tmp','id'=>$model->ID]),
					'id'=>'import-button-review',
					'class'=>"btn btn-default btn-xs",    
					'style'=>['text-align'=>'left','width'=>'100%', 'height'=>'25px','border'=> 'none'],
				];
				$icon1 = '
					<span class="fa-stack fa-xs">																	
						<i class="fa fa-circle-thin fa-stack-2x " style="color:'.bgIconColor().'"></i>
						<i class="fa fa-eye fa-stack-1x" style="color:black"></i>
					</span>
				';      
				$label1 = $icon1 . '  ' . $title1;
				$content = Html::button($label1,$options1);		
				return '<li>'.$content.'</li>';
			// }
		// }
	}
	
	/*
	 *  TEMPORARY = DELETE
	*/
	function tombolDeleteTmp($url, $model){
		// if(getPermission()){
			//Jika BTN_CREATE Show maka BTN_CVIEW Show.
			// if(getPermission()->BTN_VIEW==1 OR getPermission()->BTN_CREATE==1){
				$title1 = Yii::t('app', ' Delete');
				//$url = Url::toRoute(['/absensi/absen-import/sync']);
				//$url = Url::toRoute(['/absensi/absen-import/delete-tmp','id'=>$model->ID]);
				$url = Url::toRoute(['/absensi/absen-import/delete-tmp','id'=>$model->ID]);
				$options1 = [
							'id'=>'tmp-button-delete',
							'class'=>"btn btn-default btn-xs",
							//'title'=>'Save to Database',		
							'style'=>['text-align'=>'left','color:red','margin-left'=>'0px','width'=>'100%', 'height'=>'25px','border'=> 'none'],								
				];
				$icon1 = '<span class="fa-stack fa-sm text-left">
						  <b class="fa fa-circle-thin fa-stack-2x" style="color:red"></b>
						  <b class="fa fa-remove fa-stack-1x" style="color:red"></b>
						</span>';
				$label1 = $icon1 . ' ' . $title1;
				$content = Html::a($label1,$url,$options1);
				return $content;
				//return '<li>'.$content.'</li>';

			// }
		// }
	}
	
	/*
	 *  ACTION : VIEW.
	*/
	function tombolReview($url, $model){
		// if(getPermission()){
			//Jika BTN_CREATE Show maka BTN_CVIEW Show.
			// if(getPermission()->BTN_VIEW==1 OR getPermission()->BTN_CREATE==1){
				$title1 = Yii::t('app',' Review');
				$options1 = [
					'value'=>url::to(['/absensi/absen-import/view','id'=>$model->ID]),
					'id'=>'import-button-review',
					'class'=>"btn btn-default btn-xs",    
					'style'=>['text-align'=>'left','width'=>'100%', 'height'=>'25px','border'=> 'none'],
				];
				$icon1 = '
					<span class="fa-stack fa-xs">																	
						<i class="fa fa-circle-thin fa-stack-2x " style="color:'.bgIconColor().'"></i>
						<i class="fa fa-eye fa-stack-1x" style="color:black"></i>
					</span>
				';      
				$label1 = $icon1 . '  ' . $title1;
				$content = Html::button($label1,$options1);		
				return '<li>'.$content.'</li>';
			// }
		// }
	}
	
	/*
	 *  ACTUAL = DELETE
	*/
	function tombolDelete($url, $model){
		// if(getPermission()){
			//Jika BTN_CREATE Show maka BTN_CVIEW Show.
			// if(getPermission()->BTN_VIEW==1 OR getPermission()->BTN_CREATE==1){
				$title1 = Yii::t('app', ' Delete');
				$url = Url::toRoute(['/absensi/absen-import/delete-act','id'=>$model->ID]);
				$options1 = [
					'id'=>'actual-delete',
					'class'=>"btn btn-default btn-xs",
					//'title'=>'Save to Database',		
					'style'=>['text-align'=>'left','color:red','margin-left'=>'0px','width'=>'100%', 'height'=>'25px','border'=> 'none'],								
				];
				$icon1 = '<span class="fa-stack fa-sm text-left">
						  <b class="fa fa-circle-thin fa-stack-2x" style="color:red"></b>
						  <b class="fa fa-remove fa-stack-1x" style="color:red"></b>
						</span>';
				$label1 = $icon1 . ' ' . $title1;
				$content = Html::a($label1,$url,$options1);
				return $content;
				//return '<li>'.$content.'</li>';

			// }
		// }
	}
		
	/**
	 * ===============================
	 * Modal store
	 * Author	: ptr.nov2gmail.com
	 * Update	: 21/01/2017
	 * Version	: 2.1
	 * ==============================
	*/
	$modalHeaderColor='#fbfbfb';//' rgba(74, 206, 231, 1)';
	
	/*
	 * ABSENT IMPORT - REVIEW.
	*/
	Modal::begin([
		'id' => 'import-modal-review',
		'header' => '
			<span class="fa-stack fa-xs">																	
				<i class="fa fa-circle fa-stack-2x " style="color:'.bgIconColor().'"></i>
				<i class="fa fa-eye fa-stack-1x" style="color:#fbfbfb"></i>
			</span><b> REVIEW IMPORT </b>
		',	
		'size' => 'modal-dm',
		//'options' => ['class'=>'slide'],
		'headerOptions'=>[
			'style'=> 'border-radius:5px; background-color:'.$modalHeaderColor,
			//'toggleButton' => ['label' => 'click me'],
		],
		//'clientOptions' => ['backdrop' => 'static', 'keyboard' => TRUE]
		'clientOptions' => [
			'backdrop' => FALSE, //Static=disable, false=enable
			'keyboard' => TRUE,	// Kyboard 
		]
	]);
	echo "<div id='import-modal-content-review'></div>";
	Modal::end();
	
	/*
	 * TEMPORARY/ACTUAL: MODAL CREATE.
	*/
	Modal::begin([
		'id' => 'import-modal-create',
		'header' => '
			<span class="fa-stack fa-xs">																	
				<i class="fa fa-circle fa-stack-2x " style="color:'.bgIconColor().'"></i>
				<i class="fa fa-pencil-square-o fa-stack-1x" style="color:#fbfbfb"></i>
			</span><b> Add Log Absensi </b>
		',	
		'size' => 'modal-dm',
		//'options' => ['class'=>'slide'],
		'headerOptions'=>[
			'style'=> 'border-radius:5px; background-color:'.$modalHeaderColor,
			//'toggleButton' => ['label' => 'click me'],
		],
		//'clientOptions' => ['backdrop' => 'static', 'keyboard' => TRUE]
		'clientOptions' => [
			'backdrop' => FALSE, //Static=disable, false=enable
			'keyboard' => TRUE,	// Kyboard 
		]
	]);
	echo "<div id='import-modal-content-create'></div>";
	Modal::end();
	
	/*
	 * UPLOAD.
	*/
	Modal::begin([
		'id' => 'file-import',
		'header' => '
			<span class="fa-stack fa-xs">																	
				<i class="fa fa-circle fa-stack-2x " style="color:'.bgIconColor().'"></i>
				<i class="fa fa-upload fa-stack-1x" style="color:#fbfbfb"></i>
			</span><b> Upload Excel Data Absensi </b>
		',	
		'size' => 'modal-dm',
		//'options' => ['class'=>'slide'],
		'headerOptions'=>[
			'style'=> 'border-radius:5px; background-color:'.$modalHeaderColor,
			//'toggleButton' => ['label' => 'click me'],
		],
		//'clientOptions' => ['backdrop' => 'static', 'keyboard' => TRUE]
		'clientOptions' => [
			'backdrop' => FALSE, //Static=disable, false=enable
			'keyboard' => TRUE,	// Kyboard 
		]
	]);
		$form = ActiveForm::begin([
			'options'=>['enctype'=>'multipart/form-data'], // important,
			'method' => 'post',
			'action' => ['/absensi/absen-import/upload'],
		]);
			echo $form->field($model, 'uploadExport')->widget(FileInput::classname(), [
				'options' => ['accept' => '*'],
				'pluginOptions' => [
					'showPreview' => false,
					'showUpload' => false,
					//'uploadUrl' => Url::to(['/sales/import-data/upload']),
				] 
			])->label("Upload for Import");
			echo '<div style="text-align:right; padding-top:10px">';
			echo Html::submitButton('Upload',['class' => 'btn btn-success']);
			echo '</div>';
		ActiveForm::end();
	Modal::end();
	
	/**
	 * MODAL NOTIFY ERROR : WRONG FORMAT
	*/
	Modal::begin([
		'id' => 'msg-erro-format',
		//'header' => 'WARNING',
		'header' => '
			<span class="fa-stack fa-xs">																	
				<i class="fa fa-circle fa-stack-2x " style="color:black"></i>
				<i class="fa fa-remove fa-stack-1x" style="color:red"></i>
			</span><b> WARNING </b>
		',	
		'size' => Modal::SIZE_SMALL,
		'headerOptions'=>[
			'style'=> 'border-radius:5px; background-color:rgba(142, 202, 223, 0.9)'
		]
	]);
		echo "<div>Check Excel File Format Data<br>";
		echo "1.Pastikan Format nilai sudah sesuai.</br>";
		echo "2.Pastikan Nama Sheet 'import-absensi' </br>";
		echo "</div>";
	Modal::end();
	
	
	/*
	 * SAVE TO DATABASE 
	*/
	Modal::begin([
		//'id' => 'sync_save',
		'id' => 'import-modal-save-db',
		'header' => '
			<span class="fa-stack fa-xs">																	
				<i class="fa fa-circle fa-stack-2x " style="color:red"></i>
				<i class="fa fa-save fa-stack-1x" style="color:#fbfbfb"></i>
			</span><b> Save to Database</b>
		',	
		'size' => 'modal-sm',
		//'options' => ['class'=>'slide'],
		'headerOptions'=>[
			'style'=> 'border-radius:5px; background-color:'.$modalHeaderColor,
			//'toggleButton' => ['label' => 'click me'],
		],
		//'clientOptions' => ['backdrop' => 'static', 'keyboard' => TRUE]
		'clientOptions' => [
			'backdrop' => FALSE, //Static=disable, false=enable
			'keyboard' => TRUE,	// Kyboard 
		]
	]);
		echo "<div id='import-modal-content-save-db'></div>";
		/* $form = ActiveForm::begin([
			'method' => 'post',
			'action' => ['/absensi/absen-import/sync'],
		]);		
			$sql="SELECT sum(STATUS) FROM absen_import_tmp";		
			$sumStt=Yii::$app->db->createCommand($sql)->queryScalar();
			if($sumStt==0){
				echo '<div style="text-align:center; padding-top:10px">';
				echo Html::submitButton('PROCCESS SAVE',['class' => 'btn btn-success']);
				echo '</div>';
			}else{
				echo '<div style="text-align:center; padding-top:10px">';
				echo 'Data Import belum benar,Pastikan data sudah benar !';
				echo '</div>';
			}			
		ActiveForm::end(); */
	Modal::end();
	
	/*
	 * PERIODE.
	*/
	Modal::begin([
		//'id' => 'sync_save',
		'id' => 'import-modal-periode',
		'header' => '
			<span class="fa-stack fa-xs">																	
				<i class="fa fa-circle fa-stack-2x " style="color:red"></i>
				<i class="fa fa-calendar fa-stack-1x" style="color:#fbfbfb"></i>
			</span><b> SET PERIODE ACTIVE</b>
		',	
		'size' => 'modal-sm',
		//'options' => ['class'=>'slide'],
		'headerOptions'=>[
			'style'=> 'border-radius:5px; background-color:'.$modalHeaderColor,
			//'toggleButton' => ['label' => 'click me'],
		],
		//'clientOptions' => ['backdrop' => 'static', 'keyboard' => TRUE]
		'clientOptions' => [
			'backdrop' => FALSE, //Static=disable, false=enable
			'keyboard' => TRUE,	// Kyboard 
		]
	]);
		echo "<div id='import-modal-content-periode'></div>";
	Modal::end();
	
	
	
?>