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

class HariOfTanggal {	

    public static function DayofDate($date){
		//return date('D', strtotime($this->TGL)); Day Name
		//return date('l', strtotime($this->TGL)); Day Name
		//return date('N', strtotime($this->TGL)); Day value 
		$x=date('N', strtotime($date));		
		if ($x==1){
			return "SENIN";
		}elseif ($x==2){
			return "SELASA";
		}elseif ($x==3){
			return "RABU";
		}elseif ($x==4){
			return "KAMIS";
		}elseif ($x==5){
			return "JUMAT";
		}elseif ($x==6){
			return "SABTU";
		}elseif ($x==7){
			return "MINGGU";
		}else{
			return "";
		};		
	}
}
