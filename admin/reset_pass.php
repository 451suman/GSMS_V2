<?php
include('layout/header.php');
include('layout/left.php');
include('layout/adminsession.php');

if (isset($_GET['reset'])) {
    $e = $_GET['email'];
    $conn = new mysqli("localhost", "root", "", "gsms");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM member WHERE email = '$e'";
    $r = $conn->query($sql);
    if ($r->num_rows > 0) {
        $row = $r->fetch_assoc();
        $mid = $row['mid'];
        $reset = md5('reset@1234');
        $sql2 = "UPDATE member SET password = '$reset' WHERE mid = $mid";
        $result = $conn->query($sql2);

        if ($result) {
            echo '<script type="text/javascript">';
            echo "Swal.fire({
                        text: 'Reset Successful. The new password is reset@1234.',
                        icon: 'success',
                      }).then(function() {
                        window.location = 'reset_pass.php';
                    });";
            // echo 'alert("Reset Successful. The new password is reset@1234.");';
            // echo 'window.location.href = "reset_pass.php";';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo "Swal.fire({
                        text: 'ERROR: Reset Unsuccessful.',
                        icon: 'error',
                      }).then(function() {
                        window.location = 'reset_pass.php';
                    });";
            // echo 'alert("ERROR: Reset Unsuccessful.");';
            // echo 'window.location.href = "reset_pass.php";';
            echo '</script>';
        }
    } else {
        echo '<script type="text/javascript">';
        echo "Swal.fire({
                text: 'ERROR: Invalid Email.',
                icon: 'error',
              }).then(function() {
                window.location = 'reset_pass.php';
            });";
        // echo 'alert("ERROR: Invalid Email.");';
        // echo 'window.location.href = "reset_pass.php";';
        echo '</script>';
    }

}
?>

<div id="right">
    <div class="res_password">
        <form action="reset_pass.php" method="get" autocomplete="off">
            <h4 style="color: #FFA559;">Reset Member Password</h4>
            Email: <br>
            <input type="text" name="email" id="" class="transparent"><br>
            <input type="submit" name="reset" value="Reset" id="reset">
        </form>
        <p style="font-size: 15px !important; padding:10px; color: #FFA559;">New password: reset@1234</p>
    </div>
</div>

<?php
include('layout/footer.php');
?>