<?php
 include("dbconn.php");
 error_reporting(0);
 {
     $obj=new Todo;
     $obj->dash();
     $obj->del($_POST['del']);
 }
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="bg-dark">
    <br>
    <div class="text-info border border-primary col-8 container" align="center" style="font-size:40px; font-weight:bold"><i class="fa fa-bars text-info"></i>
    DASHBOARD &emsp;&emsp;&emsp;
    <a class="fa fa-sign-out text-info" href="Logout.php">Logout</a>
   </div>
   
    <br><br>
    <div class="container">
        <table border=3 class="table border border-primary table-hover">
            <tr>
                <td colspan="8" align="center" class="text-primary table-success" style="font-size:25px; font-weight:bold">DETAILS</td>
            </tr>
          <tr class="table-danger">
              <th>S.no</th>
              <th>Email</th>
              <th>Uname</th>
              <th>Name</th>
              <th>Age</th>
              <th>City</th>
              <th>Image</th>
              <th>Action</th>
          </tr>
          <tr class="table-info">
                    <td><?=$obj->sn;?></td>
                    <td><?= $obj->email1;?></td>
                    <td><?= $obj->uname;?></td>
                    <td><?= $obj->name1;?></td>
                    <td><?= $obj->age;?></td>
                    <td><?= $obj->city;?></td>
                    <td><?= $obj->image;?></td>
                    <td>
                    <a href="Edit.php?edit=<?php echo $obj->id;?>" class="fa fa-pencil " style="font-size:25px;"></a>&emsp;
                    <a href="?del=<?php echo $obj->id;?>" class="fa fa-trash" style="font-size:25px;"></a>
                    </td>
                   
             
          </tr>
        </table>
    </div>
</body>
</html>