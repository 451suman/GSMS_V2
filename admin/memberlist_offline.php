<!-- <link rel="stylesheet" href="../css/tableDecorate.css"> -->
<?php
include('layout/header.php');
include('layout/left.php');
include('layout/adminsession.php');


if (isset($_GET['delete_member'])) {
    $id = $_GET['member_id'];
    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("connection error");
    }
    $sql = "DELETE FROM member WHERE mid='$id'";
    $r = $conn->query($sql);
    if ($r) {
        // header("location:memberlist.php");
        echo '<script type="text/javascript">';

        echo 'Swal.fire(
          "DELETE SUCCESSFULL!",
          "Member Delete Successful",
          "success"
        )  ';
        echo '</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Delete unsuccessful");';
        echo '</script>';
    }
}
?>

<div id="right">
    <link rel="stylesheet" href="../css/tableDecorate.css">
    <form action="search.php" method="post">
        <input type="search" name="text_search" id="" class="centermember_botton" placeholder="Enter a name" value="">
        <input type="submit" name="search" id="" value="search" class="centermember_botton">
    </form>
    Click here for <button style="background-color: white;"><a href="memberlist.php"
            style="color: black; padding:7px;"><strong>Online Members</strong> </a></button>


    <div class="table_class">
        <table class="membership">
            <tr>
                <td colspan="8">
                    <h1 class="center">OFFLINE MEMBER LIST</h1>
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
            $conn = new mysqli("localhost", "root", "", "gsms");
            if ($conn->connect_error) {
                die("Database connection error");
            }
            $sql = "SELECT * FROM member WHERE status = 'offline' ORDER BY name ASC";

            $result = $conn->query($sql);
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $i++;
                $id = $row["mid"];
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
                        <form action='edit_member_list.php' method='get' target= blank >
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
            ?>
        </table>
    </div>
</div>




<script src="../js/js.js"></script>

<?php
include('layout/footer.php');
?>