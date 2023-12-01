<!-- this page show all eber subscription info from member_subscription_track data base whose status is online -->
<?php
include('layout/header.php');
include('layout/left.php');
include('layout/adminsession.php');
?>
<div id="right">
    <link rel="stylesheet" href="../css/tableDecorate.css">

    <a href="track_expire_subscription.php" class="centermember_botton_trackExpire">Track Offline Expired Membership
    </a>

    <form action="memberSubscrition_search.php" method="get">
        <input type="search" name="name_search" id="" placeholder="Search Name" required>
        <input type="submit" name="n_search" value="Search" id="">
    </form>

    <div class="table_class">
        <table class="membership">
            <tr>
                <td colspan="9">
                    <h1 class="center">ONLINE MEMBER SUBSCRIPTION REPORT</h1>
                </td>
            </tr>
            <tr>
                <th width=5%;>SN</th>
                <th width=20%;>Name</th>
                <th width=10%;>Phone No.</th>
                <th width=5%;>Status</th>
                <th width=10%;>Details</th>
                <th width=15%;>Renew Date</th>
                <th width=15%;>Expiry Date</th>
                <th width=10%;>Remaining Days</th>
                <th width=10%;>Action</th>
            </tr>
            <?php
            $conn = new mysqli("localhost", "root", "", "gsms");
            if ($conn->connect_error) {
                die("Database connection error");
            }
            $sql = "SELECT m.name, m.phone, m.status, m.mid, mst.msid, mst.renew_date, mst.expiry_date
            FROM member m
            JOIN member_subscription_track mst ON m.mid = mst.mid
            WHERE m.status = 'online'
            ORDER BY mst.expiry_date ASC;
            
            ";
            $result = $conn->query($sql);
            $i = 0;
            if ($result->num_rows > 0) {


                while ($row = $result->fetch_assoc()) {

                    $i++;
                    $id = $row["mid"];
                    $name = $row["name"];
                    $phone = $row["phone"];
                    $status = $row["status"];


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
                    // expire members display row in red colour
                    if ($days_remaining <= 0) {
                        echo "<tr style='background-color: #ffb3b3;'>
                        <td>$i</td>
                        <td>$name</td>
                        <td>$phone</td>
                        <td>$status</td>
                       <td>  
                       <form action='membersubscription_detail.php' method='get' target='_blank'>
                       <input type='hidden' value='$id' name='member_id' />
                       <input type='submit' name='detail' value='Detail' class='edit_sub_track'>
                   </form>
                       </td>
                        <td>$renew_date</td>
                        <td>$expiry_date</td>
                        <td>$days_remaining</td>
                        <td class='h-center'>
                            
                            <form action='edit_sub_track.php' method='get'>
                                <input type='hidden' value='$id' name='member_id'/>
                                <input type='submit' name='edit_track' value='Edit' class='edit_sub_track'>
                            </form>
                        </td>
                    </tr>";
                    }
                    //  members display row in green colour
                    // if ($days_remaining > 0)
                    else {
                        echo "<tr style='background-color: #C5E898;'>
                        <td>$i</td>
                        <td>$name</td>
                        <td>$phone</td>
                        <td>$status</td>
                       <td>  
                       <form action='membersubscription_detail.php' method='get' target='_blank'>
                       <input type='hidden' value='$id' name='member_id' />
                       <input type='submit' name='detail' value='Detail' class='edit_sub_track'>
                   </form>
                       </td>
                        <td>$renew_date</td>
                        <td>$expiry_date</td>
                        <td>$days_remaining</td>
                        <td class='h-center'>
                            
                            <form action='edit_sub_track.php' method='get'>
                                <input type='hidden' value='$id' name='member_id'/>
                                <input type='submit' name='edit_track' value='Edit' class='edit_sub_track'>
                            </form>
                        </td>
                    </tr>";
                    }
                }
            } else {
                echo "<tr> <td colspan='9'>No rows found</td></tr>";
            }
            ?>
        </table>
    </div>
</div>
<?php
include('layout/footer.php');
?>