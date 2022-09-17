<?php
session_start();

if(isset($_SESSION['admin'])){
  /* include db connection file */
  include("..\php\dbconn.php");
	// store session in var
	$admin = $_SESSION['admin'];

$target_dir = "../assets/img/avatars/";
$target_file = $target_dir . basename($_FILES["img_upload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if image file is a actual image or fake image
if(isset($_POST["img_save"])) {
  $check = getimagesize($_FILES["img_upload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
    unlink($target_file);
    $uploadOk = 1;
}

// Check file size
if ($_FILES["img_upload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["img_upload"]["tmp_name"], $target_file)) {
    $img_name = htmlspecialchars( basename( $_FILES["img_upload"]["name"]));
    echo "The file ". htmlspecialchars( basename( $_FILES["img_upload"]["name"])). " has been uploaded.";
    
        $sql = "UPDATE admins SET admin_Img = '$img_name'
        WHERE admin_ID = '$admin'";

        $sql2 = "SELECT *
        FROM admins WHERE admin_ID = '$admin'";

        $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error($dbconn));
        $query2 = mysqli_query($dbconn, $sql2) or die("Error: " . mysqli_error($dbconn));
        $r = mysqli_fetch_assoc($query2);
        $_SESSION['admindp'] = $r['admin_Img'];
        echo $_SESSION['admindp'];
        header("location: ..\pages\pages-account-settings-account.php");
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}/* execute SQL UPDATE command 
    $row = mysqli_num_rows($query);
    
	if($row != 0){
        $sql = "SELECT *
        FROM admins WHERE admin_ID = '$username'";

        $sql2 = "UPDATE admins SET admin_Img = '$img_name'
		WHERE admin_ID = '$username'";
        
        $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error($dbconn));
        $query2 = mysqli_query($dbconn, $sql2) or die("Error: " . mysqli_error($dbconn));
        $r = mysqli_fetch_assoc($query);
        $_SESSION['admindp'] = $r['admin_Img'];
        echo $_SESSION['admindp'];*/

        
        /*;
	}*/
    
}
else{
    echo"error";
}
 
?>