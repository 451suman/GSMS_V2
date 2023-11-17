<?php
include('main_dash/nav.php');
?>


<form action="forget_put_OTP.php" method="post" id="login_form" autocomplete="off">
    <div class="form_container">
        <div> <b>Forget Password</b></div>
        <div>
            <label for="email">Email</label><br>
            <input type="email" name="email" placeholder="Enter your email" required> <br>
        </div>

        <div>
            <input type="submit" name="searchs" id="searchs" value="searchs">
        </div>
    </div>
</form>
<?php
include('layout_member/footer.php');
?>