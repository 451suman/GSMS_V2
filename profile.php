<?php
include('layout_member/header.php');
include('layout_member/left.php');
include('layout_member/member_session.php');
?>


<div id="right">
  <link rel="stylesheet" href="css/member_detail.css">


  <?php
  $conn = new mysqli("localhost", "root", "", "gsms");
  if ($conn->connect_error) {
    die("Connection error");
  }
  $check_sql = "SELECT * FROM member WHERE mid='$id' ";
  $r = $conn->query($check_sql);
  if ($r) {
    $row = $r->fetch_assoc();
    $status = $row['status'];

    if ($status == "offline") {
      echo '<script >';
      echo 'swal.fire({
             icon: "error",
             text: "You are current status is offline. To change that, talk to the admin or purchase a package to go online.",
           
        }).then(function() {
            window.location = "index.php";
        });';
      echo '</script>';
    }
  }
  ?>


  <?php
  $conn = new mysqli("localhost", "root", "", "gsms");
  if ($conn->connect_error) {
    die("connection error");
  }
  $sql = "SELECT * FROM member where mid='$id' ";
  $r = $conn->query($sql);
  $row = $r->fetch_assoc();
  $mid = $row['mid'];
  $name = $row["name"];
  $phone = $row["phone"];
  $email = $row["email"];
  $image = $row["image"];
  $date = $row["date"];
  $status = $row["status"];

  echo "
             <div class='container v-center'>
      <div class='profile-card space-between gap-5'>
        <div class='img-field'>
          <img class='profile-img' src='img/$image' alt=' '/>
        </div>
        <div class='info-field v-center'>
          <div>
            <h3 class='info info-title'>Personal Information</h3>
            <div class='data'>
              <h6 class='info'>Name:</h6>
              <p class='info'>$name</p>
            </div>
            <div class='data'>
              <h6 class='info'>Email:</h6>
              <p class='info'>$email</p>
            </div>
            <div class='data'>
              <h6 class='info'>Cell Phone:</h6>
              <p class='info'>$phone</p>
            </div>
           
            
            <div class='data'>
              <h6 class='info'>Status:</h6>
              <p class='info'>$status</p>
            </div>

            <div class='data'>
              <h6 class='info'> 
              <form action='editprofile.php' method='get'>
              <input type='hidden' name='mid' id='' value='$mid' >
              <input type='submit' name='editdetail' id='editdetail_profile' value='Edit Profile Details'>
                  </form>
                  </h6>
                  <h6 class='info'> 
                  <form action='member_change_password.php' method='get'>
                  <input type='hidden' name='mid' id='' value='$mid' >
                  <input type='submit' name='change_pass' id='editdetail_profile' value='Change Password'>
                      </form>
                      </h6>
           
            </div>
          </div>
        </div>
      </div>
    </div>

";
  ?>
</div>
<?php
include('layout_member/footer.php');
?>