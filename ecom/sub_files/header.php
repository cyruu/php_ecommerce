
<?php
if(!session_id())
    session_start();
 
?>
<!doctype html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
    <title>E-shop!</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Monoton&display=swap');
        .buttonsearch:hover
        {
            color: white;
            background: black;
        }
        .nav-item:hover{
            transform:scale(1.1);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light"
        style="height:12vh;background-color:white;border-bottom:1px solid #e6e6e6;position:sticky;top:0px;z-index:2;">
        <a class="navbar-brand text-danger" style="margin-right:250px;padding:0 20px;margin-left:20px;font-size:3.5rem;font-family: 'Monoton', cursive;"
            href="index.php">Pasa<span style="font-size:18px;font-family:sans-serif;">.com</span></a>


            <!-- search -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <form action="searchedproduct.php" autocomplete="off" method="POST" class="form-inline my-2 my-lg-0 shadow-none" style="margin-right:0px;width:610px;height:45px;outline:none;">
                <div class="mr-sm-2 w-75 h-100 p-0 m-0" style="border:1px solid grey;display:flex;align-items:center;">
                    <input type="text" placeholder="search" class="shadow-none" style="height:100%;width:90%;padding-left: 13px;outline:none;border:none" name="search" required>
                    <button class="buttonsearch" name="submitsearch" style="height:100%;width:11%;border:none;transition:all .2s ease;display:flex;justify-content:center;align-items:center;"><i class="fa-solid fa-magnifying-glass" style="padding-left:0px"></i></button>
                </div>
                <!-- <input class="form-control mr-sm-2 w-75" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
            </form>

            <ul class="navbar-nav mr-auto" style="font-size:16px;">

                <?php
                include("sub_files/_dbconnect.php");
                

                if(isset($_SESSION['login'])&&$_SESSION['login']==true)
                {
                    $cart_user_id = $_SESSION['userid'];
                    $sql = "SELECT * FROM `carts` WHERE cart_user_id=$cart_user_id";;
                    $result=mysqli_query($conn,$sql);
                    $rows=mysqli_num_rows($result);
                    echo '
                <li class="nav-item mr-5" style="transition:all .2s ease;">
                    <a class="nav-link" href="cart.php?userid='.$_SESSION['userid'].'&removed=false" style="">
                    
                    <i class="fa-solid fa-cart-shopping" style="font-size:25px;position:relative;">
                        <span class="" style="padding:5px 6px;background:#3b3b3b;font-size:8px;border-radius:50%;color:white;font-weight:bold;position:absolute;left:18px;top:-8px;">
                            '.$rows.'
                        </span>
                    </i>
                    
                    </a>
                </li>
                <li class="nav-item mr-5" style="transition:all .2s ease;">
                            <a class="nav-link text-capitalize" href="userproducts.php?a=none&r=none.php?p=none&e=none" style="font-size:16.5px;"><i class="fa-solid fa-user" style="font-size:16px;margin-right:8px;"></i>'.$_SESSION['username'].'</a>
                </li>
                <li class="nav-item" style="transition:all .2s ease;">
                    <a class="nav-link" href="logout.php">Log Out</a>
                </li>';
                }
                else
                {
                    echo '
                        <li class="nav-item" style="transition:all .2s ease;">
                            <a class="nav-link mr-5 ml-5" href="login.php?c=none&e=none&p=none">Log In</a>
                        </li>
                        
                        <li class="nav-item" style="transition:all .2s ease;">
                            <a class="nav-link" href="signup.php?p=none&e=none">Sign Up</a>
                        </li>';
                }
            ?>
            </ul>
        </div>
    </nav>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>