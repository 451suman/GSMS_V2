<!-- member details from sub track -->
<?php
include('layout/header.php');
include('layout/left.php');
include('layout/adminsession.php');
?>

<div id="right">

  <link rel="stylesheet" href="../css/member_detail.css" />

  <div class="container v-center">
    <div class="profile-card space-between gap-5">


      <?php
      if (isset($_GET['detail'])) {
        $mid = $_GET['member_id'];

        $conn = new mysqli("localhost", "root", "", "gsms");
        if ($conn->connect_error) {
          die("Database connection error");
        }
        $sql = "SELECT member.mid,member.name,member.status, member.date,member.phone, member.email,member.image,
            member_subscription_track.expiry_date
            from member
            JOIN member_subscription_track  ON mEMBER.mid = member_subscription_track.mid 
            where member.mid='$mid';

            ";
        // $sql = "select * from member where mid=$mid";
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
          $expiry_date = $row["expiry_date"];

          echo "
            <div class='img-field'>
          <img class='profile-img' src='../img/$image' alt=' '/>
          </div>
          <div class='info-field v-center'>
            <div>
              <h3 class='info info-title'>Member Information</h3>
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
                <h6 class='info'>Date Of Join:</h6>
                <p class='info'>$date</p>
              </div>
              <div class='data'>
                <h6 class='info'>Expiry Date:</h6>
                <p class='info'>$expiry_date</p>
              </div>

                <div class='data'>
                  <form action='edit_member_list.php' method='get'>
                    <input type='hidden' value='$id' name='member_id' />
                    <input type='submit' name='edit_member' value='Edit' id='q_editdetail_profile'>
                   </form>
                  <form action='memberlist.php' method='get'>
                    <input type='hidden' value='$id' name='member_id' />
                    <input type='submit' name='delete_member' value='Delete' id='q_editdetail_profile'>
                  </form> 
                
                </div> 
            </div>
          </div>
       
                    
                    ";

        }
      }

      ?>

    </div>
  </div>
</div>

<!-- right div close -->

<?php
include('layout/footer.php');
?>