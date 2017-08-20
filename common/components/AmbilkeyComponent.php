<?php
/**
 * Created by PhpStorm.
 * User: ptr.nov
 * Date: 10/08/15
 * Time: 19:44
 */

namespace common\components;
use modulprj\models\hrd\Finger;
use Yii;
use Yii\base\Model;
use modulprj\models\hrd\Karyawan;
use modulprj\models\hrd\Dept;
use modulprj\models\hrd\Jabatan;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\base\Component;

class AmbilkeyComponent extends Component {
    public function getKey_Employe($cab){
        //$a="asd1234";
       // $sql = 'SELECT max(KAR_ID) as KAR_ID FROM karyawan WHERE CORP_ID="WAN" AND CAB_ID="'.$cab.'"';
        //$sql = 'SELECT max(KAR_ID) as KAR_ID FROM karyawan WHERE CAB_ID="'.$cab.'"';
       // $sql = 'SELECT max(KAR_ID) as KAR_ID FROM karyawan WHERE KAR_ID like "'.$cab.'.%"  AND KAR_ID <> "0.%"';
        $sql = 'SELECT max(KAR_ID) as KAR_ID FROM karyawan WHERE KAR_ID like "'.$cab.'.%"  AND KAR_ID <> "0.%"';

        $cnt= Karyawan::findBySql($sql)->one();
		//print_r(count($cnt['KAR_ID']));
		//die();
		if(count($cnt['KAR_ID'])==0){
			$nkd = 1;
			$digit=str_pad($nkd,4,"0",STR_PAD_LEFT);
			$empCode=$cab . '.' . '1215' . '.' . $digit;
		}else{
			$arySplit=explode('.',$cnt->KAR_ID);
			$str_id_cnt0=trim($arySplit[0]);
			$str_id_cnt1=trim($arySplit[1]);
			$str_id_cnt2=trim($arySplit[2]);
			//print_r($str_id_cnt+1);
			$nkd=$str_id_cnt2+1;
			/*Combine String and Digit Author: -ptr.nov- */
			$digit=str_pad($nkd,4,"0",STR_PAD_LEFT);
			$empCode=$cab . '.' . $str_id_cnt1 . '.' . $digit;
		}
		
		
		
        return $empCode;
    }
    public function getKey_Department(){
        $sql1 = 'SELECT max(DEP_ID) as DEP_ID FROM departemen';
        $cntdept= Dept::findBySql($sql1)->one();
        $id_cnt_dept=$cntdept->DEP_ID + 1;

        return $id_cnt_dept;
    }
    public function getKey_Jabatan(){
        $sql = 'SELECT max(JAB_ID) as JAB_ID FROM jabatan';
        $cntjabatan= Jabatan::findBySql($sql)->one();
        $id_cnt_jab=$cntjabatan->JAB_ID + 1;

        return $id_cnt_jab;
    }
    public function getKey_finger(){
        $sql = 'SELECT max(NO_URUT) as NO_URUT FROM kar_finger';
        $cntfinger= Finger::findBySql($sql)->one();
        $id_cnt_finger=$cntfinger->NO_URUT + 1;

        return $id_cnt_finger;
    }
} 