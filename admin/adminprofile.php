<?php
include('layout/header.php');
include('layout/left.php');
include('layout/adminsession.php');
?>



<div id="right">
    <?php
    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("Database connection error");
    }
    $sql = "SELECT * FROM admin WHERE aid ='$aid'";
    $r = $conn->query($sql);
    $row = $r->fetch_assoc();
    $id = $row['aid'];
    $n = $row['name'];
    $e = $row['email'];
    $p = $row['phone'];
    ?>
    <div class="adminprofile">
        <div class="aform_container">
            <h1><b>EDIT PROFILE</b></h1>
            <div>
                <label for="name">Name</label><br>
                <input type="text" name="name" maxlength="20" value="<?php echo $n; ?>" class="profile_inp"
                    readonly><br>
            </div>

            <div>
                <label for="phone">Phone no.</label><br>
                <input type="text" name="phone" maxlength="10" minlength="10" value="<?php echo $p; ?>"
                    class="profile_inp" readonly><br>
            </div>

            <div>
                <label for="email">Email</label><br>
                <input type="email" name="email" value="<?php echo $e; ?>" class="profile_inp" readonly> <br>
            </div>


            <div class='data'>
                <h6 class='info'>
                    <form action='edit_admin_profile.php' method='get'>
                        <input type='hidden' value='<?php echo $id; ?>' name='admin_id' />
                        <input type='submit' name='edit_admin' value='Edit Profile' class="admin_profile_button">
                    </form>
                </h6>

                <h6 class='info'>
                    <form action='a_change_password.php' method='get'>
                        <input type='hidden' value='<?php echo $id; ?>' name='admin_id' />
                        <input type='submit' name='change_apass' value='Change password' class="admin_profile_button">
                    </form>
                </h6>

            </div>
        </div>
    </div>


</div>
<?php
include('layout/footer.php');

?>