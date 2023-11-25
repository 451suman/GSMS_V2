<?php
include('layout/header.php');
include('layout/left.php');
include('layout/adminsession.php');



?>

<div id="right">
    <link rel="stylesheet" href="../css/tableDecorate.css">


    <form action="search.php" method="post">
        <input type="search" name="text_search" id="" class="centermember_botton" placeholder="Enter a name" value="">
        <input type="submit" name="search" id="" value="search" class="centermember_botton">
    </form>

    <table class="membership">
        <tr>
            <td colspan="8">
                <h1 class="center">MEMBER LIST</h1>
            </td>
        </tr>
        <tr>
            <th width=5%>SN</th>
            <th width=20%>Name</th>
            <th width=10%>Phone</th>
            <th width=25%>Email</th>
            <th width=5%>Status</th>
            <th width=15%>Date of Join</th>
            <th width=5%>Profile</th>
            <th width=15%>Action</th>
        </tr>
        <?php
        if (isset($_POST['search'])) {
            $s = $_POST['text_search'];
            $conn = new mysqli("localhost", "root", "", "gsms");
            if ($conn->connect_error) {
                die("Database connection error");
            }
            $sql = "SELECT * FROM member
       WHERE name LIKE '$s%' ORDER BY name ASC ";
            $r = $conn->query($sql);
            $i = 0;

            if ($r->num_rows > 0) {


                while ($row = $r->fetch_assoc()) {
                    $i++;
                    $id = $row["mid"]; // Add this line to fetch the id
                    $name = $row["name"];
                    $date = $row["date"];
                    $phone = $row["phone"];
                    $email = $row["email"];
                    $image = $row["image"];
                    $status = $row["status"];

                    echo "<tr>
                <td>$i</td>
                <td>$name</td>
                <td>$phone</td>
                <td>$email</td>
                <td>$status</td>
                <td>$date</td>
                <td><img src='../img/$image'  id='img_id'></td>

       
                <td class='h-center'>
                <form action='edit_member_list.php' method='get'>
                <input type='hidden' value='$id' name='member_id' />
                <input type='submit' name='edit_member' value='Edit' class='edit_delete_green'>
            </form>
                    <form action='memberlist.php' method='get'>
                        <input type='hidden' value='$id' name='member_id' />
                        <input type='submit' name='delete_member' value='Delete' class='edit_delete_red'>
                    </form>
                   
                </td>
            </tr>";

                }
            } else {
                echo "<tr>
                <td colspan=8;>No result Found</td> 
                </tr?";
            }
        }



        ?>
    </table>


</div>
<script src="../js/js.js"></script>

<?php
include('layout/footer.php');
?>