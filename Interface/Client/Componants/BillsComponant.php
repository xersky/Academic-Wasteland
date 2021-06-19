<?php
    $totalBills = $CurrentUser->Bills();
    $totalBillsCount = count($totalBills);

    $Paid = array_filter($totalBills,
        function($item){
            return $item->IsPaid == true;
        });
    $UnPaid = array_filter($totalBills,
        function($item){
            return $item->IsPaid == false;
        });
    $dataPoints = array( 
        array("label"=>"Paid", "y"=>(count($Paid)/$totalBillsCount)*100),
        array("label"=>"UnPaid", "y"=>(count($UnPaid)/$totalBillsCount)*100),
    )
?>

<div class="columns">
    <div class="column">
    <script>
        window.onload = function() {
        
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "Paid Vs Unpaid Bills"
            },
            subtitles: [{
                text: "<?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>"
            }],
            data: [{
                type: "pie",
                yValueFormatString: "#,##0.00\"%\"",
                indexLabel: "{label} ({y})",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
        
        }
    </script>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </div>
    <div class="column is-two-thirds">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Month</th>
                <th scope="col">Consomation</th>
                <th scope="col">PriceHT</th>
                <th scope="col">PirceTTC</th>
                <th scope="col">IsPaid</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($CurrentUser->Bills() as $data) {
                        echo "<tr>";
                            echo "<th scope='row'> <a href= ../../Bill-Recl-Views/BillView.php?idFacture=" . $data->Id . ">". $data->Id . "</a> </th>";
                            echo "<td>" . $data->Month . "</th>";
                            echo "<td>" . $data->Consomation . "</th>";
                            echo "<td>" . $data->Amount() . "</th>";
                            echo "<td>" . $data->Price() . "</th>";
                            echo "<td>" . ($data->IsPaid? "oui" : "non") . "</th>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
