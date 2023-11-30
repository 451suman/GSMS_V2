<?php
include('main_dash/nav.php');
?>



<!-- otpis genereate and mail is send to user -->
<?php
if (isset($_POST['searchs'])) {
    $conn = new mysqli("localhost", "root", "", "gsms");
    $email = $_POST["email"];
    $sql = " SELECT * FROM member where email='$email'";
    $r = $conn->query($sql);
    if ($r->num_rows > 0 && $row = $r->fetch_assoc()) {
        $mid = $row['mid'];
        $name = $row['name'];

        date_default_timezone_set('Asia/Kathmandu');
        // $otp_expiryy=date('y-m-d h:i:s');
        $otp_expiry = date('Y-m-d H:i:s', time() + 60 * 3);

        $otp = rand(100000, 999999);
        $hash_otp = md5($otp);


        $sqll = "UPDATE member SET m_otp='$hash_otp', m_opt_expire_time='$otp_expiry' WHERE mid='$mid'";
        $rr = $conn->query($sqll);
        if ($rr) {

            $to = "$email";
            $subject = "GYM Subscription MS"; 
            $message = "Good day there, $name! Your one-time password (OTP) is $otp. 
                    Remember that this OTP is only valid until $otp_expiry.  From GSMS"; 
            $headers = "From: orozmush@gmail.com\r\n";
            $headers .= "Reply-To: orozmush@gmail.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";


            if (mail($to, $subject, $message, $headers)) {
                echo '<script>';
                echo 'swal.fire({
                             icon: "info",
                            title: "CHECK MAIL!",
                            text: "An email has been sent to your email address. Please check your email.",
                           
                        });';
                echo '</script>';

            } else {
                echo "Email delivery failed...";
            }

        } else {
            echo '<script>';
            echo 'swal.fire({
                         icon: "error",
                        title: "ERROR!",
                        text: "FAILED TO SEND MAIL.",
                       
                    });';
            echo '</script>';
        }
    } else {
        echo '<script>';
        echo 'swal.fire({
                     icon: "error",
                    title: "email not found !",
                   
                }).then(function() {
                    window.location = "forgetpassEmail.php";
                });';
        echo '</script>';
    }
}
?>

<div>

    <form action="forget_pass_change.php" method="post" id="login_form" autocomplete="off">
        <div class="form_container">
            <div>
                <label for="OTP">Enter OTP</label><br>
                <input type="OTP" name="OTP" placeholder="Enter OTP" required>
            </div>
            <div>
                <input type="hidden" name="forget_mid" value="<?php echo $mid; ?>">
                <input type="hidden" name="forget_email" value="<?php echo $email; ?>">
                <input type="submit" name="otp_Submit" id="otp_Submit" value="otp_Submit">
            </div>
        </div>
    </form>
</div>
<?php
include('layout_member/footer.php');
?>