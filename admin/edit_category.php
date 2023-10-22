<?php
include('layout/header.php');
include('layout/left.php');
include('layout/adminsession.php');
?>

<div id="right">


<?php


// Getting values from the form for editing
if (isset($_POST['update'])) {
    $pname = $_POST["pname"];
    $cname = $_POST["cname"];
    $duration = $_POST["duration"];
    $price = $_POST["price"];
    $cid = $_POST["category_id"];

    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("database connection error");
    }

 


        // Check if a file is uploaded
        if ($_FILES["image"]["name"]) {
            $file_name = $_FILES["image"]["name"];
            $file_size = $_FILES["image"]["size"];
            $file_tmp = $_FILES["image"]["tmp_name"];
           
          
            
                if ($file_size < 5242880) { // Max file size: 5MB (you can adjust this value)
                    $destination = "../img/" . $file_name;
                    if (move_uploaded_file($file_tmp, $destination)) {  

                        $sql = "UPDATE category SET package_name = '$pname', cname = '$cname', duration = '$duration',
                        package_price = '$price',image = '$file_name'  WHERE cid = $cid;";                        
                        $r = $conn->query($sql);
                        if ($r) {
                            echo '<script>';
                            echo "Swal.fire({
                                icon: 'success',
                                title: 'Update Successfully',
                            }).then(function() {
                                window.location = 'category.php';
                            });";
                            echo '</script>';
                            // header("location: category.php");
                           
                        } else {
                            echo '<script type="text/javascript">';
                            echo 'swal.fire({
                                icon: "error",
                                title: "ERROR!",
                                text: "Image insert unsuccessfull",
                            }).then(function() {
                                window.location = "category.php";
                            });';
                            echo '</script>';
                            // echo '<script type="text/javascript">   alert("Image insert unsuccessful");
                            //  window.location.href = "category.php;  </script>';
                        }
                    } else {  
                        echo '<script type="text/javascript">';
                            echo 'swal.fire({
                                icon: "error",
                                title: "ERROR!",
                                text: "Error moving uploaded file.",
                            }).then(function() {
                                window.location = "category.php";
                            });';
                            echo '</script>';
                        //   echo '<script type="text/javascript">   alert("Error moving uploaded file.");
                        //    window.location.href = "category.php;  </script>';
                    }
                } else {
                    echo '<script type="text/javascript">';
                            echo 'swal.fire({
                                icon: "error",
                                title: "ERROR!",
                                text: "File size exceeds the maximum limit.",
                            }).then(function() {
                                window.location = "category.php";
                            });';
                            echo '</script>';
                    // echo '<script type="text/javascript">   alert("File size exceeds the maximum limit."); 
                    //  window.location.href = "category.php; </script>';
                }
            
        } else {
            // if Image is Not upload
            $sql = "UPDATE category SET package_name = '$pname', cname = '$cname', duration = '$duration', package_price = '$price' WHERE cid = $cid;";                        
            $r = $conn->query($sql);
            if ($r) {
                echo '<script>';
                echo "Swal.fire({
                    icon: 'success',
                    title: 'Update Successfully',
                }).then(function() {
                    window.location = 'category.php';
                });";
                echo '</script>';
            }
            
            else {
                echo '<script type="text/javascript">';
                echo 'swal.fire({
                    icon: "error",
                    title: "ERROR!",
                    text: "Update Failed",
                }).then(function() {
                    window.location = "category.php";
                });';
                echo '</script>';
               
            }
        }
}

// Get values from book category.php after clicking the edit button
if (isset($_GET['edit_category'])) {
    $cid = $_GET['category_id'];
    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("Connection error");
    }
    $sql = "SELECT * FROM category WHERE cid = '$cid'";
    $r = $conn->query($sql);
    if ($r->num_rows > 0) {
        $row = $r->fetch_assoc();
        $pname = $row["package_name"];
        $cname = $row["cname"];
        $duration = $row["duration"];
        $price = $row["package_price"];
        $image = $row["image"];
    }
}
?>
    <div class="right_container_bg">
<form action="edit_category.php" method="post" class="edit_category_form" enctype="multipart/form-data">
    <div class="form_container">
        <div><b>EDIT CATEGORY</b></div>
        <div>
            <label for="pname">Package Name</label><br>
            <input type="text" name="pname" maxlength="10" class="transparent" id="name" value="<?php echo $pname; ?>" required><br>
        </div>
        <div>
            <label for="cname">Name</label><br>
            <input type="text" name="cname" maxlength="10" class="transparent" id="cname" value="<?php echo $cname; ?>" required><br>
        </div>
        <div>
            <label for="duration">Duration</label><br>
            <input type="number" name="duration" class="transparent" id="duration" value="<?php echo $duration; ?>" required><br>
        </div>
        <div>
            <label for="price">Price</label><br>
            <input type="number" name="price" class="transparent" id="price" value="<?php echo $price; ?>" required><br>
        </div>
        <div>
            <label for="tmage">Image</label><br>
            <input type="file" name="image" class="transparent" id="image" accept=".jpg, .jpeg, .png"><br>
        </div>
        <div>
            <input type="hidden" name="category_id" value="<?php echo $cid; ?>">
            <input type="submit" name="update" value="Update">
        </div>
    </div>
</form>
</div>  
</div>
<?php
include('layout/footer.php');
?>
