<?php
include('layout/header.php');
include('layout/left.php');
include('layout/adminsession.php');
?>

<?php
if (isset($_GET['delete_category'])) {
    $id = $_GET['category_id'];
    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("connection error");
    }
    $sql = "DELETE FROM category WHERE  cid = '$id' ";
    $r = $conn->query($sql);
    if ($r) {
        echo '<script type="text/javascript">';

        echo "Swal.fire({
                title: 'DELETE SUCCESSFULL!',
                icon: 'success',
              })";
        echo '</script>';
        // header("location:category.php");
    } else {
        echo ("not successful");
    }
}
?>
<div id="right">
    <link rel="stylesheet" href="../css/tableDecorate.css">


    <form action="addcategory.php">
        <input type="submit" name="addcategory" id="" value="Add Category" class="centermember">
    </form>
    <!-- <form action="search.php" method="post">
          <input type="search" name="text_search" id=""class="centermember_botton" placeholder="Enter a name" value="">
          
             <input type="submit" name="search" id="" value="search"class="centermember_botton">
          </form> -->


    <div class="table_class">
        <link rel="stylesheet" href="../css/tableDecorate.css">

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
            while ($row = $result->fetch_assoc()) {
                $i++;
                $cid = $row["cid"]; // Add this line to fetch the id
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