<?php
include('layout_member/header.php');
include('layout_member/left.php');
include('layout_member/member_session.php');


?>

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

   <!-- if you click request routine button which is down form
                For example, id=1. If there no routine for id 1 Database , 
            then insert sql code will be used set all exercise = null  nad verify = no; 
            else, update sql code and set verify = no will be used.     -->
<?php


// if  request routine botton is clicked

if (isset($_GET['request_routine'])) {
    $mid = $_GET['mid'];
    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("Connection error");
    }
    $check_sql = "SELECT * FROM routine WHERE mid='$mid' ";
    $r = $conn->query($check_sql);

    if ($r->num_rows > 0) {
        $row = $r->fetch_assoc();
        $rid = $row['rid'];
        $update_sql = "UPDATE routine SET verify = 'no' WHERE rid = $rid";
        $update_r = $conn->query($update_sql);
        if ($update_r) {
            echo '<script>';
            echo 'swal.fire({
                     icon: "success",
                    text: "Request Successful. Wait for Admin to Submit your routine.",
                }).then(function() {
                    window.location = "routine.php";
                });';
            // echo 'alert("Request Successful. Wait for Admin to Submit your routine.");';
            //    echo 'window.location.href = "routine.php";';
            echo '</script>';
        }
    } else {
        $insert_sql = "INSERT INTO routine (mid) VALUES ('$mid')";
        $insert_r = $conn->query($insert_sql);
        if ($insert_r) {
            echo '<script>';
            echo 'swal.fire({
                                icon: "success",
                               
                               text: "Request Successful. Wait for Admin to Submit your routine.",
                              
                           }).then(function() {
                               window.location = "routine.php";
                           });';
            //  echo 'alert("Request Successful. Wait for Admin to Submit your routine.");';
            //   echo 'window.location.href = "routine.php";';
            echo '</script>';
        }
    }
}

?>


<div id="routine_right">
    <div class="father_li_class">
        <div class="li_class">

            <!-- request routine botton form -->
         
            <form action="routine.php" method="get">
                <input type="hidden" name="mid" id="" value="<?php echo $id; ?>">
                <input type="submit" name="request_routine" value="Request Routine" id="rr">
            </form>

            <h1 style="text-align: center; color: #FFA559;">ROUTINE</h1>
            <div class="li2_class">

                <?php
                $conn = new mysqli("localhost", "root", "", "gsms");
                if ($conn->connect_error) {
                    die("Connection error");
                }

                $sql = "SELECT * FROM routine WHERE mid = '$id'";
                $r = $conn->query($sql);
                if ($r->num_rows > 0) {

                    while ($row = $r->fetch_assoc()) {

                        $rid = $row['rid'];
                        $chest = $row['chest'];
                        $back = $row['back'];
                        $shoulder = $row['soulder'];
                        $biceps = $row['biseps'];
                        $triceps = $row['triceps'];
                        $leg = $row['leg'];
                        $abs = $row['abs'];

                        echo "
                    <div>
                        <strong>Chest</strong> 
                        $chest
                    </div>

                    <div>
                        <strong>Shoulder</strong> 
                        $shoulder
                    </div>

                    <div>
                        <strong>Back</strong>
                        $back
                    </div>

                    <div>
                        <strong>Biceps</strong> 
                        $biceps
                    </div>

                    <div>
                        <strong>Triceps</strong> 
                        $triceps
                    </div>

                    <div>
                        <strong>Leg</strong> 
                        $leg
                    </div>

                    <div>
                        <strong>Abs</strong> 
                        $abs
                    </div>";
                    }
                } else {

                    echo "
                <div>
                    <p style='font-size: 20px;'>
                    There were no routines discovered. 
                    <br>
                    Please click Request Routine. 
                    <br>
                    And admin will update your routine in a timely manner.
                    </p>
                </div>
            ";


                }
                ?>
            </div>
        </div>
    </div>
</div>


<?php
include('layout_member/footer.php');
?>