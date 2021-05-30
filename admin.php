<?php
{
    session_start();
        $un = $_POST['username'];
        $pass = $_POST['pass'];
        echo $pass,$un;
        $con = mysqli_connect('localhost','root');
        mysqli_select_db($con,'dsa');
    
        $q="select * from admin where username='$un' and pass='$pass'";
    
        $result=mysqli_query($con,$q);
        $num=mysqli_num_rows($result);

        if($num==1)
        {	
        
            header('location:http://localhost/project/DSA/adminlog.php');
        }
        else{
            echo "<script>alert('Invalid Username/Email or password');</script>";
            echo "<script>window.location.href ='Admin.html'</script>";
        }
}

?>
   