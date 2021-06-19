<table class="table" style="width:100%;">
    <thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Subject</th>
        <th scope="col">Body</th>
        <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($CurrentUser->Complaints() as $data) {
                echo "<tr>";
                    echo "<th scope='row'>". $data->Id . "</th>";
                    echo "<th>" . $data->Subject . "</th>";
                    echo "<th>" . $data->Content . "</th>";
                    echo "<th>" . ($data->Status? "Solved" : "NotSolved") . "</th>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>


