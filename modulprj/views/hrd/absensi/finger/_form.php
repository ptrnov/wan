<?php 
use yii\helpers\Html;
use modulprj\models\hrd\Employe;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use modulprj\models\system\side_menu\M1000;
use kartik\sidenav\SideNav;
use kartik\markdown\Markdown;
use kartik\tabs\TabsX;
use yii\helpers\Url;
use kartik\editable\Editable;
use kartik\widgets\DepDrop;
use common\components\AmbilkeyComponent;

$this->mddPage = 'absensi';
$side_menu=\yii\helpers\Json::decode(M1000::find()->findMenu('hrd')->one()->jval);
$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL]);
?>
<div class="row">
    <div class="col-md-8">
<?php
echo  FormGrid::widget([
	'model'=>$model,
	'form'=>$form,
	'autoGenerateColumns'=>true,
    //'ajax' => true,
	'rows'=>[
        [
            'contentBefore'=>'<div class="box box-warning box-solid "> <div class="box-header with-border ">CORPORATE IDENTITY</div></div>',
            'autoGenerateColumns'=>false,
            'attributes'=>[
                'employe_identity' => [
                    'label'=>'No. :',
                    'columns'=>4,
                    'attributes'=>[
                        'NO_URUT'=>[
                            'type'=>Form::INPUT_TEXT,
                            'Form::SIZE_LARGE',
                            'options'=>[
                                'value'=>Yii::$app->ambilkonci->getKey_finger(),
                                'readonly'=>true,
                            ],

                            'columnOptions'=>['colspan'=>1],
                        ],
                        'KAR_ID'=>[
                            'type'=>Form::INPUT_DROPDOWN_LIST ,
                            'items'=>ArrayHelper::map(\modulprj\models\hrd\Karyawan::find()->orderBy('KAR_NM')->asArray()->all(), 'KAR_ID','KAR_NM'),
                            //'options'=>['placeholder'=>'Select Employee Name...'],
                            'hint'=>'Employee Name',
                            'columnOptions'=>['colspan'=>2],
                        ],
                        'TerminalID'=>[
                            'type'=>Form::INPUT_DROPDOWN_LIST ,
                            'items'=>ArrayHelper::map(\modulprj\models\hrd\Mesin::find()->orderBy('MESIN_NM')->asArray()->all(), 'TerminalID','MESIN_NM'),
                            //'options'=>['placeholder'=>'Select Employee Name...'],
                            'hint'=>'Finger Mesin Name',
                            'columnOptions'=>['colspan'=>2],
                        ],
                        'FingerPrintID'=>[
                            'type'=>Form::INPUT_TEXT,
                            'Form::SIZE_LARGE',
                            'hint'=>'Input Employee Finger',
                            'columnOptions'=>['colspan'=>1],
                        ],
                    ]
                ],
            ],
        ],
        [ //-Action Author: -ptr.nov-
            'attributes'=>[
                'actions'=>[    // embed raw HTML content
                    'type'=>Form::INPUT_RAW,
                    'value'=>  '<div style="text-align: left; margin-top: 20px; margin-bottom: 20px;  margin-left: 20px">' .
                        Html::resetButton('Reset', ['class'=>'btn btn-default']) . ' ' .
                        Html::submitButton('Submit', ['class'=>'btn btn-primary']) .

                        '</div>'
                ],
            ],
        ],
	]

]);
ActiveForm::end();

?>
    </div>
</div>