<?php
include 'layout/header.php';
include 'layout/left.php';
include 'layout/adminsession.php';
?>

<div id="right">
    <link rel="stylesheet" href="../css/tableDecorate.css">

    <?php
    if (isset($_GET['noUpdateNeeded'])) {
        $rid = $_GET['routine_id'];
        $conn = new mysqli("localhost", "root", "", "gsms");
        if ($conn->connect_error) {
            die("Connection error");
        }
        $sql = "UPDATE routine SET verify='yes' WHERE rid = $rid";
        $r = $conn->query($sql);
        if ($r) {
            header("location:routinelist.php");
        } else {
            echo '<script>';
            echo 'alert("Update error");';
            echo '</script>';
        }
    }
    ?>


    <div class="table_class">
        <!-- routine search -->
        <form action="routine_detail.php" method="post">
        <input type="search" name="m_name" placeholder="Enter a  full name to search routine" style="width: 250px;" required>
        <input type="submit" name="search_routine" id="" value="search">
        </form>
        <table class="membership">
            <tr>
                <td colspan="7">
                    <h1 class="center">ROUTINE</h1>
                </td>
            </tr>
            <tr>
                <th width="5%">SN</th>
                <th width="25%">Name</th>
                <th width="20%">Enroll Package</th>
                <th width="20%">Routine Update</th>
                <th width="20%">Routine Details</th>

            </tr>

            <?php
            $conn = new mysqli("localhost", "root", "", "gsms");
            if ($conn->connect_error) {
                die("Database connection error");
            }

            $sql = "SELECT enrollment.eid, enrollment.mid, enrollment.cid, category.cid, category.cname, member.mid, member.name, routine.mid, routine.rid, routine.verify
            FROM member
            INNER JOIN enrollment ON enrollment.mid = member.mid
            INNER JOIN category ON enrollment.cid = category.cid
            INNER JOIN routine ON routine.mid = member.mid
            WHERE routine.verify = 'no' 

            ";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                    $i++;
                    $rid = $row["rid"];
                    $mid = $row["mid"];
                    $name = $row["name"];
                    $cname = $row["cname"];
                    $verify = $row["verify"];

                    echo "<tr>
                <td>$i</td>
                <td>$name</td>
                <td>$cname</td>
                <td>$verify</td>
                <td class='h-center'>
                <form action='routine_detail.php' method='get'>
                <input type='hidden' value='$rid' name='routine_id' />
                <input type='submit' name='routine_detail' value='Update Routine' class='routine_btn'>
                </form>
                <form action='routinelist.php' method='get'>
                <input type='hidden' value='$rid' name='routine_id' />
                <input type='submit' name='noUpdateNeeded' value='Ignore' class='routine_btn' style='float:right;'>
                </form>
                </td>
                    </tr>";
                    $i++;
                }
            } else {
                echo "<tr><td colspan='5'>No rows found</td></tr>";
            }
            ?>
        </table>
    </div>
</div>

<?php
include 'layout/footer.php';
?>