<?php
include('layout/header.php');
include('layout/left.php');
include('layout/adminsession.php');
?>

<?php

// getting values from page form down for edit
if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $ph = $_POST['phone'];
    $e = $_POST['email'];
    $id = $_POST['admin_id'];
    $error = [];


   if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $error['name'] = "Name should only contain letters and spaces.";
    }

    // Validate email
    if (strlen($e) > 30) {
        $error['email'] = "Email should be maximum 30 characters long.";
    } elseif (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Please enter a valid email address";
    } else {
        if ($ae != $e) {
            $conn = new mysqli("localhost", "root", "", "gsms");
            if ($conn->connect_error) {
                die("Database connection error");
            }
            $check_duplicate = $conn->query("SELECT email FROM admin WHERE email = '$e'");
            if ($check_duplicate->num_rows > 0) {
                $error['email'] = "Email already registered";
            }
        }
    }

    // Validate phone number
    if (!preg_match('/^[0-9]{10}$/', $ph)) {
        $error['phone'] = "Please enter a valid 10-digit phone number";
    }

    if (!empty($error)) {
        echo '<script>';
        echo 'var errorMessage = "";';
        foreach ($error as $errorMsg) {
            // \\n is used to insert a newline character into a string
            echo "errorMessage += ' $errorMsg\\n';";
        }
        // echo "alert(errorMessage);";
        echo "Swal.fire({
        title: 'Error!',
        text: errorMessage,
        icon: 'error',
        confirmButtonText: 'OK'
      }).then(function() {
        window.location = 'adminprofile.php';
    });";
        echo '</script>';
    } else {
        $conn = new mysqli("localhost", "root", "", "gsms");
        if ($conn->connect_error) {
            die("Database connection error");
        }
        $sql = "UPDATE admin SET name = '$name', phone = '$ph', email = '$e' WHERE aid='$id'";
        $r = $conn->query($sql);
        if ($r) {
            echo '<script>';
            echo "Swal.fire({
            text: 'Update Successful',
            icon: 'success',
          }).then(function() {
            window.location = 'adminprofile.php';
        });";
            // echo 'window.location.href = "adminprofile.php";';
            echo '</script>';
        } else {
            echo '<script>';
            echo "Swal.fire({
                text: 'Update Failed',
                icon: 'error',
              }).then(function() {
                window.location = 'adminprofile.php';
            });";
            // echo 'window.location.href = "adminprofile.php";';
            echo '</script>';
        }
    }
}




//  get values from book memberlist.php after click edit botton//
if (isset($_GET['edit_admin'])) {
    $id = $_GET['admin_id'];
    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("connection error");
    }

    $sql = "select * from admin where aid='$id' ";
    $r = $conn->query($sql);
    $row = $r->fetch_assoc();
    $name = $row["name"];
    $phone = $row["phone"];
    $email = $row["email"];
}
?>


<div id="right">
    <form action="edit_admin_profile.php" method="post" class="edit_admin_form">
        <div class="form_container">
            <div> <b>Edit Admin Information</b></div>

            <div>
                <label for="name">Name</label><br>
                <input type="text" name="name" maxlength="20" value="<?php echo $name; ?>" required><br>
            </div>

            <div>
                <label for="phone">Phone no.</label><br>
                <input type="text" name="phone" maxlength="10" minlength="10" value="<?php echo $phone; ?>"
                    required><br>
            </div>

            <div>
                <label for="email">Email</label><br>
                <input type="email" name="email" value="<?php echo $email; ?>" required> <br>
            </div>


            <div>
                <input type="hidden" name="admin_id" id="" value="<?php echo $id; ?>">
                <input type="submit" name="update" id="" value="Update">

            </div>
        </div>
    </form>

</div>
<?php
include('layout/footer.php');
?>