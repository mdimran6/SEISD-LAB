

<?php
    $con = new mysqli("localhost","root","","sample");   /* Connection code(Connect with database) */
	echo "<a href='registration.php'>addproduct</a> | <a href='display.php'>view product</a>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registartion</title>
    <style>
        input[type=text],input[type=email],input[type=password]{
            width:100% !important;
        }
        table{
            border: 1px solid rgb(202,207,210);
        }
        form {
            margin: 10% auto 0;
        }
    </style>
</head>
<body>
   
  
    
    /* Insert form */
    <form method="post" enctype="multipart/form-data">
       <center><h1>Information</h1></center>
        <table align="center" border="0">
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="txtfname"></td>
            </tr>
            <tr>
                <td>Email Address:</td>
                <td><input type="email" name="txtuemail"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="txtpassword"></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td><input type="radio" name="rdogender" value="Male">Male<input type="radio" name="rdogender" value="Female">Female</td>
            </tr>
            <tr>
                <td>Hobbies</td>
                <td><input type="checkbox" name="chkhobby[]" value="Cricket">Cricket
                <input type="checkbox" name="chkhobby[]" value="Hocky">Hocky
                <input type="checkbox" name="chkhobby[]" value="Singing">Singing</td>
            </tr>
            <tr>
                <td>Profile Picture:</td>
                <td><input type="file" name="profile"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Insert" name="btninsert"></td>
            </tr>
        </table>
    </form>
    <?php  ?>
  
    <?php
	/* Insert Code Start */
        if(isset($_POST["btninsert"]))   /* Insert button click event */
        {
	    /* Move image into images folder which you have to create in C:\xampp\htdocs\foldername\ */
            move_uploaded_file($_FILES["profile"]["tmp_name"],"images/".$_FILES["profile"]["name"]); 
			$image1=$_FILES["profile"]["tmp_name"];
			echo($image1);
	    $image=$_FILES["profile"]["name"];
		echo($image);
	    $checkbox1=$_POST['chkhobby'];  
	    $chk="";  
	    foreach($checkbox1 as $chk1)  
	      {  
		 if($chk == "")
		    {
		       $chk .= $chk1;
		    }
		 else{
		       $chk .= ",".$chk1;  
		     }  
	      }  
		  $query1="insert into sample(RegFullName,RegEmail,RegPassword,RegGender,RegHobbies,RegProfile) values('".$_POST["txtfname"]."','".$_POST["txtuemail"]."','".$_POST["txtpassword"]."','".$_POST["rdogender"]."','".$chk."','".$image."')";
            $res = mysqli_query($con,$query1) or die(mysqli_error($con));
            if($res == TRUE)
            {
                echo "<script>alert('Data added successfully..!!')</script>";
            }
            else
            {
                echo "<script>alert('Something getting wrong.Please try again..!')</script>";
            }
        }
	/* Insert Code End */
    ?>
</body>
</html>