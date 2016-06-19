<?php
use kartik\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use kartik\builder\Form;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\Pjax;

$JSCode = <<<EOF
	function(start, end) {
		var title = prompt('Event Title:');
		var eventData;
		var dateTime1 = new Date(start);
		var dateTime2 = new Date(end);
		tgl1 = moment(dateTime1).format("YYYY-MM-DD HH:mm:ss");
		tgl2 = moment(dateTime2).format("YYYY-MM-DD HH:mm:ss");
		if (title) {
			$.ajax({
				url:'/sistem/personalia/jsoncalendar_add',
				type: 'POST',
				data:'title=' + title + '&start='+ tgl1 + '&end=' + tgl2,
				dataType:'json',
				success: function(result){
			//alert('ok')
				  $.pjax.reload({container:'#calendar-user'});
				  //$.pjax.reload({container:'#gv-schedule-id'});
				}
			});
			/* calendar.fullCalendar('renderEvent', {
					title:title,
					start:start,
					end:end
				},
				true
			); */

		   /*  eventData = {
				title: title,
				start: start,
				end: end
			};
			//$('#w0').fullCalendar('renderEvent', eventData, true);
			*/
		}

		//$('#w0').fullCalendar('unselect');
		//$('#w0').fullCalendar('unselect');
	}
EOF;
	
$JSDropEvent = <<<EOF
	function(date) {
		alert("Dropped on " + date.format());
		if ($('#drop-remove').is(':checked')) {
			// if so, remove the element from the "Draggable Events" list
			$(this).remove();
		}
	}
EOF;
	
$JSEventClick = <<<EOF
	function(calEvent, jsEvent, view) {
		alert('Event: ' + calEvent.id);
	   // alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
		//alert('View: ' + view.name);
		// change the border color just for fun
		$(this).css('border-color', 'red');
	}
EOF;


	$wgMemo=yii2fullcalendar\yii2fullcalendar::widget([
			'id'=>'calendar-memo',
			'options' => [
				'lang' => 'id',
				'height'=>'300px'
			//... more options to be defined here!
			],
			// 'events'=> $events,
			'ajaxEvents' => Url::to(['/sistem/personalia/jsoncalendar']),
			'clientOptions' => [
				'selectable' => true,
				'selectHelper' => true,
				'droppable' => true,
				'editable' => true,
				//'drop' => new JsExpression($JSDropEvent),
				'selectHelper'=>true,
				'select' => new JsExpression($JSCode),
				'eventClick' => new JsExpression($JSEventClick),
				//'defaultDate' => date('Y-m-d')
			],
			//'ajaxEvents' => Url::toRoute(['/site/jsoncalendar'])
		]);
		
		
?>
	<?=$calenderMemo =Html::panel(
			['heading' => 'CLENDER ', 'body' =>$wgMemo],
			Html::TYPE_DANGER
		);
	?>

