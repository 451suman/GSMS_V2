<?php
include('layout/header.php');
include('layout/left.php');
include('layout/adminsession.php');

?>


<?php

if (isset($_GET['delete_admin'])) {
    // $aid  = session id
    // $id = id come from  delete button

    $id = $_GET['admin_id'];

    if ($aid == 1) {
        $conn = new mysqli("localhost", "root", "", "gsms");
        if ($conn->connect_error) {
            die("connection error");
        }

        if ($aid == $id) {
            echo '<script type="text/javascript">';
            echo "Swal.fire({
                    title: 'Error!',
                    text: 'Self Delete is Not Allowed.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                  }).then(function() {
                    window.location = 'adminlist.php';
                });";
            echo '</script>';
        } else {
            // if other admin try to delete super admin then this message is shown
            // if($id==1){
            //     echo '<script type="text/javascript">';
            //     echo "Swal.fire({
            //         title: 'Error!',
            //         text: 'You have no wright to delete Super admin.',
            //         icon: 'error',
            //         confirmButtonText: 'OK'
            //       }).then(function() {
            //         window.location = 'adminlist.php';
            //     });";
            // echo '</script>'; 
            // }

            $sql = "DELETE FROM admin WHERE aid='$id' AND aid > 1; ";
            $r = $conn->query($sql);
            if ($r) {
                echo '<script type="text/javascript">';
                echo "Swal.fire({
                            title: 'Delete Successful!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                          }).then(function() {
                            window.location = 'adminlist.php';
                        });";
                echo '</script>';

                //     header("location:adminlist.php");
            } else {
                echo '<script type="text/javascript">';

                echo 'alert("delete unsuccessful");';
                echo "window.location.href = 'adminlist.php '";

                echo '</script>';
            }
        }
    } else {
        echo '<script type="text/javascript">';
        echo "Swal.fire({
            title: 'Error!',
            text: 'You have no permission to delete others admin.',
            icon: 'error',
            confirmButtonText: 'OK'
          }).then(function() {
            window.location = 'adminlist.php';
        });";
        // echo 'alert("You have no permission to delete others admin.");';
        // echo"window.location.href = 'adminlist.php '";
        echo '</script>';
    }
}
?>

<div id="right">
    <link rel="stylesheet" href="../css/tableDecorate.css">

    <form action="add_admin.php">
        <input type="submit" name="add_admin" id="" value="Add Admin" class="centermember">
    </form>
    <!-- <form action="adminsearch.php" method="post">
          <input type="search" name="text_search" id=""class="centermember_botton" placeholder="Enter a name" value="">
          
             <input type="submit" name="a_search" id="" value="search"class="centermember_botton">
          </form>
           -->



    <table class="membership">
        <tr>
            <td colspan="6">
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
        $conn = new mysqli("localhost", "root", "", "gsms");
        if ($conn->connect_error) {
            die("Database connection error");
        }
        // $sql="select * from admin where aid > 1";
        $sql = "select * from admin ";
        $result = $conn->query($sql);
        // $i=1;   
        $i = 0;


        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $i++;
                $id = $row["aid"]; // Add this line to fetch the id
                $name = $row["name"];
                $date = $row["date"];
                $phone = $row["phone"];
                $email = $row["email"];
                // $password = $row["password"];
        
                echo "<tr>
            <td>$i</td>
            <td>$name</td>
            
            <td>$email</td>
            <td>$phone</td> 
            <td>$date</td>
       
            <td class='h-center'> 
            

            <form action='adminlist.php' method='get'>
            <input type='hidden' value='$id' name='admin_id' />
                <input type='submit' name='delete_admin' value='Delete' class='edit_delete_red'>
                </form>

            
            

            </td>
        
            
        </tr>";
            }

        } else {
            echo "<tr><td colspan='6'>No list found</td></tr>";
        }




        ?>
    </table>
</div>








<?php
include('layout/footer.php');
?>
<!-- 

                <form action='edit_admin_list.php' method='get'>  
                <input type='hidden' value='$id' name='admin_id' />
                    <input type='submit' name='edit_admin' value='Edit' class='edit_delete_green'> 
                </form>
                
                <form action='a_change_password.php' method='get'>  
                <input type='hidden' value='$id' name='admin_id' />
                    <input type='submit' name='change_apass' value='Change password' class='edit_delete_green'> 
                </form>

                 -->