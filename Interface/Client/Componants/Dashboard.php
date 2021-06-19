<?php
    $dataPoints = array_map(function($item){
        return array("x"=> $item->Month, "y"=> $item->Consomation);
    }, $CurrentUser->Bills());
?>
<script>
    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                exportEnabled: true,
                theme: "light1",
                title:{
                text: "Bills Over Time"
            },
            axisY:{
                includeZero: true
            },
            data: [{
                type: "column", 
                indexLabelFontColor: "#5A5757",
                indexLabelPlacement: "outside",   
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
    }
</script>
<div id="chartContainer" style="height: 80%; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>