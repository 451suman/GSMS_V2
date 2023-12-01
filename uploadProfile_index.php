<?php
include('layout_member/header.php');
// include('layout_member/left.php');
include('layout_member/member_session.php');
?>
<style>
    #right {
        width: 100% !important;
    }

    form {
        padding: 50px;
        font-size: 28px;
        margin-left: 330px;
    }

    table {
        background-color: white;
        color: black;
    }

    #img {
        border: 5px solid black;
    }

    td {
        padding: 50px;
    }

    #btn:hover {
        background-color: #525252;
    }
</style>


<?php

if (isset($_POST["upload"])) {
    $file_name = $_FILES["image"]["name"];
    $file_size = $_FILES["image"]["size"];
    $file_tmp = $_FILES["image"]["tmp_name"];
    $fileType = pathinfo($file_name, PATHINFO_EXTENSION);

    // Generate a unique filename using a timestamp
    $newFileName = "image_" . time() . '.' . $fileType;

    if ($file_size < 5242880) { // 5242880(bytes) = 5 MB 
        $destination = "img/" . $newFileName;

        if (move_uploaded_file($file_tmp, $destination)) {
            $conn = new mysqli("localhost", "root", "", "gsms");
            if ($conn->connect_error) {
                die("Database connection error: " . $conn->connect_error);
            }


            $sql = "UPDATE member SET image='$newFileName' WHERE mid=$id";
            $result = $conn->query($sql);

            if ($result) {
                echo '<script >';
                echo 'swal.fire({
                         icon: "success",
                        title: "Wow!",
                        text: "upload  Sucessful",
                    }).then(function() {
                        window.location = "index.php";
                    });';
                echo '</script>';
            } else {
                echo '<script>';
                echo "Swal.fire({
                    icon: 'error',
                    title: 'ERROR!',
                    text: 'Data insert unsuccessful',
                }).then(function() {
                    window.location = 'uploadProfile_index.php';
                });";
                echo '</script>';
            }


        } else {

            echo '<script>';
            echo 'Swal.fire({
                    icon: "error",
                    title: "ERROR!",
                    text: "Error moving uploaded file",
                }).then(function() {
                    window.location = "uploadProfile_index.php";
                });';
            echo '</script>';


        }
    } else {
        echo '<script>';
        echo 'Swal.fire({
                icon: "error",
                title: "ERROR!",
                text: "File size exceeds the maximum limit.",
            }).then(function() {
                window.location = "uploadProfile_index.php";
            });';
        echo '</script>';
    }
}
?>



<div id="right">


    <form action="uploadProfile_index.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>

                    <p>
                        <?php echo "Name: $n"; ?>
                    </p>
                    <p>Upload yor profile</p>
                    <img src="img/static/defaultuser.jpg" style="height:400px; width:400px;" id="img" alt="">

                </td>
                <td>
                    <br>
                    <input type="file" name="image" id="" accept=".jpg, .jpeg, .png" required>
                    <br>
                    <input type="submit" name="upload" value="Upload Image" id="btn">

                </td>
            </tr>
        </table>

    </form>


</div>
<?php
include('layout_member/footer.php');
?>