<?php

namespace modulprj\bantuan\controllers;

use yii\web\Controller;
use Yii;

class HelpController extends Controller
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
		/* Modul Employe */
		$employePenjelasan =$this->renderPartial('_employePenjelasan');
		/*Modul TIME TABEl */
		$timetablePenjelasan =$this->renderPartial('_timetablePenjelasan');
		
		return $this->render('index',[
			/* Modul Employe */
			'employePenjelasan'=>$employePenjelasan,
			/* Modul Time Table */
			'timetablePenjelasan'=>$timetablePenjelasan
		]);
    }
}
