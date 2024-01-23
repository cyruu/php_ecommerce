<?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        include("sub_files/_dbconnect.php");

        $email = $_POST["email"];
        $password = $_POST["password"];

        //check if email in database
        $sql = "SELECT * FROM `users` WHERE user_email='$email'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_num_rows($result);
        $item = mysqli_fetch_assoc($result);

        if($row==1)
        {
            //email exits in databse


            //check password
            if($password==$item["user_password"])
            {
                

                //session start
                session_start();
                $_SESSION['login']=true;
                $_SESSION['username']=$item['user_name'];
                $_SESSION['userid']=$item['user_id'];
                header("location: index.php");
                
            }
            else{

                header("location: login.php?c=none&e=notexist&p=nomatch");
            }   
        }
        else{
            //email doesnt exist
            header("location: login.php?c=none&e=notexist&p=none");

        }
    }
?>