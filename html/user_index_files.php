<div class="table-responsive" style="padding-left: 20%;padding-right: 20%">
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Size</th>
            <th>Private</th>
            <th>Downloads</th>
            <th>Link</th>
        </tr>
        </thead>
        <tbody>
        <?php
        /**
         * Created by PhpStorm.
         * User: Toni
         * Date: 20.7.2016.
         * Time: 16:00
         */
        if(session_status()!=2)session_start();
        if(isset($_SESSION['user_id'])){
            $id = $_SESSION['user_id'];
            $conn = new mysqli("localhost","tpap", "CnSs.964","tpap");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM asset WHERE user_id=$id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>". $row["id"]. " </td><td>" . $row["name"]. "</td><td> " . $row["size"]. "</td><td>"
                        . $row["private"] . "</td><td>" . $row["downloads"]."</td><td><a href='".$row["reference"]."' target=\'_blank\'>Link</a></td>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
        }

        ?>
        </tbody>
    </table>
</div>
</body>
</html>