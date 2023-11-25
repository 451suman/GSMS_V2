<?php
include('layout/header.php');
include('layout/left.php');
include('layout/adminsession.php');
?>

<?php
if (isset($_POST["update_routine"])) {
    $id = $_POST["routine_id"];
    $chest = $_POST["chest"];
    $back = $_POST["back"];
    $soulder = $_POST["soulder"];
    $biseps = $_POST["biseps"];
    $triceps = $_POST["triceps"];
    $leg = $_POST["leg"];
    $abs = $_POST["abs"];
    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("Database connection error");
    }
    $sql = "UPDATE routine SET chest = '$chest', back= '$back', soulder = '$soulder', biseps = '$biseps', triceps = '$triceps', leg = '$leg', abs='$abs', verify='yes' WHERE rid = $id";
    $r = $conn->query($sql);
    if ($r) {
        echo '<script>';
        echo 'Swal.fire({
                    icon: "success",
                    title: "Routine Update successful.",
                    text: "",
                  }).then(function() {
                    window.location = "routinelist.php";
                });';
        // echo 'alert("Routine Update successful.");';
        // echo 'window.location.href = "routinelist.php";';

        echo '</script>';
        header("location:");
    } else {
        echo '<script>';
        echo 'Swal.fire({
                    icon: "error",
                    title: "Routine Update Failed.",
                    text: "",
                  }).then(function() {
                    window.location = "routinelist.php";
                });';
        echo '</script>';
    }

}





if (isset($_GET["routine_update"])) {
    $id = $_GET["routine_id"];
    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("Database connection error");
    }
    $sql = "select * from routine where rid='$id' ";
    $r = $conn->query($sql);
    $row = $r->fetch_assoc();

    $chest = $row["chest"];
    $back = $row["back"];
    $soulder = $row["soulder"];
    $biseps = $row["biseps"];
    $triceps = $row["triceps"];
    $leg = $row["leg"];
    $abs = $row["abs"];


}

?>

<div id="right">
    <div class="routineform_container_bg">
        <form action="edit_routine_form.php" method="post" class="routine_form" autocomplete="off">
            <div class="routineform_container">
                <div> <b>Routine</b></div>


                <div>
                    <label for="chest">Chest Exercise</label><br>
                    <input type="text" name="chest" value="<?php echo $chest; ?>" id="routine_form_inp">
                    <!-- <textarea name="chest" class="transparent_textarea" id="chest" cols="" rows="5"value="< ?php echo $chest;?>" ></textarea> -->
                </div>

                <div>
                    <label for="back">Back Exercise</label><br>
                    <input type="text" name="back" value="<?php echo $back; ?>" id="routine_form_inp">
                    <!-- <textarea name="back" class="transparent_textarea" id="back" cols="" rows="5" value="< ?php echo $back;?>" ></textarea> -->
                </div>

                <div>
                    <label for="soulder">Soulder Exercise</label><br>
                    <input type="text" name="soulder" value="<?php echo $soulder; ?>" id="routine_form_inp">
                    <!-- <textarea name="soulder" class="transparent_textarea" id="soulder" cols="" rows="5" value="< ?php echo $soulder;?>" ></textarea> -->
                </div>


                <div>
                    <label for="biseps">Biseps Exercise</label><br>
                    <input type="text" name="biseps" value="<?php echo $biseps; ?>" id="routine_form_inp">
                    <!-- <textarea name="biseps" class="transparent_textarea" id="biseps" cols="" rows="5" < ?php echo $biseps;?>" ></textarea> -->
                </div>

                <div>
                    <label for="triceps">Triceps Exercise</label><br>
                    <input type="text" name="triceps" value="<?php echo $triceps; ?>" id="routine_form_inp">
                    <!-- <textarea name="triceps" class="transparent_textarea" id="triceps" cols="" rows="5" value="< ?php echo $triceps;?>></textarea> -->
                </div>

                <div>
                    <label for="leg">Leg Exercise</label><br>
                    <input type="text" name="leg" value="<?php echo $leg; ?>" id="routine_form_inp">
                    <!-- <textarea name="leg" class="transparent_textarea" id="leg" cols="" rows="5" < ?php echo $leg;?>" ></textarea>  -->
                </div>

                <div>
                    <label for="abs">Abs Exercise</label><br>
                    <input type="text" name="abs" value="<?php echo $abs; ?>" id="routine_form_inp">
                    <!-- <textarea name="abs" class="transparent_textarea" id="abs" cols="" rows="5" value="< ?php echo $abs;?>" ></textarea> -->
                </div>









                <input type="hidden" name="routine_id" id="" value="<?php echo $id ?>">
                <input type="submit" name="update_routine" id="update_routine" value="update routine">
        </form>
    </div>
</div>


<?php
include('layout/footer.php');
?>