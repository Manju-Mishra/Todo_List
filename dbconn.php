<?php

class Todo
{
  public $msg;
  private $conn;
  public $tmp;
  public $fn;
  public $email1;
  public $uname;
  public $name1;
  public $age;
  public $city;
  public $image;
  public $id;
  public $sn; public $arr;

  function __construct()
  {
    $this->conn = mysqli_connect("localhost", "root", "", "todo_list");
  }



  // for Adding
  function add($email, $uname, $name, $age, $city, $image)
  {
    
    if(!empty($email) &&!empty($uname) && !empty($name) && !empty($age) && !empty($city))
    {  
          $tmp = $_FILES['att']['tmp_name'];
          $fname = $_FILES['att']['name'];
           if (mysqli_query($this->conn, "insert into employee(email,uname,name,age,city,image) values('$email','$uname','$name',$age,'$city','$fname')")) 
             {
                   $dest = "upload/";
                   move_uploaded_file($tmp, $dest.$fname);
                   session_start();
                   $email=$_SESSION['email'];
                   $pass=$_SESSION['pass'];
                   $this->msg = " Data Added successfully";
                   return $this->msg;
              }
             else
            {
                  $this->msg = " Data not added";
                  return $this->msg;
            }
    }
    else
    {
      $this->msg = " Please fill all the fields";
      return $this->msg;
    }
   
  }



  //Dashboard
  function dash()
  {
    session_start();
    $email=$_SESSION['email'];
      $query=mysqli_query($this->conn,"select * from employee");
       
      if (mysqli_num_rows($query) > 0) {
        $this->sn=0;
        while ($sel = mysqli_fetch_assoc($query)) {
          
          $this->email1=$sel['email'];
          $this->uname=$sel['uname'];
          $this->name1=$sel['name'];
          $this->age=$sel['age'];
          $this->city=$sel['city'];
          $this->image=$sel['image'];
          $this->id=$sel['id'];
          $this->sn++;
        }
        
      } 
        
  }


  //Delete
   function del($id)
   {
     session_start();
     $id = $_GET['del'];
     if (mysqli_query($this->conn, "delete from employee where id=$id"))
      {
        $this->msg = " Deleted from database";
        return $this->msg;
     }
     else
     {
      $this->msg = " Not deleted";
      return $this->msg;
     }
   }




   //Edit
   function edit($email,$uname,$name,$age,$city,$image)
   {
    session_start();
    $id=$_GET['edit'];
    $sel=mysqli_query($this->conn,"select * from employee where id=$id");
  
    $tmp = $_FILES['att']['tmp_name'];
    $fname = $_FILES['att']['name'];
    if(mysqli_query($this->conn,"update employee set email='$email',uname='$uname',name='$name',age=$age,city='$city',image='$fname'"))
    {
      $this->msg = " Updated from database";
        return $this->msg; 
    }
    else
    {
      $this->msg = " not updated from database";
      return $this->msg;
    }
   }



  function __destruct()
  {
    mysqli_close($this->conn);
  }
}
