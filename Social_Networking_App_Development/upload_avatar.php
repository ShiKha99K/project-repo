<?php
session_start();
include("back/connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['id']; // Assuming you store the user ID in the session
    
        $sql = "UPDATE users SET avatar_path='$fileName' WHERE id=$userId";
        $result = mysqli_query($connection, $sql);

        if ($_FILES['avatar']['error']!= 4) {
            $imagename = $_FILES['avatar']['name'];
            $imagetmpname = $_FILES['avatar']['tmp_name'];
            move_uploaded_file($imagetmpname, $folder);
            $avatarPath = "uploads/".$imagename;
            echo '<img src="'.$avatarPath.'" alt="'.$imagename.'" style="width: 100%; height: auto; border-radius: 5px;">>';
        } else {
            echo '<p>No file uploaded</p>';
        }

}
    
?>