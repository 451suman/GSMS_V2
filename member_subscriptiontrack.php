<?php
include('layout_member/header.php');
include('layout_member/left.php');
include('layout_member/member_session.php');


?>
<!-- check status if status == offline  then run this code -->
<?php
$conn = new mysqli("localhost", "root", "", "gsms");
if ($conn->connect_error) {
    die("Connection error");
}
$check_sql = "SELECT * FROM member WHERE mid='$id' ";
$r = $conn->query($check_sql);
if ($r) {
    $row = $r->fetch_assoc();
    $status = $row['status'];

    if ($status == "offline") {
        echo '<script >';
        echo 'swal.fire({
             icon: "error",
             text: "You are current status is offline. To change that, talk to the admin or purchase a package to go online.",
           
        }).then(function() {
            window.location = "index.php";
        });';
        echo '</script>';
    }
}
?>


<div id="right">

    <div class="mtable_class">
        <table class="mm_membership">
            <tr>
                <td colspan="8" class="center" style="color:  #FFA559;">
                    <strong> MEMBER SUBSCRIPTION REPORT</strong>
                </td>
            </tr>

            <?php
            $conn = new mysqli("localhost", "root", "", "gsms");
            if ($conn->connect_error) {
                die("Database connection error");
            }
            $sql = "SELECT member.mid, member.name, member_subscription_track.renew_date, member_subscription_track.expiry_date
            FROM member
            INNER JOIN member_subscription_track ON member.mid = member_subscription_track.mid
            WHERE member.mid = '$id';   ";
            $result = $conn->query($sql);
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $i++;
                $id = $row["mid"];
                $name = $row["name"];


                $renew_date = $row["renew_date"];
                $expiry_date = $row["expiry_date"];

                $date = date('F j, Y');
                // Convert the expiry date and today's date to Unix timestamps
                $expiry_timestamp = strtotime($expiry_date);
                $today_timestamp = strtotime($date);
                // Calculate the difference in seconds
                $difference = $expiry_timestamp - $today_timestamp;

                // Convert the difference to days
                $days_remaining = round($difference / (60 * 60 * 24));

                echo " <tr>
                <td>Name: $name</td>
                </tr>
                <tr>
                <td>Renew Date: $renew_date</td>
                </tr>
                <tr>
                <td>Expiry Date: $expiry_date</td>
                </tr>
                    <tr>
                    <td>Remaining Days: $days_remaining </td>
                    </tr>";
            }
            ?>



        </table>
    </div>
</div>
<?php
include('layout_member/footer.php');
?>