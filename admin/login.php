<?php
include('layout/header.php');
// include('layout/left.php');


?>

<?php
if (isset($_POST["login"])) {
    $e = $_POST["email"];
    $p = md5($_POST["password"]);


    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("database connection error");

    }
    $sql = "select * from admin where email='$e' and password='$p'";
    $r = $conn->query($sql);

    if ($r->num_rows > 0) {
        $row = $r->fetch_assoc();
        session_start();
        $_SESSION["admin"] = $row;

        header("location: dashboard.php");
        exit;
    } else {
        echo '<script>';

        echo 'swal.fire({
             icon: "error",
            text: "username or password is incorrect",
           
        }).then(function() {
            window.location = "login.php";
        });';
        echo '</script>';

    }
}

?>

<!-- <div id="right"> -->

<form action="login.php" method="post" id="login_form" autocomplete="off">
    <div class="form_container">
        <div> <b>ADMIN LOGIN</b></div>
        <div>
            <label for="email">Email</label><br>
            <input type="email" name="email" class="transparent" required> <br>
        </div>
        <div>
            <label for="password">Password</label><br>
            <input type="password" name="password" maxlength="10" class="transparent" required> <br>

        </div>
        <div>
            <input type="submit" name="login" id="login" value="login">
            <br>
            <br>

        </div>
    </div>
</form>
<!-- </div> -->
<?php
include('layout/footer.php');
?>