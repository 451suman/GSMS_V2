<?php
include('layout/header.php');
include('layout/left.php');
include('layout/adminsession.php');
?>

<div id="right">

    <?php
    if (isset($_POST['change_password'])) {
        $aid = $_POST['aid'];
        $c_pass = $_POST['c_pass'];
        $pass = $_POST['pass'];
        $oldpass = md5($_POST['oldpass']);
        $conn = new mysqli("localhost", "root", "", "gsms");
        $sqlCheckOpass = "SELECT * FROM admin WHERE aid='$aid'";
        $checkResult = $conn->query($sqlCheckOpass);
        $row = $checkResult->fetch_assoc();
        if ($oldpass == $row['password']) {

            if (strlen($pass) !== 10) {
                echo '<script>';
                echo "Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Password must be exactly 10 characters long.'
            }).then(function() {
                window.location = 'adminprofile.php';
            });";
                echo '</script>';

            } elseif ($pass !== $c_pass) {
                echo '<script>';
                echo "Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Password did not match.'
                }).then(function() {
                    window.location = 'adminprofile.php';
                });";
                echo '</script>';
            } else {
                $conn = new mysqli("localhost", "root", "", "gsms");
                if ($conn->connect_error) {
                    die("connection error");
                }

                $md_pass = md5($_POST['c_pass']);


                $sql2 = "UPDATE admin SET password = '$md_pass' WHERE aid = $aid";
                $result = $conn->query($sql2);
                if ($result) {
                    echo '<script>';
                    echo "Swal.fire({
                        icon: 'success',
                        title: 'Successful',
                        text: 'Password Change successful.'
                    }).then(function() {
                        window.location = 'adminprofile.php';
                    });";
                    // echo 'alert("Password Change successful");';
                    // echo 'window.location.href = "adminprofile.php";';
                    echo '</script>';
                } else {
                    echo '<script>';
                    echo "Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Password Change unsuccessful.'
                    }).then(function() {
                        window.location = 'adminprofile.php';
                    });";
                    // echo 'alert("ERROR (Password Change unsuccessful)");';
                    // echo 'window.location.href = "adminprofile.php";';
                    echo '</script>';
                }
            }
        } else {
            echo '<script>';
            echo "Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'ERROR (please enter old valid password).'
            }).then(function() {
                window.location = 'adminprofile.php';
            });";
            echo '</script>';
        }
    }

    ?>

<!-- extract data from DB of admin -->
    <?php
    if (isset($_GET['change_apass'])) {
        $aid = $_GET['admin_id'];
        $conn = new mysqli("localhost", "root", "", "gsms");
        if ($conn->connect_error) {
            die("Database connection error");
        }
        $sql = "select * from admin where aid='$aid' ";
        $r = $conn->query($sql);
        if ($r) {
            $row = $r->fetch_assoc();
            $aname = $row['name'];
        }

    }

    ?>

    <div class="achange_pass">
        <div>
            <form action="a_change_password.php" method="post">
             
                Old Password: <br>
                <input type="password" name="oldpass" id="" style="width: 280px;" placeholder="Enter Old Password"
                    required> <br>

                New Password: <br>
                <input type="password" name="pass" id="" minlength="10" placeholder="Only 10 characters"
                    style="width: 280px;" required> <br>

                Confirm Password: <br>
                <input type="password" name="c_pass" minlength="10" placeholder="Only 10 characters" id=""
                    style="width: 280px;" required> <br>
                <input type="hidden" name="aid" id="" value="<?php echo $aid ?>">
                <input type="submit" name="change_password" value="Change Password" id="">
            </form>
        </div>
    </div>

</div>
<?php
include('layout/footer.php');
?>