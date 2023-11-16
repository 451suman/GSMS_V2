<?php
include 'layout/header.php';
include 'layout/left.php';
include 'layout/adminsession.php';
?>

<!-- check remaining days  -->
<?php
if (isset($_GET['remaining_days'])) {
    $currentDate = date("Y-m-d");
    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("Database connection error");
    }
    $mid = $_GET['mid'];
    $check_status = "select * from member WHERE mid='$mid'";
    $check_s_r = $conn->query($check_status);
    if ($check_s_r->num_rows > 0) {
        $row = $check_s_r->fetch_assoc();
        $status = $row['status'];
    }

    if ($status == 'offline') {
        echo '<script>';
        echo 'var status = "' . $status . '";'; 
        echo 'swal.fire({
            title: "Status: " + status,
        }).then(function() {
            window.location = "dashboard.php";
        });';
        echo '</script>';
    }
    else {

        $currentDate = date("Y-m-d");
        $sql = "select * from member_subscription_track where mid='$mid'";
        $r = $conn->query($sql);
        if ($r->num_rows > 0) {
            $row = $r->fetch_assoc();
            $expiry_date = $row["expiry_date"];
            $date = date('F j, Y');
            // Convert the expiry date and today's date to Unix timestamps
            $expiry_timestamp = strtotime($expiry_date);
            $today_timestamp = strtotime($date);
            // Calculate the difference in seconds
            $difference = $expiry_timestamp - $today_timestamp;
            // Convert the difference to days
            $days_remaining = round($difference / (60 * 60 * 24));
            echo '<script type="text/javascript">';
           
            echo 'var remainingDays = ' . $days_remaining . ';';
            echo 'var status = "' . $status . '";';             // display VAr remainig days
            echo 'swal.fire({
                title: "Remaining days: " + remainingDays,
                text: "Status: "+ status,
            }).then(function() {
                window.location = "dashboard.php";
            });';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo 'swal.fire({
                        title:" New Member",
                        text: " "
                    }).then(function() {
                        window.location = "dashboard.php";
                    });';
            echo '</script>';
        }
    }

}
?>

<!-- reject verification -->
<?php
if (isset($_GET['reject_verify'])) {
    $eid = $_GET["enroll_id"];
    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("Database connection error");
    }
    $sql = "UPDATE enrollment SET verified = 'rejected' WHERE eid = '$eid' ";
    $result = $conn->query($sql);
    if ($result) {
        echo '<script type="text/javascript">';
        echo 'Swal.fire({
                                    icon: "warning",
                                      title: "Rejected"
                                  }).then(function() {
                                      window.location = "dashboard.php";
                                  });';
        echo '</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("delete error");';
        echo '</script>';
    }
}
?>
<!-- ---------------------------------Verify-------------------------- -->
<?php
if (isset($_GET['verify'])) {
    $eid = $_GET["enroll_id"];
    $mid = $_GET['mid'];
    $cid = $_GET['cid'];
    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("Database connection error");
    }

    $updateSql = "UPDATE enrollment SET verified = 'yes' WHERE eid = '$eid' ";
    $Uresult = $conn->query($updateSql);

    $sql = "SELECT * FROM enrollment WHERE eid='$eid'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $verified = $row['verified'];
    $enroll = $row['edate'];
    $cid = $row['cid'];
    $mid = $row['mid'];

    if ($result) {
        if ($verified == 'yes') {
            $sql = "SELECT enrollment.cid, category.duration, category.cid ,category.package_price, category.cname,	category.package_name
                    FROM category
                    JOIN enrollment ON enrollment.cid = category.cid
                    WHERE enrollment.cid = '$cid'";
            $r = $conn->query($sql);
            $crow = $r->fetch_assoc();

            $duration = $crow['duration'];
            $package_price = $crow['package_price'];
            $cname = $crow['cname'];
            $package_name = $crow['package_name'];

            $currentDate = date("Y-m-d");
            $subscriptionPeriod = "+$duration month";

            $conn = new mysqli("localhost", "root", "", "gsms");
            if ($conn->connect_error) {
                die("Database connection error");
            }

        
            $check_status = "select * from member WHERE mid='$mid'";
            $check_s_r = $conn->query($check_status);
            if ($check_s_r->num_rows > 0) {
                $row = $check_s_r->fetch_assoc();
                $status = $row['status'];
            }

            $check_sql = "SELECT * FROM member_subscription_track WHERE mid='$mid' ";
            $check_r = $conn->query($check_sql);

            // if stauus is online
            if ($check_r->num_rows > 0 && $status == 'online') {
                $row = $check_r->fetch_assoc();
                $msid = $row['msid'];
                $mid = $row['mid'];
                $expiry_date = $row['expiry_date'];

                // date calculation
                $update_date = date('Y-m-d', strtotime($subscriptionPeriod, strtotime($expiry_date)));

                $update_sql = " UPDATE member_subscription_track SET expiry_date = '$update_date' WHERE msid = '$msid ' and mid='$mid' ";
                $update_r_online = $conn->query($update_sql);

                $paymentsql = "INSERT INTO payment (mid, cname, package_name, duration, price, date)
                VALUES ( '$mid', '$cname', '$package_name', '$duration', '$package_price', current_timestamp())";
                $r = $conn->query($paymentsql);

                if ($update_r_online && $r) {
                    echo '<script type="text/javascript">';
                    echo 'Swal.fire({
                                    icon: "success",
                                      title: " Verify successful. "
                                  }).then(function() {
                                      window.location = "dashboard.php";
                                  });';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript">   ';
                    echo 'Swal.fire({
                                        icon: "error",
                                          title: "Error updating subscription. "
                                      }).then(function() {
                                          window.location = "dashboard.php";
                                      });';
                    echo ' </script>';
                }
            }

            // if status is off line (old member)
            if ($check_r->num_rows > 0 && $status == 'offline') {

                $row = $check_r->fetch_assoc();
                $msid = $row['msid'];
                $mid = $row['mid'];
                $expiry_date = $row['expiry_date'];

                $currentTimestamp = strtotime($currentDate);
                $expiryTimestamp = strtotime($expiry_date);

                // date calculation
                $update_date = date('Y-m-d', strtotime($subscriptionPeriod, strtotime($currentDate)));
                // SQL for update in DB
                $update_sql = " UPDATE member_subscription_track SET expiry_date = '$update_date' WHERE msid = '$msid ' and mid='$mid' ";
                $update_r = $conn->query($update_sql);

                $paymentsql = "INSERT INTO payment (mid, cname, package_name, duration, price, date)
                VALUES ( '$mid', '$cname', '$package_name', '$duration', '$package_price', current_timestamp())";
                $r = $conn->query($paymentsql);

                $online_sql = "UPDATE member SET status = 'online' WHERE mid = '$mid'";
                $online_r = $conn->query($online_sql);

                if ($update_r && $r && $online_r) {
                    echo '<script type="text/javascript">';
                    echo 'Swal.fire({
                                        icon: "success",
                                          title: "Reset and Verify were successful, and the status is online."
                                      }).then(function() {
                                          window.location = "dashboard.php";
                                      });';
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript">';
                    echo 'Swal.fire({
                                        icon: "error",
                                          title: "Error updating subscription. "
                                      }).then(function() {
                                          window.location = "dashboard.php";
                                      });';
                    echo '</script>';
                }
            } 
            // new mwmber status offline
            else if ($status == 'offline') {
                // date calculation
                $newDate = strtotime($subscriptionPeriod, strtotime($currentDate));
                $nnewDate = date("Y-m-d", $newDate);

                // if new member enrolleed
                $msql = "INSERT INTO member_subscription_track (mid, renew_date, expiry_date) VALUES ($mid, current_timestamp(),
                '$nnewDate') ";
                $re = $conn->query($msql);

                $paymentsql = "INSERT INTO payment (mid, cname, package_name, duration, price, date)
                                 VALUES ( '$mid', '$cname', '$package_name', '$duration', '$package_price', current_timestamp())";
                $r = $conn->query($paymentsql);

                $online_sql = "UPDATE member SET status = 'online' WHERE mid = '$mid'";
                $online_r = $conn->query($online_sql);

                if ($re && $r && $online_r) {
                    echo '<script type="text/javascript">';
                    echo 'Swal.fire({
                                    icon: "success",
                                      title: "New Member Verification was successful, and the status is now online."
                                  }).then(function() {
                                      window.location = "dashboard.php";
                                  });';

                    echo '</script>';
                } else {
                    echo '<script type="text/javascript">   ';
                    echo 'Swal.fire({
                                    icon: "error",
                                      title: "Error updating subscription. "
                                  }).then(function() {
                                      window.location = "dashboard.php";
                                  });';
                    echo ' </script>';
                }
            }
        }
    }
}
?>

<!-- ---------------------------- end of backend------------------------------>



<div id="right">
    <link rel="stylesheet" href="../css/tableDecorate.css">

    <div class="table_class">
        <table class="membership">
            <tr>

                <td colspan="11">
                    <h1 class="center">DASHBOARD</h1>
                </td>
            </tr>
            <tr>
                <th width=5%;>SN</th>
                <th width=10% ;>Name</th>
                <th width=10%;>Phone</th>
                <th width=20% ;>Email</th>
                <th width=5% ;>Package Name</th>
                <th width=5%;>Subscription Category</th>
                <th width=5% ;>Month</th>
                <th width=15%;>Enroll Date</th>
                <th width=5%;>Remaining days</th>
                <th width=10%;>Verification</th>
                <th width=10%;>Action</th>
            </tr>
            <?php
$conn = new mysqli("localhost", "root", "", "gsms");
if ($conn->connect_error) {
    die("Database connection error");
}

$sql = "SELECT m.mid, m.name, m.phone, m.email, m.date, c.package_name,
            c.cid, c.cname, c.duration, c.package_price, e.eid, e.verified, e.edate
            FROM member m
            INNER JOIN enrollment e ON m.mid = e.mid
            INNER JOIN category c ON e.cid = c.cid  where e.verified='no' ";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $i++;
        $mid = $row["mid"];
        $name = $row["name"];
        $phone = $row["phone"];
        $email = $row["email"];
        $cid = $row["cid"];
        $eid = $row["eid"];
        $cname = $row["cname"];
        $package_name = $row["package_name"];
        $date = $row["edate"];
        $duration = $row["duration"];
        $verified = $row["verified"];

        echo "<tr>
                                <td>$i</td>
                                <td>$name</td>
                                <td>$phone</td>
                                <td>$email</td>
                                <td>$package_name</td>
                                <td>$cname</td>
                                <td>$duration</td>
                                <td>$date</td>
                                <td>
                                </form>
                                <form action='dashboard.php' method='get'>
                                <input type='hidden' value='$mid' name='mid'>
                                <input type='submit' name='remaining_days' value='Check Remaining Days' class='edit_sub_track'>
                            </form>

                                </td>

                                <td>$verified</td>
                                <td class='h-center'>
                                    <form action='dashboard.php' method='get'>
                                        <input type='hidden' value='$eid' name='enroll_id'>
                                        <input type='hidden' value='$cid' name='cid'>
                                        <input type='hidden' value='$mid' name='mid'>
                                        <input type='submit' name='verify' value='Verify' class='edit_sub_track'>
                                    </form>


                                    </form>
                                    <form action='dashboard.php' method='get'>
                                    <input type='hidden' value='$eid' name='enroll_id'>
                                    <input type='submit' name='reject_verify' value='Reject' class='edit_sub_track'>
                                </form>

                                </td>
                            </tr>";
    }
} else {
    echo "<tr><td colspan='11'>No new enrollment found</td></tr>";
}

?>
        </table>
    </div>
</div>

<?php
include 'layout/footer.php';
?>