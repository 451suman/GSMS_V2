<?php
include('layout/header.php');
include('layout/left.php');
include('layout/adminsession.php');


?>




<div id="right">

    <?php

    if ($aid == 1) {
        if (isset($_POST["add_admin"])) {
            $name = $_POST["name"];
            $ph = $_POST["phone"];
            $e = $_POST["email"];
            $p = $_POST["password"];
            $error = [];


            // Validate name
            // if (empty($name)) {
            //     echo '<script type="text/javascript">';
            //     echo 'alert("Please enter a name");';
            //     echo"window.location.href = 'add_admin.php '";
            //     echo '</script>';
            // }
    
            if (!preg_match('/^[A-Za-z]+(?:\s[A-Za-z]+)?$/', $name)) {
                $error['name'] = "Name field should contain alphabets and a maximum of one space between words";

            }
            // Validate password
            if (strlen($p) !== 10) {
                $error['password'] = "Password must be exactly 10 characters long ";

            }
            // Validate email
            if (strlen($e) > 30) {
                $error['email'] = "Email should be maximum 30 characters long ";

            } elseif (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Please enter a valid email address ";

            } else {
                if ($e != $ae) {
                    $conn = new mysqli("localhost", "root", "", "gsms");
                    if ($conn->connect_error) {
                        die("Database connection error");
                    }
                    $check_duplicate = $conn->query("SELECT email FROM admin WHERE email = '$e'");
                    if ($check_duplicate->num_rows > 0) {
                        $error['email'] = "Email already registered ";

                    }

                }
            }
            // Validate phone number
            if (!preg_match('/^[0-9]{10}$/', $ph)) {
                $error['phone'] = "Please enter a valid 10-digit phone number ";
            }
            if (!empty($error)) {
                echo '<script type="text/javascript">';
                echo 'var errorMessage = "";';
                foreach ($error as $errorMsg) {
                    // \\n is used to insert a newline character into a string
                    echo "errorMessage += '$errorMsg. ';";
                }
                // echo "alert(errorMessage);";
                echo "Swal.fire({
                    title: 'Error!',
                    text: errorMessage,
                    icon: 'error',
                    confirmButtonText: 'OK'
                  }).then(function() {
                    window.location = 'adminlist.php';
                });";
                echo '</script>';
            } else {
                $conn = new mysqli("localhost", "root", "", "gsms");
                if ($conn->connect_error) {
                    die("Database connection error");
                }
                $md_pass = md5($_POST["password"]);
                $sql = "INSERT INTO admin (name, email, phone, password) VALUES ('$name','$e', '$ph', '$md_pass')";
                $result = $conn->query($sql);
                if ($result) {
                    echo '<script type="text/javascript">';
                    echo "Swal.fire({
                        title: 'Success!',
                        text: 'Admin added Successful',
                        icon: 'success',
                      }).then(function() {
                        window.location = 'adminlist.php';
                    });";
                    echo '</script>';
                } else {
                    echo '<script type="text/javascript">';
                    echo "Swal.fire({
                        title: 'Error!',
                        text: 'Admin added Unsuccessful',
                        icon: 'error',
                      }).then(function() {
                        window.location = 'adminlist.php';
                    });";
                    echo '</script>';
                }
            }
        }
    } else {
        echo '<script type="text/javascript">';
        echo "Swal.fire({
            title: 'Error!',
            text: 'You are not allowed to add another Admin',
            icon: 'error',
            confirmButtonText: 'OK'
          }).then(function() {
            window.location = 'adminlist.php';
        });";
        echo '</script>';
    }
    ?>

    <form action="add_admin.php" method="post" class="add_admin_form" enctype="multipart/form-data">
        <div class="form_container">
            <div> <b>ADD ADMIN</b></div>

            <div>
                <label for="name">Admin Name</label><br>
                <input type="text" name="name" minlength="3" maxlength="20" class="transparent" required><br>
            </div>

            <div>
                <label for="phone">Phone no.</label><br>
                <input type="text" name="phone" minlength="10" maxlength="10" class="transparent" required><br>
            </div>
            <div>



                <div>
                    <label for="email">Email</label><br>
                    <input type="email" name="email" class="transparent" required> <br>
                </div>
                <div>
                    <label for="password">Password</label><br>
                    <input type="password" name="password" minlength="10" class="transparent"
                        placeholder="Only 10 Character" required> <br>

                </div>
                <div>
                    <input type="submit" name="add_admin" id="add_admin" value="Add Admin">

                </div>
            </div>
    </form>
</div>



<?php
include('layout/footer.php');
?>