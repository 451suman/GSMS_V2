<?php
include('layout/header.php');
include('layout/left.php');
include('layout/adminsession.php');
?>
<?php
// if you click delete in category.php this code will run 
if (isset($_GET['delete_category'])) {
    $id = $_GET['category_id'];
    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("Connection error");
    }

    // Select id and extract image info/ name from the database
    $imgSQL = "SELECT * FROM category WHERE cid = '$id'";
    $imgResult = $conn->query($imgSQL);

    if ($imgResult->num_rows > 0) {
        $row = $imgResult->fetch_assoc(); //extract all data from row in database
        $img_name = $row['image']; //extract onli inage name from database

        // Construct file path
        $folderPath = '../img/'; // Set the path to the folder
        $filePath = $folderPath . $img_name;    // join $folderpath + $image name

        if (file_exists($filePath)) {
            // Check if the file exists before attempting to delete
            if (unlink($filePath)) {// Delete the file from following path
                // If file deletion is successful,then  delete data from the databaseusing sql
                $sql = "DELETE FROM category WHERE cid = '$id'"; 
                $result = $conn->query($sql);

                if ($result) {
                    echo '<script>';
                    echo "Swal.fire({
                        title: 'DELETE SUCCESSFUL!',
                        icon: 'success',
                    })";
                    echo '</script>';
                } else {
                    echo "alert('deletion failed.');";
                }
            } else {
                echo "alert('deletion failed.');";
            }
        } else {
            echo "alert('image not found');";
        }
    }
}
?>

<div id="right">
    <link rel="stylesheet" href="../css/tableDecorate.css">


    <a href="addcategory.php" id="add_category_btn">Add Category</a>

    <div class="table_class">

        <table class="membership">
            <tr>
                <td colspan="7">
                    <h1 class="center">CATEGORY LIST</h1>
                </td>
            </tr>
            <tr>
                <th width=5%;>SN</th>

                <th width=25%;>Package Name</th>
                <th width=25%;>Category Name</th>
                <th width=15%;>Month</th>
                <th width=15%;>Price</th>
                <th width=5%;>Image</th>
                <th width=10%;>action</th>

            </tr>
            <?php
            $conn = new mysqli("localhost", "root", "", "gsms");
            if ($conn->connect_error) {
                die("Database connection error");
            }
            $sql = "select * from category ORDER BY duration ASC";
            $result = $conn->query($sql); 
            $i = 0;
            while ($row = $result->fetch_assoc()) { //extract all row data from database 
                $i++;
                $cid = $row["cid"]; // assigining cid column data into $cid
                $cname = $row["cname"]; 
                $pname = $row["package_name"];
                $duration = $row["duration"];
                $price = $row["package_price"];
                $image = $row["image"];


                echo "<tr>
                <td>$i</td>
                <td>$pname</td>
                <td>$cname</td>
                <td>$duration</td>
                <td> $price </td>
                <td><img src='../img/$image'></td>
                
                <td > 
                        <form action='edit_category.php' method='get'>  
                        <input type='hidden' value='$cid' name='category_id' />
                            <input type='submit' name='edit_category' value='Edit' class='edit_delete_green'> 
                        </form>
                        
                        <form action='category.php' method='get'>
                        <input type='hidden' value='$cid' name='category_id' />
                        <input type='submit' name='delete_category' value='Delete' class='edit_delete_red'>
                        </form>
                </td>
            </tr>";
            }

            ?>
        </table>
    </div>
</div>




<script src="../js/js.js"></script>

<?php
include('layout/footer.php');
?>