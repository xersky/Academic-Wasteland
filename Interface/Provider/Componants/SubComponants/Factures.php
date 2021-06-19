<div>
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
                        echo "<th scope='row'>". $data->Id . "</th>";
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
