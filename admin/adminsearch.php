<?php
include('layout/header.php');
include('layout/left.php');
include('layout/adminsession.php');


?>

<div id="right">
    <link rel="stylesheet" href="../css/tableDecorate.css">

    <form action="add_admin.php">
        <input type="submit" name="add_admin" id="" value="Add Admin" class="centermember">
    </form>
    <form action="adminsearch.php" method="post">
        <input type="search" name="text_search" id="" class="centermember_botton" placeholder="Enter a name" value="">

        <input type="submit" name="a_search" id="" value="search" class="centermember_botton">
    </form>

    <table class="membership">
        <tr>
            <td colspan="7">
                <h1 class="center">ADMIN LIST</h1>
            </td>
        </tr>
        <tr>
            <th width=5% ;>SN</th>
            <th width=25% ;>Name</th>
            <th width=20% ;>Email</th>
            <th width=20% ;>Phone</th>
            <th width=15% ;>Date of Join</th>

            <th width=15%;>Action</th>
        </tr>
        <?php
        if (isset($_POST['a_search'])) {
            $s = $_POST['text_search'];
            $conn = new mysqli("localhost", "root", "", "gsms");
            if ($conn->connect_error) {
                die("Database connection error");
            }
            $sql = "SELECT * FROM admin WHERE name LIKE '$s%'";
            $r = $conn->query($sql);
            $i = 0;

            while ($row = $r->fetch_assoc()) {
                $i++;
                $id = $row["aid"]; // Add this line to fetch the id
                $name = $row["name"];
                $phone = $row["phone"];
                $date = $row["date"];
                $email = $row["email"];
                $password = $row["password"];
                echo "<tr>
                <td>$i</td>
                <td>$name</td>
                <td>$date</td>
                <td>$phone</td> 
                <td>$email</td>
            
                <td> 
                <form action='edit_admin_list.php' method='get'>  
                <input type='hidden' value='$id' name='admin_id' />
                    <input type='submit' name='edit_admin' value='Edit' class='edit_delete_green'> 
                </form>

                <form action='adminlist.php' method='get'>
                <input type='hidden' value='$id' name='admin_id' />
                    <input type='submit' name='delete_admin' value='Delete' class='edit_delete_red'>
                    </form>

                    <form action='a_change_password.php' method='get'>  
                    <input type='hidden' value='$id' name='admin_id' />
                        <input type='submit' name='change_apass' value='Change password' class='edit_delete_green'> 
                    </form>
                </td>
                </tr>";

                    }
        } else {
            echo "No results found.";
        }



        ?>
    </table>


</div>
<?php
include('layout/footer.php');
?>