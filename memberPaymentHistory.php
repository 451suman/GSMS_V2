<?php
include('layout_member/header.php');
include('layout_member/left.php');
include('layout_member/member_session.php');
?>

<div id="right">
    <link rel="stylesheet" href="css/tableDecorate.css">

    <table class="payment_table" border="1px">
        <tr>
            <th colspan="7">
                PAYMENT HISTORY
            </th>
        </tr>
        <tr>
            <th width="5%">SN</th>
            <th width="25%">Name</th>
            <th width="20%">Category Name</th>
            <th width="20%">Package Name</th>
            <th width="5%">Months</th>
            <th width="5%">Price</th>
            <th width="20%">Payment Date</th>
        </tr>
        <?php
        $conn = new mysqli("localhost", "root", "", "gsms");
        if ($conn->connect_error) {
            die("Database connection error");
        }

        $sql = "SELECT *FROM   payment where mid=$id 
             ORDER BY payment.date DESC";
        $r = $conn->query($sql);
        $i = 0;
        if ($r) {
            if ($row = $r->num_rows > 0) {


                while ($row = $r->fetch_assoc()) {
                    $cname = $row['cname'];
                    $package_name = $row['package_name'];
                    $duration = $row['duration'];
                    $price = $row['price'];
                    $date = $row['date'];
                    $i++;
                    echo "
                        <tr>
                            <td>$i</td>
                            <td>$n</td>
                            <td>$cname</td>
                            <td>$package_name</td>
                            <td>$duration</td>
                            <td>$price</td>
                            <td>$date</td>
                        </tr>
                    ";
                }
            } else {
                echo "
                <tr>
                    <td colspan='7'> No Payment Found</td>
                   
                </tr>
            ";
            }
        }

        ?>


    </table>

</div>
<?php
include('layout_member/footer.php');
?>