<?php

namespace modulprj\absensi\controllers;

use yii\web\Controller;
use Yii;
use yii\helpers\ArrayHelper;
class DefaultController extends Controller
{
	/**
     * Before Action Index
     */
	public function beforeAction(){
			if (Yii::$app->user->isGuest)  {
				 Yii::$app->user->logout();
                   $this->redirect(array('/site/login'));  //
			}
            // Check only when the user is logged in
            if (!Yii::$app->user->isGuest)  {
               if (Yii::$app->session['userSessionTimeout']< time() ) {
                   // timeout
                   Yii::$app->user->logout();
                   $this->redirect(array('/site/login'));  //
               } else {
                   //Yii::$app->user->setState('userSessionTimeout', time() + Yii::app()->params['sessionTimeoutSeconds']) ;
				   Yii::$app->session->set('userSessionTimeout', time() + Yii::$app->params['sessionTimeoutSeconds']);
                   return true; 
               }
            } else {
                return true;
            }
    }
	
    public function actionIndex()
    {
        //return $this->render('index');
		$pathImport=realpath(Yii::$app->basePath) . '/web/uploads/temp/test.xlsx';
		$data = \moonland\phpexcel\Excel::widget([
				'id'=>'import-absensi',
				'mode' => 'import',
				'fileName' => $pathImport,
				'setFirstRecordAsKeys' => false, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel.
				'setIndexSheetByName' => true, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric.
				'getOnlySheet' => 'Sheet1', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
				]);

		// print_r($data);
		foreach($data as $row => $val[]){
			
			if ($row==1){
				if($val[]<>''){
					$valTgl1[]=$val;
					$tmp=$val;
				}else{
					$valTgl1[]=$tmp;
				};
			}
			
			
			
			
		}
		print_r($valTgl1);
		//return  ArrayHelper::merge($valTgl1,$valTgl2);
		
		// print_r(self::excelColumnName(1));
		// $defaultClm=self::excelColumnName(4); //colum Jam Absensi;
		
		// $setHeaderCol1=self::indexColumn(4,6);
		// print_r($setHeaderCol1);
		
		// foreach($setHeaderCol1 as $row => $val){
			// $valHeaderCol1[]= $row;
		// }
    }
	
	function indexColumn($start,$limit) {
		$colMulai=$start+1;
		$colLimit=$start+$limit;
		for($i=$colMulai; $i<=$colLimit ;$i++){
			   $rsltCol1[]=self::excelColumnName($colMulai);
			   //$rsltCol2[]=.self::excelColumnName($i);
			   $colMulai=$colMulai+3;
		}
		$defStat=['A','B','C'];
		return  ArrayHelper::merge($defStat,$rsltCol1);
	}

	public static function excelColumnName($index)
    {
        --$index;
        if ($index >= 0 && $index < 26)
            return chr(ord('A') + $index);
        else if ($index > 25)
            return (self::excelColumnName($index / 26)) . (self::excelColumnName($index % 26 + 1));
        else
            throw new Exception("Invalid Column # " . ($index + 1));
    }
}
