<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Pasa.com-Log In</title>

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    form i {
        margin-left: -30px;
        cursor: pointer;
    }
    .fa-magnifying-glass
    {
        margin-left:1px;
    }
    </style>
</head>

<body style="background:rgba(242, 242, 242, 1);position:relative;">
    <?php
      include("sub_files/header.php");
      include("sub_files/subheader.php");

      //acc created
      $createdAcc=$_GET['c'];
      $emailExist=$_GET['e'];
      $passwordMatch=$_GET['p'];
      // $removedFromCart=$_GET['removed'];
      if($createdAcc=='created')
      {
        echo '
        <div class="alert alert-success alert-dismissible fade show position-absolute w-100 text-center" role="alert">
            <strong>Account created!</strong> You can log in now.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ';
    }

    if($emailExist=='notexist')
      {
        echo '
        <div class="alert alert-danger alert-dismissible fade show position-absolute w-100 text-center" role="alert">
            <strong>Error!</strong> Email does not exist.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ';
    }

    if($passwordMatch=='nomatch')
      {
        echo '
        <div class="alert alert-danger alert-dismissible fade show position-absolute w-100 text-center" role="alert">
            <strong>Error!</strong> Incorrect password.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ';
    }
    ?>
    <div class="h1 text-center" style="margin-top:80px;">Log In To Our Page</div>
    <form action="handlelogin.php" autocomplete="off" method="POST" class="container "style="width:500px;margin-top:30px;outline:1px solid rgba(220, 220, 220, 1);padding:40px;border-radius:10px;background:rgba(250, 250, 250, 1);">
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control shadow-none" id="exampleInputEmail1" aria-describedby="emailHelp"
                name="email" required>
            <div class="form-group mt-3">

                <label>Password</label>
                <div class="text d-flex align-items-center">
                    <input type="password" class="form-control shadow-none" aria-describedby="emailHelp" name="password"
                        id="password" required>
                    <i class="bi bi-eye-slash" style="cursor:pointer;" id="togglePassword"></i>
                </div>



            </div>
            <div class="main w-100 text-center">
                <button type="submit" class="btn btn-outline-primary shadow-none mt-3">Log In</button>
            </div>
            <div class="newmember mt-4 text-center">
                New Member? <a href="signup.php?p=none&e=none">Register Now</a>
            </div>

    </form>



    </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
    const togglePassword = document
        .querySelector('#togglePassword');

    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', () => {

        // Toggle the type attribute using
        // getAttribure() method
        const type = password
            .getAttribute('type') === 'password' ?
            'text' : 'password';

        password.setAttribute('type', type);

        // Toggle the eye and bi-eye icon
        this.classList.toggle('bi-eye');
    });
    </script>
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