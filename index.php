<?php
include('layout_member/header.php');
include('layout_member/left.php');
include('layout_member/member_session.php');

?>

<link rel="stylesheet" href="css/index.css">


<div id="right">
    <?php
    $conn = new mysqli("localhost", "root", "", "gsms");
    if ($conn->connect_error) {
        die("Database connection error");
    }
    $sql = "SELECT * FROM member where mid ='$id'";
    $r = $conn->query($sql);
    if ($r) {
        $row = $r->fetch_assoc();
        $image_name = $row['image'];
        if ($image_name == "") {


            echo '<script>';
            echo 'Swal.fire({
                icon: "info",
                text: "To access the system, you need to upload a profile picture."
            }).then(function() {
                window.location = "uploadProfile_index.php";
            });';
            echo '</script>';


        }
    }
    ?>







    <div class="right_indexx">
        <?php
        $conn = new mysqli("localhost", "root", "", "gsms");
        if ($conn->connect_error) {
            die("Database connection error");
        }
        $sql = "select * from category 
        ORDER BY duration ASC
        ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {


            $i = 0;

            while ($row = $result->fetch_assoc()) {
                $i++;
                $cid = $row["cid"]; // Add this line to fetch the id
                $pname = $row["package_name"];
                $cname = $row["cname"];
                $duration = $row["duration"];
                $price = $row["package_price"];
                $image = $row["image"];

                echo "
            <div class='index_content'>
            <div class='card'>
             <div>
             <img src='img/$image' alt=''>
             </div>
              <div class='center'>

              <h1>$cname</h1>
             
                <h2>$pname Packages</h2>

                <p class='card_text center'> 
               Duration: $duration Month  <br>
                Price:$price <br>
             <form action='enroll.php ' method='post'>

            
              <input type='hidden' name='duration' id=''value='$duration' > 
              <input type='hidden' name='pname' id=''value='$pname' > 
              <input type='hidden' name='price' id=''value='$price' > 
              <input type='hidden' name='category_id' id=''value='$cid' > 

              <input type='submit' name='enroll' id='enroll' value='Enroll'>
          </form>
                </p> </div>
              
            </div>
            </div>
            
            ";
            }
        } else {
            echo "<p style='font-size:30px;'>No Subscription Category To Enroll. Consult to Admin</p>";
        }

        ?>
    </div>











</div>
<?php
include('layout_member/footer.php');
?>