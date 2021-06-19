<?php
    $totalBills = $CurrentUser->Bills();
    $groupedByMonth=array_group_by($totalBills,function($obj){
        return $obj->Month;
    });
    $dataPoints = array( 
        0 => array_map(function($item, $idx){
				return array("label" => $idx, "y" => array_reduce(
					array_filter($item,	function($bill){
											return $bill->IsPaid == true;
								}), function($acc, $i){
										return $acc + $i->Price();
								}));
			},$groupedByMonth, array_keys($groupedByMonth)),
        1 =>  array_map(function($item, $idx){
				return array("label" => $idx, "y" => array_reduce(
					array_filter($item,	function($bill){
											return $bill->IsPaid == false;
								}), function($acc, $i){
										return $acc + $i->Price();
								}));
			},$groupedByMonth, array_keys($groupedByMonth))
	);
?>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Chart of Paid/UnPaid Bills"
	},
	axisY:{
		includeZero: true
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Paid Bills",
		indexLabel: "{y}",
		yValueFormatString: "#0.#",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints[0], JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Unpaid Bills",
		indexLabel: "{y}",
		yValueFormatString: "#0.#",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints[1], JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
}
 
}
</script>
<div id="chartContainer" style="height: 85%; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>