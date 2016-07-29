<?php
$choice = '<div class="table-responsive" style="padding-left: 20%;padding-right: 20%">
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Size</th>
            <th>Private</th>
            <th>Downloads</th>
            <th>Link</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>';
if(isset($_SESSION['user_id'])){
    if ($table != 0) {
        foreach ($table as $row){
            $choice .= "<tr><td>" . $row["name"]. "</td><td> " . $row["size"]. " bytes</td><td>"
                . $row["private"] . "</td><td>" . $row["downloads"]."</td><td><a href='".$row["reference"]."' target=\'_blank\'>Link</a></td>";
        }
    }
}
$choice .= '</tbody>
    </table>
</div>';
return $choice;
