<?php
include('layout_member/header.php');
include('layout_member/left.php');
include('layout_member/member_session.php');
?> 
<div id="right">









<?php
if(isset($_POST['enroll_form'])){
                        $mid=$_POST['mid'];
                        $cid=$_POST['cid'];
                            $conn = new mysqli("localhost","root","","gsms");
                            if($conn->connect_error){
                                die("connection error");
                            }
                            $check_sql="select * from enrollment where mid='$mid'";
                            $check_r=$conn->query($check_sql);
                        if($check_r -> num_rows > 0)
                        {
                            $row=$check_r->fetch_assoc();
                            $eid=$row['eid'];
                            $sql="UPDATE enrollment SET mid = '$mid', cid = '$cid', verified='no' WHERE eid ='$eid'";
                            $r=$conn->query($sql);  
                            if($r){
                                echo '<script type="text/javascript">';
                                echo 'swal.fire({
                                    text: "Waiting for enrollment verification by an administrator.",
                               }).then(function() {
                                   window.location = "index.php";
                               });';
                                echo '</script>';
                            }
                            else{
                                echo '<script type="text/javascript">';
                                echo 'swal.fire({     
                                    text: "not successful",        
                                }).then(function() {
                                    window.location = "index.php";
                                });';
                                echo '</script>';
                            } 
                            
                        }
                        else
                        {
                            $sql="INSERT INTO enrollment (mid, cid) VALUES ( '$mid', '$cid')";
                            $r=$conn->query($sql);  
                            if($r){
                                echo '<script type="text/javascript">';
                                // echo 'alert("Wating for Enroll verification by Admin");';
                                // echo 'window.location.href = "index.php";';
                                echo 'swal.fire({
                                    text: "Waiting for enrollment verification by an administrator.",
                                }).then(function() {
                                    window.location = "index.php";
                                });';
                                echo '</script>';
                            }
                            else{
                                echo '<script type="text/javascript">';
                                // echo 'alert("not successful");';
                                echo 'swal.fire({
                                    text: "not successful",
                                }).then(function() {
                                    window.location = "index.php";
                                });';
                                echo '</script>';
                            }
                        }
}



if(isset($_POST['enroll'])){
    $cid=$_POST['category_id'];
    $price=$_POST['price'];
    $pname=$_POST['pname'];
    $duration=$_POST['duration'];
}
?>
        
        <form action="enroll.php" method="post" class="enrolluser_form" >
        <div class="enrol_form_container">
            <div> <b>ENROLLMENT FORM</b></div>
            <table>
                <tr>
                    <td><label for=""> Name:</label></td>
                    <td> <input type="text" class="transparent" id="" value="<?php echo $n ?>"readonly></td>
                </tr>
                <tr>
                    <td><label for="">Email:</label></td>
                    <td><input type="text" class="transparent" id="" value="<?php echo $e ?>"readonly></td>
                </tr>
                <tr>
                <td><label for=""> Phone no: </label></td>
                <td><input type="text"class="transparent"  id="" value="<?php echo $p ?>"readonly></td>
                </tr>
                <tr>
                    <td><label for="">Package:</label></td>
                    <td><input type="text"class="transparent" name="pname" id="" value="<?php echo $pname?>" readonly ></td>
                </tr>
                <tr>
                    <td><label for="">Month:</label></td>
                    <td><input type="text"class="transparent" name="pname" id="" value="<?php echo $duration ?>" readonly ></td>
                </tr>
                <tr>
                    <td><label for="">  Price</label></td>
                    <td><input type="text"class="transparent" name="pname" id="" value="<?php echo $price ?>" readonly></td>
                </tr>
                <tr>
                    <td colspan="2" >
                    <input type="hidden" name="mid"  id="" value="<?php echo $id ?>">
           <input type="hidden" name="cid" id="" value="<?php echo $cid ?>">
            <input type="submit" name="enroll_form" id="enroll_botton" value="Conform Enroll">
                    </td>
                </tr>
            </table>
          
       </div>
    </form>
</div>


<?php
include('layout_member/footer.php');
?>
