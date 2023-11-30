<!-- this page is rum after u search routine of member wuing their name in search box in routine list.php -->
<?php
include('layout/header.php');
include('layout/left.php');
include('layout/adminsession.php');


?>
<div id="right">

   
            <?php

            $conn = new mysqli("localhost", "root", "", "gsms");
            if ($conn->connect_error) {
                die("Database connection error");
            }
            // this code run is when updating from routinelist.php inside table
            if (isset($_GET['routine_detail'])) {

                echo' <div class="li_class">
                <h1 style="text-align: center; color: #FFA559;">ROUTINE</h1>
                <div class="li2_class_a">';

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



            // thid code is runn when search routine through name in routinelist.php 
            if (isset($_POST['search_routine'])) {
                $m_name = $_POST["m_name"];

                 $escaped_name = mysqli_real_escape_string($conn, $m_name);     
                 // Escape the user input to prevent SQL injection
                //  helps prevent SQL injection by escaping special characters in a string. It escapes characters like single quotes ('), 
                // double quotes ("), backslashes (\), and NUL bytes, among others, by adding a backslash before them.
                //  This ensures that these characters are treated as literal characters and not as part of the SQL syntax.
                
                $search_sql = "SELECT * FROM member WHERE name='$escaped_name'";
                $search_result = $conn->query($search_sql);

                if ($search_result->num_rows > 0) {

                    echo' <div class="li_class">
                    <h1 style="text-align: center; color: #FFA559;">ROUTINE</h1>
                    <div class="li2_class_a">';

                    $row = $search_result->fetch_assoc();
                        $mid = $row['mid'];

                        $sql = "SELECT * FROM routine WHERE mid= '$mid'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();

                            $chest = $row["chest"];
                            $back = $row["back"];
                            $soulder = $row["soulder"];
                            $biseps = $row["biseps"];
                            $triceps = $row["triceps"];
                            $leg = $row["leg"];
                            $abs = $row["abs"];

                            echo "
                                <div>
                                    <strong> Name: $m_name </strong>
                                </div>
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
                               
                            ";
                        } else {
                            echo '<script>';
                            echo 'swal.fire({
                                        icon: "error",
                                        title: "routine not found!",
                                    }).then(function() {
                                        window.location = "routinelist.php";
                                    });';
                            echo '</script>';
                        }
                    
                } else {
                    echo '<script>';
                    echo 'swal.fire({
                                icon: "error",
                                title: "Name not found!",
                            }).then(function() {
                                window.location = "routinelist.php";
                            });';
                    echo '</script>';
                }
            }

            ?>


        </div>
    </div>
</div>


<?php
include('layout/footer.php');
?>