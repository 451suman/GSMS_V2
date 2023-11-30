<?php
include('layout_member/header.php');
include('layout_member/left.php');
include('layout_member/member_session.php');
?>

<div id="right">
<!--  talla ko form  ko backend code -->
    <?php
    if (isset($_GET['change_password'])) {
        $mid = $_GET['mid'];
        $pass = $_GET['pass'];
        $oldpass = md5($_GET['oldpass']);
        $c_pass = $_GET['c_pass'];
        $md_pass = md5($_GET['c_pass']);


        $conn = new mysqli("localhost", "root", "", "gsms");
        if ($conn->connect_error) {
            die("connection error");
        }
        $SQLcheckOldPass = "SELECT * FROM member WHERE mid='$mid'";
        $checkOldPassResult = $conn->query($SQLcheckOldPass);
        $row = $checkOldPassResult->fetch_assoc();

        if ($row['password'] == $oldpass) {
            if (strlen($pass) !== 10) {
                echo '<script>';
                echo "Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Password must be exactly 10 characters long.'
                    }).then(function() {
                        window.location = 'profile.php';
                    });";
                // echo 'alert("Password must be exactly 10 characters long");';
                // echo 'window.location.href = "profile.php";';
                echo '</script>';
            } elseif ($pass !== $c_pass) {
                echo '<script>';
                echo "Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Password did not match.'
                    }).then(function() {
                        window.location = 'profile.php';
                    });";
                // echo 'alert("Password did not match");';
                // echo 'window.location.href = "profile.php";';
                echo '</script>';
            } else {
                $conn = new mysqli("localhost", "root", "", "gsms");
                if ($conn->connect_error) {
                    die("connection error");
                }
                $sql2 = "UPDATE `member` SET `password` = '$md_pass' WHERE `member`.`mid` = $mid";
                $result = $conn->query($sql2);
                if ($result) {
                    echo '<script>';
                    echo "Swal.fire({
                            icon: 'success',
                            title: 'Error!',
                            text: 'Password Change successful.'
                        }).then(function() {
                            window.location = 'profile.php';
                        });";
                    // echo 'alert("Password Change successful");';
                    // echo 'window.location.href = "profile.php";';
                    echo '</script>';
                } else {
                    echo '<script>';
                    echo "Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Password Change unsuccessful.'
                        }).then(function() {
                            window.location = 'profile.php';
                        });";
                    // echo 'alert("ERROR (Password Change unsuccessful)");';
                    // echo 'window.location.href = "profile.php";';
                    echo '</script>';
                }
            }
        } else {
            echo '<script>';
            echo "Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'ERROR (Please enter your valid Old Password).'
                }).then(function() {
                    window.location = 'profile.php';
                });";
            // echo 'alert("ERROR (Please enter your valid Old Password)");';
            // echo 'window.location.href = "profile.php";';
            echo '</script>';
        }
    }
    ?>
<!-- getting data from data base -->
    <?php
    if (isset($_GET['change_pass'])) {
        $conn = new mysqli("localhost", "root", "", "gsms");
        if ($conn->connect_error) {
            die("connection error");
        }
        $sql = "SELECT * FROM member where mid='$id' ";
        $r = $conn->query($sql);
        $row = $r->fetch_assoc();
        $mid = $row['mid'];
        $name = $row["name"];
        $password = $row["password"];
    }
    ?>

    <div class="change_pass">
        <div>
            <form action="member_change_password.php" method="get">


                Old Password: <br>

                <input type="password" name="oldpass" id="" style="width: 280px;" required> <br>

                New Password: <br>

                <input type="password" name="pass" id="" minlength="10" placeholder="only 10 characters"
                    style="width: 280px;" required> <br>

                Confirm Password: <br>

                <input type="password" name="c_pass" minlength="10" placeholder="only 10 characters" id=""
                    style="width: 280px;" required> <br>


                <input type="hidden" name="mid" id="" value="<?php echo $mid ?>">
                <input type="submit" name="change_password" value="Change Password" id="">
            </form>
        </div>
    </div>

</div>
<?php
include('layout_member/footer.php');
?>