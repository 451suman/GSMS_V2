<?php
include('layout/header.php');
include('layout/left.php');

include('layout/adminsession.php');

?>
<div id="right">
<link rel="stylesheet" href="../css/tableDecorate.css">


    
    <!-- <form action="asc_dec.php" method="post">
        
        <input type="submit" name="asc" id="" value="Ascending" class="centermember_botton">
    </form>  -->
    <form action="track_expire_subscription.php" method="post">
        
        
        <input type="submit" name="dec" id="" value="Track Expired Membership" class="centermember_botton_trackExpire">
    </form>
    <form action="" method="get">
        <input type="search" name="name_search" id="" placeholder="Search Name">
        <input type="submit" name="n_search" value="Search" id="">
    </form>

    <div class="table_class">
        <table class="membership">
            <tr>
                <td colspan="8">
                    <h1 class="center">MEMBER SUBSCRIPTION REPORT</h1>
                </td>
            </tr>
            <tr>
            <th width=5%;>SN</th>
                <th width=20%;>Name</th>
                <th width=15%;>Phone No.</th>
                
                <th width=10%;>Details</th>
   
                <th width=15%;>Renew Date</th>
                <th width=15%;>Expiry Date</th>
                <th width=10%;>Remaining Days</th>
                <th width=10%;>Action</th>
            </tr>
            <?php

if(isset($_GET['n_search']))
    {
        $S_name=$_GET['name_search'];

   


            $conn = new mysqli("localhost", "root", "", "gsms");
            if ($conn->connect_error) {
                die("Database connection error");
            }
            $sql = "SELECT m.name,m.phone, m.mid, mst.msid, mst.renew_date, mst.expiry_date
            FROM member m
            JOIN member_subscription_track mst ON m.mid = mst.mid
          
            WHERE m.name LIKE '$S_name%';
            ";
            $result = $conn->query($sql);
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $i++;
                $id = $row["mid"];
                $name = $row["name"];
                $phone = $row["phone"];

                
              
                $renew_date=$row["renew_date"];
                $expiry_date=$row["expiry_date"];
                $date = date('F j, Y');
                // Convert the expiry date and today's date to Unix timestamps
            $expiry_timestamp = strtotime($expiry_date);
            $today_timestamp = strtotime($date);
            // Calculate the difference in seconds
            $difference = $expiry_timestamp - $today_timestamp;

            // Convert the difference to days
            $days_remaining = round($difference / (60 * 60 * 24));

        
                echo "<tr>
                        <td>$i</td>
                        <td>$name</td>
                        <td>$phone</td>

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
                                <input type='hidden' value='$id' name='member_id' />
                                <input type='submit' name='edit_track' value='Edit' class='edit_sub_track'>
                            </form>
                        </td>
                    </tr>";
            }

        }
            ?>
        </table>
    </div>
</div>
<?php
include('layout/footer.php');
?>
