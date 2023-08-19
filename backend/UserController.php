<?php 


$message = '';

$validatedData = true;
if($_SERVER["REQUEST_METHOD"] == "POST" ) {

    if($_SESSION['token'] != $_REQUEST["csrf"]) {

        echo $_REQUEST['csrf'];
        echo '<br>';
        echo $_SESSION['token'];
         $validatedData = false;
         $message = "Invalid Token 405";
         return;
    }
    if(empty($_REQUEST['first_name'] )) {
        $validatedData = false;
    }

    if(empty($_REQUEST['second_name'] )) {
        $validatedData = false;
    }

    if(empty($_FILES['image'])) {
        $validatedData = false;
    }

   if($validatedData) {
     $dir = "uploads/";

     if ( !is_dir( $dir ) ) {
            mkdir( $dir );       
        }
     
    $file_name =  time() . "_" . basename($_FILES["image"]["name"]);
    $uploadedFile = $dir . $file_name;
    
    move_uploaded_file($_FILES["image"]["tmp_name"],$uploadedFile);

    $query = "insert into users (first_name, last_name, image_path) values ('".$_REQUEST['first_name']."' ,'".$_REQUEST['second_name']."', '".$uploadedFile."' )";
    
    if($conn->query($query) == true) {
        $message = "success";
        $validatedData = false;
    } else {
        $message = "failed";
    }
   } else {
      $message = "failed";
   }

}

?>