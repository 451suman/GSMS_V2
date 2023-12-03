<?php
include('layout/header.php');
include('layout/left.php');
include('layout/adminsession.php');

?>

<div id="right">

    <?php

// this if code will run when u fill up form of add category and submitted the data
    if (isset($_POST["add_category"])) {
        $pname = $_POST["pname"];
        $cname = $_POST["cname"];
        $duration = $_POST["duration"];
        $price = $_POST["price"];

        $file_name = $_FILES["image"]["name"];       // store the name of the uploaded file
        $file_size = $_FILES["image"]["size"];    //  store the size of the uploaded file
        $file_tmp = $_FILES["image"]["tmp_name"];
        $fileType = pathinfo($file_name, PATHINFO_EXTENSION); // extract extension of file like (.jpg, .png, etc)
    
        $newFileName = "image_" . time() . '.' . $fileType; // generate new name fo file by joining image + unixtimestamp+ extension
        // Generate a unique filename using a timestamp
        // if same image with same name is upload multiple times then.
        // when 1 image of same name is deleted then. All same image of same name is deleted. which will generated error when deleted
        //  because without unlink image delete category  sql will not run
    
        if ($file_size < 5242880) { // Max file size: 5MB,5mb vand badi size == error
            $destination = "../img/" . $newFileName; //path to upload file with new name
    
            if (move_uploaded_file($file_tmp, $destination)) { //upload the image which is uploaded from talla ko HTML ko form
                $conn = new mysqli("localhost", "root", "", "gsms");  //database connection
                if ($conn->connect_error) {
                    die("database connection error"); //die if database connection is unsucessfull
                }

                $sql = "INSERT INTO category (package_name,cname, duration, package_price,  image) 
                VALUES ('$pname','$cname', '$duration', '$price',  '$newFileName')";

                $result = $conn->query($sql); //run sql into database
    
                if ($result) {
                    echo '<script>';
                    echo "Swal.fire({
                        icon: 'success',
                        title: 'Category added Successfully',
                    }).then(function() {
                        window.location = 'category.php';
                    });";
                    echo '</script>';
                } else {
                    echo '<script">';
                    echo 'swal.fire({
                                icon: "error",
                                title: "ERROR!",   
                                text: "data insert unsuccessful",
                            })';
                    echo '</script>';
                }
            } else {
                echo '<script">';
                echo 'swal.fire({
                                icon: "error",
                                title: "ERROR!",
                                text: "Error moving uploaded file",
                            })';
                echo '</script>';
            }
        } else {
            echo '<script>';
            echo 'swal.fire({
                                icon: "error",
                                title: "ERROR!",
                                text: "File size exceeds the maximum limit.",
                            })';
            echo '</script>';
        }

    }
    ?>

    <!-- enctype is uded for when it includes file uploads will be encoded as a multipart MIME message, 
    allowing binary files to be sent to the server. -->
    <form action="addcategory.php" method="post" class="addcategory_form" enctype="multipart/form-data"> 
        <div class="form_container">
            <div><b>ADD CATEGORY</b></div>
            <div>
                <label for="pname">Package Name</label><br>
                <input type="text" name="pname" maxlength="10" class="transparent" id="name" required><br>
            </div>

            <div>
                <label for="cname">Category Name</label><br>
                <input type="text" name="cname" maxlength="10" value="GYM" class="transparent" id="cname" readonly><br>
            </div>

            <div>
                <label for="duration">Duration(Months)</label><br>
                <input type="number" name="duration" min="0" class="transparent" id="duration" required><br>
            </div>

            <div>
                <label for="price">Price</label><br>
                <input type="number" name="price" min="0" class="transparent" id="price" required><br>
            </div>
            <div>
                <label for="image">Image</label><br>
                <input type="file" name="image" class="transparent" id="image" accept=".jpg, .jpeg, .png" required><br>
                <p style="font-size: 15px;">Please upload Image in this format <br> (jpg,jpeg,png).</p>
            </div>

            <div>
                <input type="submit" name="add_category" id="add_category" value="Add Category">
            </div>
        </div>
    </form>
</div>

<?php
include('layout/footer.php');
?>