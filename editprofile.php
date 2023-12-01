<?php
include('layout_member/header.php');
include('layout_member/left.php');
include('layout_member/member_session.php');
?>
<div id="right">
    <!-- talla ko form ko backend code -->
    <?php

    if (isset($_POST['update'])) {
        $n = $_POST['name'];
        $ph = $_POST['phone'];
        $email = $_POST['email'];
        $mid = $_POST['mid'];
        $error = [];
        // Validate name
        if (!preg_match("/^[a-zA-Z ]*$/", $n)) {
            $error['name'] = "Name should only contain letters and spaces.";
        }
        // Validate email
        if (strlen($email) > 30) {
            $error['email'] = "The email address should not exceed more than 30 characters in length.";

        } else {
            // check dublicate email in database.
            $conn = new mysqli("localhost", "root", "", "gsms");
            if ($conn->connect_error) {
                die("database connection error");
            }
            $sql_em = "SELECT * from member where mid = $id";
            $r_em = $conn->query($sql_em);
            if ($r_em) {
                $row = $r_em->fetch_assoc();
                $check_em = $row['email'];
            }

            if ($email != $check_em) {
                $check_duplicate = $conn->query("SELECT email FROM member WHERE email = '$email'");
                if ($check_duplicate->num_rows > 0) {
                    $error['email'] = "Email already register!";
                }
            }
        }
        // Validate phone number
        if (!preg_match('/^[0-9]{10}$/', $ph)) {
            $error['phone'] = "Please enter a valid 10-digit phone number";
        }

        if (!empty($error)) {
            echo '<script >';
            echo 'var errorMessage = "";';
            foreach ($error as $errorMsg) { //collect all erros and concat every time loop runs and store it in errorMessage
                echo "errorMessage += '$errorMsg. ';";
            }
            echo "Swal.fire({
            title: 'Update Error!',
            text: errorMessage,
            icon: 'error',
            confirmButtonText: 'OK'
          }).then(function() {
            window.location = 'profile.php';
        });";
            echo '</script>';
        } elseif ($_FILES["image"]["name"]) {
            $file_name = $_FILES["image"]["name"]; //store file name 
            $file_size = $_FILES["image"]["size"]; //store file size
            $file_tmp = $_FILES["image"]["tmp_name"]; //store file for temporay in to file_tep
            $fileType = pathinfo($file_name, PATHINFO_EXTENSION); //store file extension 
            // Generate a unique filename using a timestamp by boncate with a (image + unixtimestamp+,+ extension)
            $newFileName = "image_" . time() . '.' . $fileType; 


            $imgSQL = "SELECT * FROM member WHERE mid = '$mid'";
            $imgResult = $conn->query($imgSQL);
            if ($imgResult->num_rows > 0) {
                $row = $imgResult->fetch_assoc();
                $img_name = $row['image'];

                $folderPath = 'img/'; // Set the path to the folder
                $filePath = $folderPath . $img_name;

                if ($file_size < 5242880) {

                    $destination = "img/" . $newFileName;
                    if (file_exists($filePath) && unlink($filePath) && move_uploaded_file($file_tmp, $destination)) {


                        $conn = new mysqli("localhost", "root", "", "gsms");
                        if ($conn->connect_error) {
                            die("database connection error");
                        }
                        $sql = "UPDATE member SET name='$n', phone='$ph', email='$email', image='$newFileName' WHERE mid='$mid'";
                        $result = $conn->query($sql);
                        if ($result) {
                            echo '<script >';
                            echo "Swal.fire({
                                                icon: 'success',
                                                title: 'Update successful',
                                        }).then(function() {
                                            window.location = 'profile.php';
                                        });";
                            echo '</script>';

                        } else {
                            echo '<script>';
                            echo "Swal.fire({
                                            icon: 'error',
                                            title: 'Error!',
                                            text: 'Update Failed.'
                                        }).then(function() {
                                            window.location = 'profile.php';
                                        });";
                            echo '</script>';
                        }
                    } else {
                        echo '<script>';
                        echo "Swal.fire({
                                            icon: 'error',
                                            title: 'Error!',
                                            text: 'Update Failed.'
                                        }).then(function() {
                                            window.location = 'profile.php';
                                        });";
                        echo '</script>';
                    }

                } else {
                    echo '<script>';
                    echo "Swal.fire({
                                        icon: 'error',
                                        title: 'Error!',
                                        text: 'File size exceeds the maximum limit.'
                                    }).then(function() {
                                        window.location = 'profile.php';
                                    });";
                    echo '</script>';
                }
            }
        } else {
            $conn = new mysqli("localhost", "root", "", "gsms");
            if ($conn->connect_error) {
                die("database connection error");
            }
            $sql = "UPDATE member SET name='$n', phone='$ph', email='$email' WHERE mid='$mid'";
            $result = $conn->query($sql);
            if ($result) {
                echo '<script >';
                echo "Swal.fire({
                    title: 'Update successful',
                    icon: 'success',
                }).then(function() {
                    window.location = 'profile.php';
                });";
                echo '</script>';
            } else {
                echo '<script >';
                echo "Swal.fire({
                    title: 'Update Failed',
                    icon: 'error',
                }).then(function() {
                    window.location = 'profile.php';
                });";
                echo '</script>';
            }
        }
    }
    ?>

    <!-- retrieve data of member of from bata base -->
    <?php
    if (isset($_GET['editdetail'])) {
        $mid = $_GET['mid'];
        $conn = new mysqli("localhost", "root", "", "gsms");
        if ($conn->connect_error) {
            die("Database connection error");
        }

        $sql = "SELECT * FROM member where mid=$mid";
        $r = $conn->query($sql);
        $row = $r->fetch_assoc();
        $name = $row["name"];
        $phone = $row["phone"];
        $email = $row["email"];
    }
    ?>
    <div class="profile_detail">
        <form action="editprofile.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <table class="profile_form_container">
                <th colspan="2">
                    <h1>Edit Profile</h1>
                </th>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" maxlength="20" value="<?php echo $name; ?>" required></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phone" minlength="10" maxlength="10" value="<?php echo $phone; ?>"
                            required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" value="<?php echo $email; ?>" required></td>
                </tr>
                <tr>
                    <td>Upload Profile</td>
                    <td>
                        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png"><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p style="font-size: 15px;">Please upload Image in this format <br> (jpg, jpeg, png).</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="mid" value="<?php echo $mid; ?>">
                        <input type="submit" value="Update" name="update">
                    </td>
                </tr>
            </table>
        </form>
    </div>

</div>
<?php
include('layout_member/footer.php');
?>