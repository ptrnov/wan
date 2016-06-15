<?php
use kartik\helpers\Html;
use kartik\detail\DetailView;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveField;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\widgets\FileInput;
use kartik\builder\FormGrid;
use kartik\tabs\TabsX;
use yii\helpers\Url;

$modelUser=\Yii::$app->getUserOpt->Profile_user();
$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL,'options'=>['enctype'=>'multipart/form-data']]);
	$ProfAttribute1 = [
		[
			'label'=>'',
			'attribute' =>'EMP_IMG',
			'value'=>Yii::getAlias('@web').'/upload/hrd/Employee/'.$modelUser['EMP_IMG'],
			'format'=>['image',['width'=>'auto','height'=>'auto']],       
		],
	];
	
	//$this->title = 'Workbench <i class="fa fa fa-coffee"></i> ' . $model->EMP_NM . ' ' . $model->EMP_NM_BLK .'</a>';
	$prof=$this->render('login_index/_info', [
		'model' => $modelUser,
	]);

	$EmpDashboard=$this->render('login_index/_dashboard', [
		'model' => $model,
	]);

	/**
     * Logoff
	 * @author ptrnov  <ptr.nov@gmail.com>
	 * @since 1.1
     */
	function tombolLentera(){		
		$title1 = Yii::t('app', ' . . . read-more');
		$options1 = [ 'id'=>'lentera',						  
					  'data-target'=>"#dashboard-lentera",
					  'style'=>'color:rgba(255, 255, 19, 1)',
		]; 
		//$icon1 = '<span class="fa fa-power-off fa-lg"></span>';
		$label1 = $title1; //$icon1 . ' ' . $title1;
		$url1 = Url::toRoute(['/sistem/user-profile/lentera']);//,'kd'=>$kd]);
		$content = Html::a($label1,$url1, $options1);
		return $content;
	}
?>

	<div class="container-fluid" style="padding-left: 20px; padding-right: 20px" >			
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-dm-12  col-lg-12">
						<?php
						echo Html::panel(
							[
								'heading' => '<div>Dashboard</div>',
								'body'=>$prof,
							],
							Html::TYPE_INFO
						);
						?>
				</div>
			</div>
		   <div class="row" >
				<?php
					$permission=2;
					if($permission=='1'){
						$indexTampil=$this->render('indexHIRS');
					}elseif($permission=='2'){
						$indexTampil=$this->render('indexACCT');
					};				
				?>
				<?=$indexTampil?>
			</div>		
			<div class="row" >
				<div class="col-xs-12 col-sm-12 col-dm-12  col-lg-12" >
					<div class="pre-scrollable alert alert-info" style="height:100px">				  
					  <strong> General Information  </strong> <span class='fa fa-fire fa-lg'> </span>
						<br> 
						<?php echo ' '. tombolLentera(); ?>
						</br>
					</div>			
				</div>
			</div>
	 </div>

<!-- <script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>!-->
</body>
</html>
<?php ActiveForm::end(); ?>