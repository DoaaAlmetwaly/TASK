<?php 

 require '../helpers.php';
 require '../dbConnection.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

 // CODE ...... 
 $title    = Clean($_POST['title']);
 $content    = Clean($_POST['content']);


 # Validation ...... 
 $errors = [];

 # Validate title 
 if(!validate($title,1)){
     $errors['title'] = "Field Required";

 }elseif(!validate($title,3)){
    $errors['title'] = "must be greater than 6 char";
 }

 # Validate content
 if(!validate($content,1)){
     $errors['content'] = "Field Required";

 }elseif(!validate($content,2)){
    $errors['content'] = "must be greater than 20 char";
 }

# Validate image... 
if(!validate($_FILES['image']['name'],1)){
  $errors['image'] = "Field Required";
}else{

    $exArray   = explode('.',$_FILES['image']['name']);
    $extension = end($exArray);

    $allowedExtension = ["png","jpg"];

 if(!in_array($extension,$allowedExtension)){
     $errors['image'] = "Invalid Extension";
 } else{
          echo 'Image Uploaded';
      }
 }





   if(count($errors) > 0){
        foreach ($errors as $key => $value) {
            # code...
            echo '* '.$key.' : '.$value.'<br>';
        }
    }else{
     $sql = "insert into users (title,content) values ('$title','$content')";
     $op  = mysqli_query($con,$sql);

      if($op){
          echo 'Data Inserted';
      }else{
          echo 'Error Try Again'.mysqli_error($con); 


                             
      }


    }


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Register</h2>
 
 
  <form  action="<?php echo $_SERVER['PHP_SELF'];?>"   method="post" enctype="multipart/form-data">

  

  <div class="form-group">
    <label for="exampleInputName">title</label>
    <input type="text" class="form-control" id="exampleInputName"  name="title" aria-describedby="" placeholder="title">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail">content</label>
    <input type="text"   class="form-control" id="exampleInputEmail1" name="content" placeholder="content">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword">image</label>
    <input type="file"  id="exampleInputPassword1" name="image" >
  </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>
