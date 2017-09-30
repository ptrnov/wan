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
		/* $pathImport=realpath(Yii::$app->basePath) . '/web/uploads/temp/test.xlsx';
		$data = \moonland\phpexcel\Excel::widget([
				'id'=>'import-absensi',
				'mode' => 'import',
				'fileName' => $pathImport,
				'setFirstRecordAsKeys' => false, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel.
				'setIndexSheetByName' => true, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric.
				'getOnlySheet' => 'Import-Absensi', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
		]);
		
		$scrcData=self::dataKombinasi($data);
		$cnt=self::tglCount($data);

		$i=0;
		for($i=0; $i<=$cnt; $i++){
			//$IN[]=self::excelColumnName(($i+$i)+4);
			$IN=self::excelColumnName(($i+$i)+4);	//0 + 4 + 0
			$OUT=self::excelColumnName(($i+$i)+5);	//0 + 5 + 0		
			foreach($scrcData as $srcRows){				
					$rsltTgl[]=$srcRows['A'];		//0 
					$rsltIn[]=$srcRows[$IN];		//0 + 4 + 0
					$rsltOut[]=$srcRows[$OUT];		//0 + 5 + 0				
			}
			
		}; */
		//print_r($rsltTgl);	
		//print_r($cnt);	
		//return self::checkWaktu('09:00');
		// return date('Y-m-d', strtotime('+1 day', strtotime('2017-09-22')))
		
/* 		<style>
.blink {
  animation: blink-animation 1s steps(5, start) infinite;
  -webkit-animation: blink-animation 1s steps(5, start) infinite;
}
@keyframes blink-animation {
  to {
    visibility: hidden;
  }
}
@-webkit-keyframes blink-animation {
  to {
    visibility: hidden;
  }
}
</style>
<span class="blink">TULISAN BERKEDIP</span>; */


		$awal  = strtotime('2017-08-10 9:00:00');
		$akhir = strtotime('2017-08-10 07:00:00');
		$diff  = $akhir - $awal;

		$jam   = floor($diff / (60 * 60));
		$menit = $diff - $jam * (60 * 60);
		$X='Waktu tinggal: ' . $jam .  ' jam, ' . floor( $menit / 60 ) . ' menit';
		return ($X);
    }
	
	private function checkWaktu($value){
		//$a=preg_match('/^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/', $value);
		// $a=preg_match('/^([0-1][0-9]|2[0-3]):([0-5][0-9])$/', $value);
		// return $a!=false?$a:'';
		$inVal=str_replace("'","",$value);
		//$a=preg_match('/^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/', $value);
		$a=preg_match('/^([0-1][0-9]|2[0-3]):([0-5][0-9])$/', '09:00');
		return $a!=false?$inVal:'';
	}
	
	/**================================================
	* Data tanggal Dan Data Rows
	* row1 dan row2 excel di eliminasi, untuk gabungan
	**=================================================
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
				$rsltAry[]=$valRslt;
			}
		} 
		
		$dataProvider = new \yii\data\ArrayDataProvider([
			'allModels' => $rsltAry
		]);
		return $dataProvider->getModels();
	}
	
	/**================================================
	* COUNT JUMLAH TANGGAL DI MASUKAN
	**=================================================
	*/
	private function tglCount($data){
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
		$cnt=count($aryTgl);
		return $cnt!=0?($cnt-1):0;
	}
	
	/**================================================
	* GENERATE COLUMN INDEX NAME BY ALFABET
	**=================================================
	*/
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
