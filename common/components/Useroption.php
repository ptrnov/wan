<?php
/**
 * Created by PhpStorm.
 * User: ptr.nov
 * Date: 10/08/15
 * Time: 19:44
 */

namespace common\components;
use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\base\Component;
use Yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Query;
use yii\web\NotFoundHttpException;


use modulprj\sistem\models\UserOptionLogin;
/** 
  * Components User Option
  * @author ptrnov  <piter@lukison.com>
  * @since 1.1
*/
class Useroption extends Component{	
	
	/** 		 
	  * Refrensi 		  
	  * Fields 		 : id,username,auth_key,password_hash,password_reset_token,email,status,created_at,updated_at,access_token,EMP_ID,avatar,avatarImage  
	  * emp->Fields  : EMP_ID,EMP_NM,EMP_NM_BLK,EMP_IMG,EMP_CORP_ID,DEP_ID,DEP_SUB_ID,GF_ID,SEQ_ID,JOBGRADE_ID,
	  *				   EMP_JOIN_DATE,EMP_RESIGN_DATE,EMP_STS,EMP_KTP,EMP_ALAMAT,EMP_ZIP,EMP_TLP,EMP_GENDER,EMP_TGL_LAHIR,EMP_HP,EMP_EMAIL,
	  *				   GRP_NM,filename,STATUS,CREATED_BY,UPDATED_BY,UPDATED_TIME
	  *
	  * Declaration Components
	  * Default: Yii::$app->getUserOpt->Profile_user();

	  * Example : $profile=Yii::$app->getUserOpt->Profile_user();
	  *			   $profile['field_nm']
	  
	 
	*/
	 public function Profile_user(){
		$searchModel = new UserOptionLogin([
				'id'=>Yii::$app->user->identity->id
		]);			
		$ModelProfile = $searchModel->searchDataLogin(Yii::$app->request->queryParams);
		$modelUser=$ModelProfile->getModels();
		$model=$modelUser[0];  /*Validation Karyawan Table : KAR_ID='0.0000.0000'*/
		if (count($ModelProfile)<>0){ /*RECORD TIDAK ADA*/
			//$userid=$ModelProfile->user->id;			
			//$deptid=$ModelProfile->emp->DEP_ID;			
			return $model;
		} else{
			return 0;
		}	
	 }
	 
	  /** 		 
	  * Refrensi 		  
	  * Fields 				: id,username,auth_key,password_hash,password_reset_token,email,status,created_at,updated_at,access_token,EMP_ID,avatar,avatarImage  
	  * mdlpermission->field: ID,USER_ID,MODUL_ID,STATUS,BTN_CREATE,BTN_EDIT,BTN_DELETE,BTN_VIEW
	  *						  BTN_PROCESS1,BTN_PROCESS2,BTN_PROCESS3,BTN_PROCESS4,BTN_PROCESS5,
	  *						  BTN_SIGN1,BTN_SIGN2,BTN_SIGN3,BTN_SIGN4,BTN_SIGN5,
	  *						  CREATED_BY,UPDATED_BY,UPDATED_TIME
	  *
	  * Declaration Components
	  * Default: Yii::$app->getUserOpt->Modul_akses($modul_id);
	  * UseObject: Yii::$app->getUserOpt->Modul_akses(1)->emp->Field;
	  * Yii::$app->getUserOpt->Modul_akses(1)->mdlpermission[0]->ID
	  *
	  * Example usage modul_id=1
	  * Example3 : Yii::$app->getUserOpt->Modul_akses(1)->mdlpermission[0]->MODUL_ID;
	  * Example4 : $modulakses=Yii::$app->getUserOpt->Modul_akses(1);
	  *			   $modulakses->mdlpermission[0]->MODUL_ID;	  Description hasMany join 
	*/
	 public function Modul_akses($modul_id){	
		/*
		 * @since 1.2 
		*/
		// $qry="SELECT * FROM dbm001.user a LEFT JOIN dbm002.a0001 b on b.EMP_ID=a.EMP_ID LEFT JOIN 
			  // dbm001.modul_permission c on c.USER_ID=a.id WHERE a.id='".Yii::$app->user->identity->id."' AND c.MODUL_ID='".$modul_id."' AND EMP_STS<>'3' GROUP BY c.id ";
		// $userPermission=Mdlpermission::findBySql($qry)->one();
		// return $userPermission; 
	 
		/*
		 * @since 1.1 
		 * Problem query hasMany
		*/		
		/* $UserloginSearch = new UserloginSearch();	
		$ModelAksesModul = UserloginSearch::findModulAcess(Yii::$app->user->identity->id,$modul_id)->one();
		if (count($ModelAksesModul)<>0){ //RECORD TIDAK ADA
			//$userid=$ModelAksesModul->username;			
			//$deptid=$ModelAksesModul->emp->DEP_ID;
			//$deptid=$ModelAksesModul->mdlpermission[0]->MODUL_ID;				
			return $ModelAksesModul;
		} else{
			return 0;
		} */	 
	 } 
}