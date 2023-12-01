<!-- edit subscription date form -->
<?php
include('layout/header.php');
include('layout/left.php');
include('layout/adminsession.php');
?>


<?php
// getting values from page form down for edit
if (isset($_POST['sub_update'])) {
    $id = $_POST['memebr_id'];
    // $renew_date=$_POST['renew_date'];
    $expiry_date = $_POST['expiry_date'];


    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("connection error");
    }
    $sql = "UPDATE member_subscription_track SET  expiry_date = '$expiry_date' WHERE mid = '$id';";
    $r = $conn->query($sql);

    if ($r) {
        echo '<script>';
        echo "Swal.fire({
        text: 'Date Update Successful.',
        icon: 'success',
    }).then(function() {
        window.location = 'membersubscription.php';
    });";
        echo '</script>';

        //    header("location:membersubscription.php");
    } else {
        echo "unsuccessful";
    }
}

//  get values from book category.php after click edit botton//
if (isset($_GET['edit_track'])) {
    $id = $_GET['member_id'];
    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("connection error");
    }

    $sql = "SELECT member.name, member_subscription_track.expiry_date
           FROM member
           INNER JOIN member_subscription_track ON member.mid = member_subscription_track.mid
           WHERE member.mid = $id;";
    $r = $conn->query($sql);
    $row = $r->fetch_assoc();
    // $id=$row["mid"];
    $name = $row["name"];
    // $renew_date=$row["renew_date"];
    $expiry_date = $row["expiry_date"];


}
?>


<div id="right">
    <form action="edit_sub_track.php" method="post" class="editsub_track_form" autocomplete="off" >
        <div class="form_container">
            <div> <b>EDIT CATEGORY</b></div>
            <div>
                <label for="name">Name</label><br>
                <?php echo "$name"; ?>
            </div>

            <div>
                <label for="expiry_date">Expire date</label><br>
                <input type="date" name="expiry_date" id="expiry_date" value="<?php echo $expiry_date; ?>"><br>
            </div>

            <div>
                <input type="hidden" name="memebr_id" id="" value="<?php echo $id; ?>">
                <input type="submit" name="sub_update" id="" value="Update">
            </div>
        </div>
    </form>

</div>
<?php
include('layout/footer.php');
?>