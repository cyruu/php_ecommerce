<?php
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        include("sub_files/_dbconnect.php");
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        if($password==$cpassword)
        {
            //right password

            ///if email alerady exist
            $sql = "SELECT * FROM `users` WHERE user_email='$email'";
            $result=mysqli_query($conn,$sql);
            $rows = mysqli_num_rows($result);
            if($rows==1)
            {
                //already exist
                header("location: signup.php?p=right&e=exist");
            }
            else{
                //email does not exit
                $sql2="INSERT INTO `users` (`user_email`, `user_name`, `user_password`) VALUES ('$email', '$username', '$password')";
                $result2=mysqli_query($conn,$sql2);
                header("location: login.php?c=created&p=none&e=none");
            }
            
        }
        else
        {
            //wrong password
            header("location: signup.php?p=wrong&e=none");
        }
    }
?>