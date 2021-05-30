<?php
    session_start();
   
        $source = $_POST['name'];
        $dest = $_POST['email'];
        $inter=$_POST['message'];
        $con = mysqli_connect('localhost','root');
        mysqli_select_db($con,'dsa');
    
        $q="insert into airline (SOURCES,DESTINATION,INTERMEDIATE_DESTN) values('$source','$dest','$inter')";
        $status = mysqli_query($con,$q);
   
        if($status==1)
			{	
                
                echo "<script>alert('Added');</script>";
			    echo "<script>window.location.href ='adminlog.php'</script>";
				
			}
		else
		{
			echo "<script>alert('Some error occured');</script>";
			echo "<script>window.location.href ='adminlog.php'</script>";
			
			
		}


?>