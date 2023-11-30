<?php
// include('layout_member/header.php');
// include('layout_member/left.php');
include('main_dash/nav.php');


?>

<?php
if (isset($_POST["login"])) {
    $e = $_POST["email"];
    $p = md5($_POST["password"]);
    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("database connection error");
    }
    $sql = "select * from member where email='$e' and password='$p'";
    $r = $conn->query($sql);

    if ($r->num_rows > 0) {
        $row = $r->fetch_assoc();
        session_start();
        $_SESSION["member"] = $row;
        header("location:index.php");
        exit;
    } else {


        echo '<script>';
        echo "Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'username or password is incorrect!',
            })";
        echo '</script>';
    }
}
?>

<div>

    <form action="login.php" method="post" id="login_form" autocomplete="off">
        <div class="form_container">
            <div> <b>LOGIN</b></div>
            <div>
                <label for="email">Email</label><br>
                <input type="email" name="email" class="transparent" required> <br>
            </div>
            <div>
                <label for="password">Password</label><br>
                <input type="password" name="password" class="transparent" maxlength="10" required> <br>

            </div>
            <div>
                <input type="submit" name="login" id="login" value="login">

                <p style="font-size: 13px;">Forget Password <a href="forgetpassEmail.php">click here</a></p>

                <p style="font-size: 13px;">FOR SIGNUP <a href="signup.php">click here</a></p>

            </div>
        </div>
    </form>
    <!-- </div> -->
    <?php
    include('layout_member/footer.php');
    ?>