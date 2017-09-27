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
		
		$scrcData=self::dataKombinasi($data);
		//print_r($scrcData);
		
		$result = ArrayHelper::getColumn($scrcData, function ($element) {
          return $element['A'];
        });
		print_r($result);
    }
	
	/**
	* Data tanggal Dan Data Rows
	* row1 dan row2 excel di eliminasi, untuk gabungan
	*/
	private function dataKombinasi($data){
		//ARRAY TGL
		foreach($data as $rowTgl => $valTgl){
			if($rowTgl==1){				
				foreach($valTgl as $rowTgl1 => $valTgl1){
					if($valTgl1<>''){
						$tmp=$valTgl1;
					}else{
						$aryTgl[]=$tmp;
					};
				}	
			}
		} 
		//print_r($aryTgl);
		
		//ARRAY DATA AND ARRAY ADD
		foreach($data as &$record){
			//if($row1<>1 AND $row1<>2){
			//if($row1==1){
				foreach($aryTgl as $rowAryTgl => $valAryTgl){
					$record[$rowAryTgl]=$valAryTgl;
					
				}
				$dataKombinasi[]=$record;
			//}
		} 
		
		// print_r($hari1);
		//return $dataKombinasi;
		foreach($dataKombinasi as $rowRslt => $valRslt){
			if($rowRslt<>0 AND $rowRslt<>1){
			// if($rowRslt==0){
				$rslt[]=$valRslt;
			}
		} 
		return $rslt;
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
