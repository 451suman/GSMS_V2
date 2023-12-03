<style>
    div:where(.swal2-container) button:where(.swal2-styled).swal2-confirm {

        background-color: #fa0000 !important;

    }
</style>
<?php
// include('layout/header.php');
include('main_dash/nav.php');


if (isset($_POST["signup"])) {
    $name = $_POST["name"];
    $ph = $_POST["phone"];
    $e = $_POST["email"];
    $p = $_POST["password"];
    $c_pass = $_POST["c_pass"];

    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("Database connection error");
    }

    $error = [];

    // Validate name
    if (empty($name)) {
        $error['name'] = "Please enter a name";
    } elseif (strlen($name) > 20) {
        $error['name'] = "The name address should not exceed more than 20 characters in length.";
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $error['name'] = "Name should only contain letters and spaces.";
            }
    }

    // Validate email
    if (empty($e)) {
        $error['email'] = "Please enter an email address";
    } elseif (strlen($e) > 30) {
        $error['email'] = "The email address should not exceed more than 30 characters in length.";
    } elseif (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Please enter a valid email address";
    } else {
        // Check for duplicate email in the database
        $check_duplicate ="SELECT email FROM member WHERE email = '$e'";
        $result_check= $conn->query($check_duplicate);
        if ($result_check->num_rows > 0) {
            $error['email'] = "Email already registered";
        }
    }



    // Validate phone number
    if (empty($ph) || !preg_match('/^[0-9]{10}$/', $ph)) {
        $error['phone'] = "Please enter a valid 10-digit phone number";
    }

    // Validate password
    if (empty($p)) {
        $error['password'] = "Please enter a password";
    } elseif (strlen($p) !== 10) {
        $error['password'] = "Password must be exactly 10 characters long";
    } else {
        if ($p !== $c_pass) {
            $error['c_pass'] = "Password did not match";
        }
    }

    if (!empty($error)) {
        echo '<script>';
        echo 'var errorMessage = "";';
        foreach ($error as $errorMsg) {
            echo "errorMessage += '$errorMsg. ';"; 
        }
        echo "Swal.fire({
            title: 'Signup Error!',
            text: errorMessage,
            icon: 'error',
            confirmButtonText: 'OK'
          });";
        echo '</script>';
    } else {
        // Hash the password using bcrypt
        $hash = md5($_POST["c_pass"]);
        $sql = "INSERT INTO member (name, email, phone, password) VALUES ('$name', '$e', '$ph', '$hash')";
        $result = $conn->query($sql);
        if ($result) {
            echo '<script >';
            echo 'swal.fire({
                     icon: "success",
                    title: "Wow!",
                    text: "Signup Sucessful",
                   
                }).then(function() {
                    window.location = "login.php";
                });';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("data insert unsuccessful");';
            echo 'window.location.href = "login.php";';
            echo '</script>';
        }
    }
}
?>

<form action="signup.php" method="post" class="signup_form" enctype="multipart/form-data" autocomplete="off">
    <div class="form_container">
        <div><b>MEMBER SIGNUP</b></div>
        <div>
            <label for="name">Full Name</label><br>
            <input type="text" name="name" id="name" maxlength="30" class="transparent" required><br>
        </div>

        <div>
            <label for="email">Email</label><br>
            <input type="text" name="email" id="email" class="transparent" required><br>
        </div>

        <div>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password" class="transparent" minlength="10" maxlength="10"
                placeholder="Only 10 character" required><br>
        </div>

        <div>
            <label for="cpassword">Confirm Password</label><br>
            <input type="password" id="cpassword" name="c_pass" minlength="10" class="transparent" placeholder="Only 10 character"
                required><br>
        </div>

        <div>
            <label for="phone">Phone no.</label><br>
            <input type="text" id="phone" name="phone" minlength="10" maxlength="10" class="transparent" required><br>
        </div>

        <div>
            <input type="submit" name="signup" id="signup" value="Signup">
        </div>

        <p style="font-size: 15px;">FOR LOGIN <a href="login.php">click here</a></p>
    </div>
</form>

<?php
// include('layout/footer.php');
?>