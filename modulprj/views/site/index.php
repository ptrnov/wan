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
								'heading' => '<div>Employee Dashboard</div>',
								'body'=>$prof,
							],
							Html::TYPE_DANGER
						);
						?>
				</div>
			</div>
		   <div class="row" >
				<div class="col-xs-12 col-sm-6 col-dm-4  col-lg-4">
					<?php
						echo Html::panel([
								'id'=>'widget',
								'heading' => '<b>WIDGET</b>',
								'postBody' => Html::listGroup([
										[
											'content' => '<span class="fa fa-folder-open fa-lg"></span>'. '   '. 'Berita Acara',
											'url' => '#',
											'badge' => ''
										],										
										[
											'content' => '<span class="fa fa-sticky-note-o fa-lg"></span>'. '   '.'Memo',
											'url' => '#',
											'badge' => ''
										],										
										[
											'content' =>'<span class="fa fa-user-plus fa-lg"></span>'. '   '. 'Profile',
											'url' => '#',
											
										],										

									]),
							],
							Html::TYPE_DANGER
						);
					?>
				</div>
				<div class="col-xs-12 col-sm-6 col-dm-4  col-lg-4" >
					
					<?php
						echo Html::panel([
								'id'=>'task',
								'heading' => '<b>DATA MANAGE </b>',
								'postBody' => Html::listGroup([														
										[
											'content' =>'<span class="fa fa-tags fa-lg"></span>'. '   '. 'Employee',
											'url' => '/master/employe',
											'badge' => ''
										],									
										[
											'content' => '<span class="fa fa-upload fa-lg"></span>'. '   '.'Arsip File',
											'url' => '#',
											'badge' => ''
										],
										[
											'content' => '<span class="fa fa-book fa-lg"></span>'. '   '.'Documentation',
											'url' => '#',
											'badge' => ''
										],									

									]),
							],
							Html::TYPE_DANGER
						);
					?>
				</div>
				<div class="col-xs-12 col-sm-6 col-dm-4  col-lg-4" >
				<?php
						echo Html::panel([
								'id'=>'approval',
								'heading' => '<b>REQUEST AND APPROVAL</b>',
								'postBody' => Html::listGroup([
										[
											'content' => '<span class="fa fa-sitemap fa-lg"></span>'. '   '.'Struktur Organization ',
											'url' => '#'
										],										
										[
											'content' => '<span class="fa fa-calculator fa-lg"></span>'. '   '.'Request Overtime',
											'url' => '#',
											'badge' => ''
										],
										[
											'content' => '<span class="fa fa-exchange fa-lg"></span>'. '   '.'SPJD',
											'url' => '#',
											'badge' => ''
										],
									]),
							],
							Html::TYPE_DANGER
						);
					?>
					
				</div>				
			</div>		
			<div class="row" >
				<div class="col-xs-12 col-sm-12 col-dm-12  col-lg-12" >
					<div class="pre-scrollable alert alert-info" style="height:75px">				  
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