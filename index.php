<?php
include('layout_member/header.php');
include('layout_member/left.php');
include('layout_member/member_session.php');

// back end of enroll.php form 
if (isset($_POST['enroll_form'])) {
    $mid = $_POST['mid'];
    $cid = $_POST['cid'];
    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("connection error");
    }
    $check_sql = "select * from enrollment where mid='$mid'";
    $check_r = $conn->query($check_sql);
    if ($check_r->num_rows > 0) {
        $row = $check_r->fetch_assoc();
        $eid = $row['eid'];
        $sql = "UPDATE enrollment SET mid = '$mid', cid = '$cid', verified='no' WHERE eid ='$eid'";
        $r = $conn->query($sql);
        if ($r) {
            echo '<script>';
            echo 'swal.fire({
                                text: "Waiting for enrollment verification by an administrator.",
                           }).then(function() {
                               window.location = "index.php";
                           });';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'swal.fire({     
                                text: "not successful",        
                            }).then(function() {
                                window.location = "index.php";
                            });';
            echo '</script>';
        }

    } else {
        $sql = "INSERT INTO enrollment (mid, cid) VALUES ( '$mid', '$cid')";
        $r = $conn->query($sql);
        if ($r) {
            echo '<script>';
            // echo 'alert("Wating for Enroll verification by Admin");';
            // echo 'window.location.href = "index.php";';
            echo 'swal.fire({
                                text: "Waiting for enrollment verification by an administrator.",
                            }).then(function() {
                                window.location = "index.php";
                            });';
            echo '</script>';
        } else {
            echo '<script>';
            // echo 'alert("not successful");';
            echo 'swal.fire({
                                text: "not successful",
                            }).then(function() {
                                window.location = "index.php";
                            });';
            echo '</script>';
        }
    }
}
?>

<link rel="stylesheet" href="css/index.css">

<div id="right">
    <!-- check image name in database of member if there is no 
    image name run this code and headed to uploadProfile._index.php to upload profile -->

    <?php
    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("Database connection error");
    }
    $sql = "SELECT * FROM member where mid ='$id'";
    $r = $conn->query($sql);
    if ($r) {
        $row = $r->fetch_assoc();
        $image_name = $row['image'];
        if ($image_name == "") {
            echo '<script>';
            echo 'Swal.fire({
                icon: "info",
                text: "To access the system, you need to upload a profile picture."
            }).then(function() {
                window.location = "uploadProfile_index.php";
            });';
            echo '</script>';


        }
    }
    ?>



<!-- card code to display category ingo for enrollment -->
    <div class="right_indexx">
        <?php
        $conn = new mysqli("localhost", "root", "", "gsms");
        if ($conn->connect_error) {
            die("Database connection error");
        }
        $sql = "select * from category 
        ORDER BY duration ASC
        ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $i++;
                $cid = $row["cid"]; // Add this line to fetch the id
                $pname = $row["package_name"];
                $cname = $row["cname"];
                $duration = $row["duration"];
                $price = $row["package_price"];
                $image = $row["image"];

                echo "
            <div class='index_content'>
            <div class='card'>
             <div>
             <img src='img/$image' alt=''>
             </div>
              <div class='center'>

              <h1>$cname</h1>
             
                <h2>$pname Packages</h2>

                <p class='card_text center'> 
               Duration: $duration Month  <br>
                Price:$price <br>
             <form action='enroll.php ' method='post'>

            
              <input type='hidden' name='duration' id=''value='$duration' > 
              <input type='hidden' name='pname' id=''value='$pname' > 
              <input type='hidden' name='price' id=''value='$price' > 
              <input type='hidden' name='category_id' id=''value='$cid' > 

              <input type='submit' name='enroll' id='enroll' value='Enroll'>
          </form>
                </p> </div>
              
            </div>
            </div>
            
            ";
            }
        } else {
            echo "<p style='font-size:30px;'>No Subscription Category To Enroll. Consult to Admin</p>";
        }

        ?>
    </div>

</div>
<?php
include('layout_member/footer.php');
?>