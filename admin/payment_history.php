<?php
include('layout/header.php');
include('layout/left.php');
include('layout/adminsession.php');

// delete payment histoy from database. Backend code from Talla ko korm
if (isset($_POST['pay_delete'])) {
    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("Database connection error");
    }

    $pid = $_POST['p_id'];
    $sql = "DELETE FROM payment WHERE pid='$pid'";
    $r = $conn->query($sql);

    if ($r) {
        echo '<script>';
        echo 'swal.fire({
            icon: "success",
            text: "Payment Deleted Successfully"
        }).then(function() {
            window.location = "payment_history.php";
        });';
        echo '</script>';
    } else {
        echo '<script>';
        echo 'swal.fire({
            icon: "error",
            text: "Failed"
        }).then(function() {
            window.location = "payment_history.php";
        });';
        echo '</script>';
    }
}

?>

<style>
   #payment_img {
        height: 35px;
        width: 35px;
    }

    #pay_delete {
        width: 100%;
        background-color: #952323;
        color: white;
    }
</style>

<div id="right">
    <link rel="stylesheet" href="../css/tableDecorate.css">

    <table class="payment_table center" border="1px">
        <tr>
            <th colspan="10">
                PAYMENT HISTORY
            </th>
        </tr>
        <tr>
            <th width="5%">SN</th>
            <th width="20%">Name</th>
            <th width="15%">Phone</th>
            <th width="5%">Photo</th>
            <th width="15%">Category Name</th>
            <th width="10%">Package Name</th>
            <th width="5%">Months</th>
            <th width="5%">Price</th>
            <th width="15%">Payment Date</th>
            <th width="5%">Action</th>
        </tr>

        <?php
        $conn = new mysqli("localhost", "root", "", "gsms");
        if ($conn->connect_error) {
            die("Database connection error");
        }

        $sql = "SELECT member.mid, member.image, member.phone, member.name, payment.cname, payment.package_name, payment.pid, payment.duration, payment.price, payment.date 
                FROM member
                INNER JOIN payment ON payment.mid = member.mid 
                ORDER BY payment.date DESC;";

        $r = $conn->query($sql);
        $i = 0;

        if ($r->num_rows > 0) {
            while ($row = $r->fetch_assoc()) {
                $p_id = $row['pid'];
                $image = $row['image'];
                $phone = $row['phone'];
                $name = $row['name'];
                $cname = $row['cname'];
                $package_name = $row['package_name'];
                $duration = $row['duration'];
                $price = $row['price'];
                $date = $row['date'];
                $i++;

                echo "
                    <tr>
                        <td>$i</td>
                        <td>$name</td>
                        <td>$phone</td>
                        <td><img src='../img/$image' alt=' ' id='payment_img'></td>
                        <td>$cname</td>
                        <td>$package_name</td>
                        <td>$duration</td>
                        <td>$price</td>
                        <td>$date</td>
                        <td>
                            <form action='payment_history.php' method='post'>
                                <input type='hidden' name='p_id' value='$p_id'>
                                <input type='submit' name='pay_delete' id='pay_delete' value='Delete'>
                            </form>
                        </td>
                    </tr>
                ";
            }
        } else {
            echo "
                <tr>
                    <td colspan='10'>No Payment Found</td>
                </tr>
            ";
        }
        ?>
    </table>
</div>
<script src="../js/js.js"></script>

<?php
include('layout/footer.php');
?>