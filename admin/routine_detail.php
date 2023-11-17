<?php
include('layout/header.php');
include('layout/left.php');
include('layout/adminsession.php');


?>
<div id="right">

    <div class="li_class">
        <h1 style="text-align: center; color: #FFA559;">ROUTINE</h1>
        <div class="li2_class_a">
            <?php

            $conn = new mysqli("localhost", "root", "", "gsms");
            if ($conn->connect_error) {
                die("Database connection error");
            }



            if (isset($_GET['routine_detail'])) {
                $id = $_GET["routine_id"];

                $sql = "select * from routine where rid= '$id'";
                $result = $conn->query($sql);
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                    $i++;

                    $chest = $row["chest"];
                    $back = $row["back"];
                    $soulder = $row["soulder"];
                    $biseps = $row["biseps"];
                    $triceps = $row["triceps"];
                    $leg = $row["leg"];
                    $abs = $row["abs"];

                    echo "
           <div>
           <strong>Chest</strong> <br>
           
            $chest
           
        </div>
        <div>

        <strong>Back</strong> <br>
        
            $back
        
    </div>

  <div>

      <strong>Soulder</strong> <br>
      
          $soulder
       
   </div>
  
   <div>

       <strong>Biseps</strong> <br>
       
           $biseps
       
   </div>
   <div>

       <strong>Triceps</strong> <br>
       
           $triceps
       
   </div>
   <div>

       <strong>Leg</strong> <br>
       
           $leg
       
   </div> 
  
   <div>

       <strong>Abs</strong> <br>
       
           $abs
       
   </div>

   <div>
   
   <form action='edit_routine_form.php' method='get'>
   <input type='hidden' value='$id' name='routine_id' />
       <input type='submit' name='routine_update' value='update' class='detail_botton'>
       </form>
       </div>
   ";
                }
            }
            ?>


        </div>
    </div>
</div>


<?php
include('layout/footer.php');
?>