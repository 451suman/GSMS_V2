<?php
$folderPath = './img/'; // Set the path to the folder
$fileName = 'presentsion.jpg'; // Replace with the name of the file you want to delete

$filePath = $folderPath . $fileName;

if (file_exists($filePath)) {
    if (unlink($filePath)) {
        echo "File '$fileName' has been deleted.";
    } else {
        echo "Failed to delete the file.";
    }
} else {
    echo "File does not exist.";
}
?>