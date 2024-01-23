<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Pasa.com-Your Products</title>
</head>

<body style="background:rgba(242, 242, 242, 1);position:relative;">
    <!-- partial files -->
    <?php
      include("sub_files/header.php");
      include("sub_files/subheader.php");
    ?>

    <!-- product display -->
    <?php
      include("sub_files/_dbconnect.php");
      if(!session_id())
      {
        session_start();
      }
        
      $added = $_GET['a'];
      $removed = $_GET['r'];
      if($added=='added')
      {
        echo '
        <div class="alert alert-success alert-dismissible fade show position-absolute w-100 text-center" role="alert">
            <strong>Success!</strong> New item added.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ';
      }

      if($removed=='removed')
      {
        echo '
        <div class="alert alert-danger alert-dismissible fade show position-absolute w-100 text-center" role="alert">
            <strong>Item removed!</strong> Your item is removed.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ';
      }
    $user_name = $_SESSION['username'];
    //get user id from username from user table


    $sql = "SELECT * FROM `users` WHERE user_name='$user_name'";
    $result = mysqli_query($conn,$sql);
    $item = mysqli_fetch_assoc($result);

    $user_id =  $item['user_id'];


    //get all product fors products where user is user_id
    $sql2 = "SELECT * FROM `products` WHERE product_by=$user_id";
    $result2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_num_rows($result2);
    
    if($row2==0)
    {
        //no products in site
        echo '
        <div class="jumbotron container mt-5 bg-light">
        <h1 class="display-4">No Products Yet</h1>
        
        <p>You have not added your products to this site yet.</p>
        <a class="btn btn-outline-success btn-lg mt-3" href="sell.php" role="button">Sell Item</a>
      </div>
        ';
    }
    else
    {
        $count = 1;
      
        echo '<div style="width:100%;margin:auto;">';
        echo '<div class="h2 my-4 text-capitalize text-center mt-5 pt-3 w-100" style="">Your Products</div>';
        echo '<div class="product-container"
       style="margin: auto;display:flex;justify-content:space-around;
        flex-wrap:wrap;background:rgba(250, 250, 250, 1);border-radius:15px;padding:10px;width:75%;">';
      
      
      while($item2 = mysqli_fetch_assoc($result2))
      {
        if($count<=21)
        {
          $category_id = $item2['product_cat_id'];
          $product_id = $item2['product_id'];
          $product_price = $item2['product_price'];
          
          // card
          echo'
              <div class="card m-3" style="width: 250px; height:370px;cursor:pointer;">
               <img src="'.$item2['product_image'].'" class="card-img-top p-2" style="height:57%;">
               <div class="card-body text-center" style="padding:15px 10px 0px 10px;">
                  <p class="card-title font-weight-light m-0">'.substr($item2['product_title'],0,50).'</p>
                  <h4 class="card-title font-weight-bold mt-1">Rs. '.$item2['product_price'].'</h4>
                    
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-outline-danger shadow-none" data-toggle="modal" data-target="#exampleModal1'.$product_price.'">
                    Remove
                  </button>
                  
                  <!-- Modal -->
                  <div class="modal fade" style="width:100%;padding-top:210px;padding-left:150px;" id="exampleModal1'.$product_price.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content" style="width:350px;">
                        <div class="modal-header">
                          <div class="main w-100 text-center" style="margin-left:40px;">
                          
                        
                          <h5 class="modal-title text-danger" id="exampleModalLabel" style="font-size:30px;">Are you sure?</h5>
                        </div>
                          
                          <button type="button" class="close" style="outline:none;" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body text-center">
                        You want to remove <b>'.$item2['product_title'].'</b>
                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                        <a href="handleproductremove.php?p='.$product_id.'" class="btn btn-outline-danger shadow-none">Yes, Remove</a>
                        
                      </div>
                    </div>
                    </div>
                  </div>

                  
                </div>
              </div>';
          $count++;
          
        }
      }
        
      echo '</div>';
      echo '</div>';
      echo '</div>';
      include("sub_files/footer.php");
    }
      
     ?>


    <style>
    .card {
        transition: all .3s ease
    }

    .card:hover {
        box-shadow: 5px 5px 10px grey;
    }
    </style>
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