


 <?php
if(isset($_FILES["image"]))
{
$file_name=$_FILES["image"]["name"];
    $file_size=$_FILES["image"]["size"];
    $file=$_FILES["image"]["tmp_name"];

    echo " name: $file_name <br>"; 
    echo "file size: $file_size <br>";
}
if( $file_size>=2097152){
echo"file is larger than 2 mb";
}

else{
    move_uploaded_file($file,"img/$file_name");
echo"<img src='img/$file_name'>";
}
?>


