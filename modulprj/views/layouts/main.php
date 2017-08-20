<?php

//use Yii;
use kartik\helpers\Html;
use yii\bootstrap\Carousel;
use kartik\form\ActiveForm;
use kartik\nav\NavX;
use kartik\sidenav\SideNav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use kartik\icons\Icon;
use dmstr\widgets\Alert;
use modulprj\sistem\models\UserloginSearch;
//use modulprj\sistem\models\M1000;	
use modulprj\sistem\models\M1000;			
//use modulprj\assets\AppAsset;
use mdm\admin\components\MenuHelper;
use yii\bootstrap\Modal;
//AppAsset::register($this);
dmstr\web\AdminLteAsset::register($this);
use modulprj\assets\AppAsset_style;
AppAsset_style::register($this);
$this->title = 'wandindo';
?>
<?php $this->beginPage() ?>
	<!DOCTYPE html>
	<html lang="<?= Yii::$app->language ?>">
		<head>
			<meta charset="<?= Yii::$app->charset ?>">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<?= Html::csrfMetaTags() ?>
			<title><?= Html::encode($this->title) ?></title>
            <!-- tambahan variable untuk template Author: --ptr.nov-- !-->
            <title><?= Html::encode($this->sideMenu) ?></title>
            <title><?= Html::encode($this->sideCorp) ?></title>
			<?php if (!Yii::$app->user->isGuest) { ?>
            <meta http-equiv="refresh" content="<?php echo Yii::$app->params['sessionTimeoutSeconds'];?>;"/>
			<?php } ?>				
			<?php $this->head() ?>
		</head>

		<?php
			/*
			* == Call Variable Menu manipulation | --author: ptr.nov--
			*/
        //Icon::showStack('twitter', 'square-o', ['class'=>'fa-lg'])
			$callback = function($menu){
				$data1=($menu['data']);
				$data2=str_replace("'",'',$data1);
				$data3=str_replace(";",'',$data2);	
                $data1=$menu['data'];
				$data = eval($menu['data']);
                //echo $data;
				return [
					'label' => Icon::show($data3).$menu['name'],
					'url' => [$menu['route']],
					//'options' => $data1,
					'items' => $menu['children']
				];
			};

			/**
			 * Validasi database Default EMP_ID =0 
			 * note error : lost left join Field unn\known attribute properties
			 * Author: -ptr.nov-, 
			 */
			if (!Yii::$app->user->isGuest) {
				$modelUser=\Yii::$app->getUserOpt->Profile_user();
				//print_r($ModelUserAttr);
				//echo $ModelUserAttr->emp->EMP_IMG;
				$MainAvatar =$modelUser['EMP_IMG'];
				$MainUserProfile = $modelUser['KAR_NM'];'';//$ModelUserAttr->emp->EMP_NM;// . ' '. $ModelUserAttr->emp->EMP_NM_BLK;
				$img='data:image/jpg;charset=utf-8;base64,'.$modelUser['IMG64'];
				$noImg='data:image/jpg;charset=utf-8;base64,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';
			}
			$corp="<p class='pull-left'>&copy; PT. Wanindo Prima <?= date('Y') ?></p>";
		?>
		
		<! - NOT LOGIN- Author : -ptr.nov- >
		<?php if (Yii::$app->user->isGuest) { ?>
			<?php include('_front.php');?>
		<?php }; ?>

		<! -LOGIN- Author : -ptr.nov- >
		<?php if (!Yii::$app->user->isGuest) { ?>
			<body class="hold-transition skin-red"> <!--  sidebar-mini !-->
				<?php $this->beginBody(); ?>
                <div class="wrapper">
                    <header class="main-header"> <!-- navbar-fixed-top !-->
                        <a  class="logo">
                            <?php
                           // echo Html::img('http://modulprj.com/favicon.ico', ['width'=>'20']);
                            ?>
                            <!-- LOGO -->
                            PT. Wandindo
                        </a>
                           <!--  <div class="navbar-custom-menu">!-->
                                <?php
                                    // echo  \yii\helpers\Json::encode($menuItems);
                                    if (!Yii::$app->user->isGuest) {
                                        //$menuItems  = MenuHelper::getAssignedMenu(Yii::$app->user->id);
                                        $menuItems = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback);
                                        $menuItems[] = [
                                            'label' => Icon::show('power-off') ,//. 'Logout',// (' . Yii::$app->user->identity->username . ')',
                                            //'label' => Icon::showStack('twitter', 'square-o', ['class'=>'fa-lg']) . 'Logout (' . Yii::$app->user->identity->username . ')',
                                            'url' => ['/site/logout'],
                                            'linkOptions' => ['data-method' => 'post']
                                        ];

                                        NavBar::begin([
                                            //'brandLabel' => 'LukisonGroup',
                                            //'brandUrl' => Yii::$app->homeUrl,
                                            //-ptr.nov-
                                            'brandLabel' => '<!-- Sidebar toggle button-->
                                                            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                                                                <span class="sr-only">Toggle Navigation</span>
                                                            </a>',
                                            'options' => [
                                                //'class' => 'navbar-inverse navbar-fixed-top',
                                               'class' => [
                                                   'navbar navbar-inverse navbar-static-top',
                                                   //'navbar navbar-inverse navbar-fixed-top',
                                                   'style'=>'background-color:#313131'
                                               ],
                                                //'class' => 'navbar-inverse navbar-static-top',
                                               // 'class' => 'navbar-inverse navbar',
                                                // 'class' => 'navbar navbar-fixed-top',
                                                'role'=>'button',
                                                'style'=>'margin-bottom: 0',
                                            ],
                                        ]);

                                        echo NavX::widget([
                                            'options' => ['class' => 'navbar-nav  navbar-left'],
                                            'items' => $menuItems,
                                            'activateParents' => true,
                                            'encodeLabels' => false,
                                        ]);

                                        NavBar::end();
                                    };
                                ?>
                           <!-- </div>!-->

                    </header>
                    <aside class="main-sidebar">
                        <section class="sidebar">
                            <!-- User Login -->
                                <div class="user-panel">
                                    <div class="pull-left" style="text-align: left">
                                       <?php echo Html::img($modelUser['IMG64']!=''?$img:$noImg,['class'=>'img-circle','alt'=>'Cinque Terre','width'=>'80','height'=>'80']);?>
                                    </div>
                                    <div class="pull-left info" style="margin-left: 40px" >
                                        <p><?php echo $MainUserProfile; ?></p>
                                    
                                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                                    </div>
                                </div>
                             <div class="user-panel bg-red">
                                <!-- /.Company Select Dashboard -->
                                 <p>
                                    <?php
                                        if ($this->sideCorp != '') {
                                            echo $this->sideCorp;
                                        }else{
                                            echo 'Home';
                                        };
                                    ?>
                                 </p>
                            </div>
                               
                            <!-- /.User Login -->
                            <!-- search form -->
                                <form action="#" method="get" class="sidebar-form skin-blue">
                                    <div class="input-group">
                                        <input type="text" name="q" class="form-control" placeholder="Search..."/>
                                      <span class="input-group-btn">
                                        <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                                        </button>
                                      </span>
                                    </div>
                                </form>
                            <!-- /.search form -->
                                <?php
                                    /**
                                     * Author: -ptr.nov-
                                     * Noted: add variable "sideMenu" get value
                                     * \vendor\yiisoft\yii2\web\View.php
                                    */
                                $side_menu='';
                                    //echo $this->sideMenu;
                                    if ($this->sideMenu != false) {
                                        $getSideMenu=$this->sideMenu;
                                        if (M1000::find()->findMenu($this->sideMenu)->one()){
                                            $getSideMenu=$this->sideMenu;

                                        }else{
                                            echo Html::panel(
                                                ['heading' => 'variabel $this->sideMenu = "'.  $getSideMenu . '"; Tidak ditemukan dalam database dbm000, tabel m1000, tambahkan pada view anda menu yang benar untuk menu samping '],
                                                Html::TYPE_INFO
                                            );
                                             $getSideMenu='mdefault';
                                        }
                                    }else{
                                        $getSideMenu='mdefault';
                                    };

                                    $side_menu=\yii\helpers\Json::decode(M1000::find()->findMenu($getSideMenu)->one()->jval);
                                    if (!Yii::$app->user->isGuest) {
                                        echo SideNav::widget([
                                            'items' => $side_menu,
                                            'encodeLabels' => false,
                                            //'heading' => $heading,
                                            'type' => SideNav::TYPE_DEFAULT,
                                            'options' => [
                                                'class' => 'navbar-default bg-black',
                                                //'style'=>'background-color:#313131',
                                            ],
                                        ]);
                                    };
                                ?>

                        </section>
                    </aside>
                    <div class="content-wrapper">  <!--style="padding-top:50px"!-->
                        <!--<div class="panel panel-default" style="margin-bottom: 0">!-->
                            <?php
                               /*
							   echo Breadcrumbs::widget([
                                               'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                               'options'=>[
                                                   'class' => 'breadcrumb',
                                                   'style'=>'background-color:#e1e1e1;margin-bottom:0;margin-top:0',
                                               ],
                                           ]);
								*/
                            ?>
                        <!--</div>!-->
                        <div class="panel panel-default" style="margin-left: 2px; margin-right: 2px ;margin-bottom: 0">
                            <?php
                                // Title Penganti Breadcrumbs Author: -ptr.nov-
                               /*  echo Html::panel(
                                    ['heading' => $this->title ],
                                    Html::TYPE_DANGER
                                );
								*/
							 ?>
							  <div style="margin-top: 20px";>
								<?php echo $content; ?>
							  </div>
                            
                       </div>
                    </div>
                </div>
                <div class="box-footer bg-red" style="color: blue">
                    <p> <?php echo $corp .'-'. date('Y') ?></p>
                </div>

			<?php $this->endBody() ?>
		</body>
	<?php }; ?>
	</html>
<?php $this->endPage() ?>
