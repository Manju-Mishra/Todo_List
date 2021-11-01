<?php
 include("dbconn.php");
 error_reporting(0);
 if(isset($_POST['sub']))
 {
       $obj=new Todo;
       $msg=$obj->add($_POST['email'],$_POST['uname'],$_POST['name'],$_POST['age'],$_POST['city'],$_FILES['att']);
    
 }
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <style>
       body{
           background-image: url("https://cdn.dribbble.com/users/34759/screenshots/13971601/media/30298693302288b91b5d3dc292a8cadb.png?compress=1&resize=400x300");
            background-size: cover;
            background-attachment: fixed;
            
        }
   </style>
</head>

<body class=" table-warning">
<?php
    if (!empty($msg)) {
   ?>
        <div class="alert alert-success" style="font-size:30px"><?php echo $msg;?></div>
        <?php
    }
    ?>
    <br><br><br>
    <div class="border border-success container mt-4 bg-dark text-light col-6"><br>
        <h2 align="center"><i class="text-info border border-info container col-6">REGISTER HERE</i></h2><br>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="text-warning">Email</label>
                <input type="text" name="email" placeholder="email@gmail.com" class="form-control col-10">
            </div>
            <div class="form-group">
                <label class="text-warning">Username</label>
                <input type="text" name="uname" placeholder="enter @name" class="form-control col-10">
            </div>
            <div class="form-group">
                <label class="text-warning">Name</label>
                <input type="text" name="name" placeholder="enter name" class="form-control col-10">
            </div>
            <div class="form-group">
                <label class="text-warning">Age</label>
                <input type="text" name="age" placeholder="enter age" class="form-control col-10">
            </div>
            <div class="form-group">
                <label class="text-warning">City</label>
                <input type="text" name="city" placeholder="enter city" class="form-control col-10">
            </div>
            <div class="form-group">
                <label class="text-warning">Upload Image</label>
                <input type="file" name="att"  class="form-control col-10">
            </div><br>
            <input type="submit" value="REGISTER" class="btn btn-success col-6" name="sub"><br><br>
    </div>
    </form>
    <br><br>
</body>

</html>