<?php
include('layout/header.php');
include('layout/left.php');

?>


<?php

include('layout/adminsession.php');

// getting values from page form down for edit
if (isset($_POST['update'])) {
    $oldEmail = $_POST['oldEmail'];
    $name = $_POST['name'];
    $ph = $_POST['phone'];
    $e = $_POST['email'];
    $status = $_POST['status'];
    $id = $_POST['member_id'];


    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("Database connection error");
    }


    $error = [];



    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $error['name'] = "Name should only contain letters and spaces.";
    }

    // Validate email

    if (strlen($e) > 30) {
        $error['email'] = "The email address should not exceed more than 30 characters in length.";
    } elseif (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Please enter a valid email address";

    } else {
        // check dublicate email in database.
        $conn = new mysqli("localhost", "root", "", "gsms");
        if ($conn->connect_error) {
            die("database connection error");
        }
        if ($oldEmail != $e) {
            $conn = new mysqli("localhost", "root", "", "gsms");
            if ($conn->connect_error) {
                die("Database connection error");
            }
            $check_duplicate = $conn->query("SELECT email FROM member WHERE email = '$e'");
            if ($check_duplicate->num_rows > 0) {
                $error['email'] = "Email already register!";

            }
        }
    }

    // Validate phone number
    if (!preg_match('/^[0-9]{10}$/', $ph)) {
        $error['phone'] = "Please enter a valid 10-digit phone number";

    }
    if (!empty($error)) {
        echo '<script >';
        echo 'var errorMessage = "";';
        foreach ($error as $errorMsg) {
            // \\n is used to insert a newline character into a string
            echo "errorMessage += '$errorMsg. ';";
        }
        // echo "alert(errorMessage);";
        echo "Swal.fire({
        title: 'Update Error!',
        text: errorMessage,
        icon: 'error',
        confirmButtonText: 'OK'
      }).then(function() {
        window.location = 'memberlist.php';
    });";
        //    echo 'window.location.href = "profile.php";';
        echo '</script>';
    } else {
        $conn = new mysqli("localhost", "root", "", "gsms");
        if ($conn->connect_error) {
            die("Database connection error");
        }
        $sql = "UPDATE member SET name = '$name', phone = '$ph', email = '$e', status ='$status' WHERE mid='$id'";
        $r = $conn->query($sql);

        if ($r) {
            echo '<script >';
            echo "Swal.fire({
                title: 'Update Success!',
        
                icon: 'success',
            }).then(function() {
                window.location = 'memberlist.php';
            });";
            echo '</script>';
            //    header("location:memberlist.php");
        } else {
            echo '<script >';
            echo "Swal.fire({
                title: 'Update Failed!',
        
                icon: 'error',
            }).then(function() {
                window.location = 'memberlist.php';
            });";
            echo '</script>';
        }
    }
}



//  get values from  memberlist.php after click edit botton//
if (isset($_GET['edit_member'])) {
    $id = $_GET['member_id'];
    // $c_id=$_GET['member_cid'];
    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("connection error");
    }

    $sql = "SELECT * FROM member where mid='$id' ";
    $r = $conn->query($sql);
    $row = $r->fetch_assoc();
    $name = $row["name"];
    $phone = $row["phone"];
    $email = $row["email"];
    $status = $row["status"];
}
?>


<div id="right">
    <form action="edit_member_list.php" method="post" class="edituser_form" height="200px" enctype="multipart/form-data"
        autocomplete="off">
        <div class="form_container">
            <div> <b>Edit Member Information</b></div>

            <div>
                <label for="name">Name</label><br>
                <input type="text" name="name" maxlength="20" value="<?php echo $name; ?>" required><br>
            </div>

            <div>
                <label for="phone">Phone no.</label><br>
                <input type="text" name="phone" minlength="10" maxlength="10" value="<?php echo $phone; ?>"
                    required><br>
            </div>

            <div>
                <label for="email">Email</label><br>
                <input type="email" name="email" value="<?php echo $email; ?>" required> <br>
            </div>
            <div>
                <label for="status">Status</label><br>
                <!-- <input type="status" name="status"  value="<?php echo $status; ?>" required> <br> -->
                <select name="status" id="">
                    <option value="<?php echo $status; ?>">
                        <?php echo $status; ?>
                    </option>


                    <?php
                    if ($status == 'offline') {
                        echo "   <option value='online'>Online</option>  ";
                    } else {
                        echo "   <option value='offline'>Offline</option>  ";
                    }
                    ?>
                </select>
            </div>


            <div>

                <input type="hidden" name="oldEmail" id="" value="<?php echo $email; ?>">
                <input type="hidden" name="member_id" id="" value="<?php echo $id; ?>">
                <input type="submit" name="update" id="" value="Update">

            </div>
        </div>
    </form>

</div>
<?php
include('layout/footer.php');
?>