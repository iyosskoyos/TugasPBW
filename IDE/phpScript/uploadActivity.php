<?php
   //$idact= $_SESSION['id_acctypes'];
if(isset($_FILES['image'])){
   $errors= array();
   $file_name = $_FILES['image']['name'];
   $file_size =$_FILES['image']['size'];
   $file_tmp =$_FILES['image']['tmp_name'];
   $file_type=$_FILES['image']['type'];
   $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

   $expensions= array('png','jpg', 'pdf', 'docx', 'zip');
   if(in_array($file_ext,$expensions)=== false){
      $errors[]="extension not allowed, please choose a JPEG or PNG file.";
   }

   if($file_size > 2097152){
      $errors[]='File size must be exactly 2 MB';
   }

   if(empty($errors)==true){
      $pathLocation = "../../UploadedFile/".$file_name;
      move_uploaded_file($file_tmp, $pathLocation);
      include 'connection.php';
      $sqlInputActivity = "INSERT INTO activities (`ID_AT`, `ID_C`,`dateOpen`,`dateClose`,`submissions`, `title`, `topic`, `fileDir`, `description`) VALUES ('2','2', '1', 'null', 'null', 'null','Topic 1','1', '$file_name', 'null')";
      $mysqli->query($sqlInputActivity);
      echo "Success";
   }else{
      print_r($errors);
   }
}
?>
<html>
<body>      
   <form action="" method="POST" enctype="multipart/form-data">
      <input type="file" name="image" />
      <input type="submit"/>
   </form>

</body>
</html>