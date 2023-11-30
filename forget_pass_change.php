<?php
include('main_dash/nav.php');
?>

<?php
if (isset($_POST['Submit'])) {
    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die('connection failed');
    }
    $mid = $_POST["forget_mid"];
    $email = $_POST["forget_email"];
    $pass = $_POST["password"];
    $c_pass = $_POST["c_password"];
    $error = [];
    if (empty($pass)) {
        $error['password'] = "Please enter a password";
    } elseif (strlen($pass) !== 10) {
        $error['password'] = "Password must be exactly 10 characters long";
    } else {
        if ($pass !== $c_pass) {
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
                icon: 'error',
                title: 'Password change Error!',
                text: errorMessage,
                confirmButtonText: 'OK'
              });";
        echo '</script>';
    } else {
        $hash = md5($_POST["c_password"]);
        $change_pass_sql = "UPDATE member SET password = '$hash' WHERE mid='$mid' ";
        $result = $conn->query($change_pass_sql);
        if ($result) {
            echo '<script>';
            echo 'swal.fire({
                     icon: "success",
                    title: "Wow!",
                    text: "password change  Sucessful",
                }).then(function() {
                    window.location = "login.php";
                });';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'swal.fire({
                     icon: "error",
                    title: "ERROR!",
                    text: "password change  Failed",
                   
                }).then(function() {
                    window.location = "login.php";
                });';
            echo '</script>';
        }
    }
}
?>

<?php
if (isset($_POST['otp_Submit'])) {
    $conn = new mysqli("localhost", "root", "", "gsms");
    $otp = $_POST['OTP'];

    $hash_otp = md5($otp);

    $email = $_POST["forget_email"];
    $mid = $_POST["forget_mid"];

    $check_otp = "SELECT m_otp, m_opt_expire_time FROM member WHERE mid='$mid'";
    $r = $conn->query($check_otp);

    if ($r->num_rows > 0 && $row = $r->fetch_assoc()) {
        $DB_otp = $row['m_otp'];
        $DB_otp_eDate = $row['m_opt_expire_time'];



        date_default_timezone_set('Asia/Kathmandu');
        $current = date('Y-m-d H:i:s');

        if ($DB_otp_eDate < $current) {
            echo '<script>';
            echo 'swal.fire({
                icon: "error",
                title: "Error!",
                text: "The OTP (One-Time Password) is no longer valid or has passed its expiration time.",
            }).then(function() {
                window.location = "forgetpassEmail.php";
            });';
            echo '</script>';
        } else if ($hash_otp == $DB_otp) {
            echo '<script>';
            echo 'swal.fire({
                icon: "success",
                text: "The OTP (One-Time Password) has been successfully verified.",
            });';
            echo '</script>';
        } else {
            // OTP is invalid
            echo '<script>';
            echo 'swal.fire({
                icon: "error",
                title: "Error!",
                text: "The OTP (One-Time Password) did not matched",
            }).then(function() {
                window.location = "forgetpassEmail.php";
            });';
            echo '</script>';
        }


    }
}
?>
<div>
    <!-- Password change form -->
    <div>
        <form action="forget_pass_change.php" method="post" id="login_form" autocomplete="off">
            <div class="form_container">
                <div> <b>Change Password</b></div>
                <div>
                    <label for="password">New Password</label><br>
                    <input type="password" name="password" placeholder="Password must be exactly 10 characters"
                        minlength="10" maxlength="10" required>
                </div>
                <div>
                    <label for="c_password">Conform Password</label><br>
                    <input type="password" name="c_password" placeholder="enter password again" minlength="10"
                        maxlength="10" required>
                </div>

                <div>
                    <input type="hidden" name="forget_mid" id="" value="  <?php echo $mid; ?>">
                    <input type="hidden" name="forget_email" id="" value="  <?php echo $email; ?>">
                    <input type="submit" name="Submit" id="Submit" value="Submit">
                </div>
            </div>
        </form>

    </div>
</div>


<?php
include('layout_member/footer.php');
?>