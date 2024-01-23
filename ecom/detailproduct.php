<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Pasa.com-Product</title>
    <style>
    .cat-link:hover
    {
        background-color:rgba(225, 225, 225, 1);
        
    }
  </style>
</head>

<body style="background:rgba(242, 242, 242, 1);position:relative;">


    <!-- partial files -->
    <?php

    if(!session_id())
    {
      session_start();
    }
    

    
      include("sub_files/header.php");
      include("sub_files/subheader.php");
      // caegoreis
      echo '
      <div class="cat" style="width:23%;height:79%;position:absolute;top:22vh;left:0px;">
      ';
      include("sub_files/_categories.php");
      echo'</div>';
    ?>


    <?php
    // fetch data from haldecart
    
    $addedToCart=$_GET['added'];
    // $removedFromCart=$_GET['removed'];
    if($addedToCart=='true')
    {
      echo '
      <div class="alert alert-success alert-dismissible fade show position-absolute w-100 text-center" role="alert">
          <strong>Success!</strong> Item added to cart.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      ';
    }
    elseif($addedToCart=='exist')
    {
      echo '
      <div class="alert alert-danger alert-dismissible fade show position-absolute w-100 text-center" role="alert">
          <strong>Error!</strong> Item already added to cart.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      ';
    }
    
    
    include("sub_files/_dbconnect.php");
    //passed datas
    $product_id = $_GET['productid'];
    $product_cat_id = $_GET['productcatid'];
    // echo $product_cat_id;
    $sql = "SELECT * FROM `products` WHERE product_id=$product_id";
    $result = mysqli_query($conn,$sql);
    while($item = mysqli_fetch_assoc($result))
    {
        $product_title = $item['product_title'];
        $product_desc = $item['product_desc'];
        $product_image = $item['product_image'];
        $product_price = $item['product_price'];
        $product_rating = $item['product_rating'];
        $product_by = $item['product_by'];
        $time = $item['time'];

        //next sql
        $sql2 = "SELECT * FROM `users` WHERE user_id=$product_by";
       $result2 = mysqli_query($conn,$sql2);
        while($item2 = mysqli_fetch_assoc($result2))
        {
          
          // displaying
        echo '
        <div class="container d-flex align-items-center justify-content-around w-50" style="background:rgba(250, 250, 250, 1);outline:1px solid rgba(220, 220, 220, 1);padding:30px;border-radius:10px;margin-top:35px;margin-left:450px;height:450px;">
            <div class="mr-5">
            <img src="'.$product_image.'"
                alt="..." class="img-thumbnail" style="max-width:280px;max-height:300px;">
                
            </div>

            
            <form action="buynow.php" method="POST" class="detials ">
                <div class="h2 text-capitalize">'.$product_title.'</div>
                <input type="hidden" name="producttitle" value="'.$product_title.'">
                <input type="hidden" name="productprice" value="'.$product_price.'">
                <p class="mb-2">'.substr($product_desc,0,150).'</p>
                <span class="mb-0 mr-5"><b>Rating: </b>'.$product_rating.'</span>';
                ?>
                  
                <?php
                    $sql4= "SELECT * FROM `categories` WHERE category_id=$product_cat_id";
                    $result4 = mysqli_query($conn,$sql4);
                    $item4=mysqli_fetch_assoc($result4);
                    $cat_name=$item4['category_name'];
                echo '<span class="mb-0 ml-5"><b>Category: </b>'.$cat_name.'</span>
                <p class="text-danger mb-3" style="font-size:50px;"><b>Rs. '.$product_price.'</b></p>
                <!-- quantity -->
                <label for="quantity"><b>Quantity: </b></label>
                <input type="number" id="quantity" name="quantity" min="1" max="10" placeholder="?" value=1 class="text-center ml-3 w-25 mb-4">
                </br>
                
                
                <!-- buttons -->';
                if (isset($_SESSION['login']) && $_SESSION['login']==true)
                {
                  // $user_id = $_SESSION['userid'];
                  echo '<a href="handlecart.php?userid='.$_SESSION['userid'].'&productid='.$product_id.'" class="btn btn-outline-danger shadow-none mt-1">Add to Cart</a>';
                }
                else{
                  echo '<a href="login.php?c=none&p=none&e=none" class="btn btn-outline-danger shadow-none mt-1">Add to Cart</a>';
                }
                echo '
              <button type="submit" href="" class="btn btn-outline-danger shadow-none ml-5 mt-1">Buy Now</button>
                
                </form>
        </div>';
        
        
        
        }
        
    }
    ?>

    

    <!-- view related items -->
    <?php
        $sql3 = "SELECT * FROM `products` WHERE product_cat_id=$product_cat_id";
        $result3 = mysqli_query($conn,$sql3);
        $count3 = 1;
        echo '<div style="width:73%;margin-left:350px;">';
        echo '<div class="h2 my-4 text-capitalize">Related Products</div>';
        echo '<div class="product-container"
        style="margin: 0 5% 0 0;display:flex;justify-content:space-around;
        flex-wrap:wrap;background:rgba(250, 250, 250, 1);border-radius:15px;padding:10px;">';
        
        
        while($item = mysqli_fetch_assoc($result3))
        {
          if($product_id != $item['product_id'])
          {
            if($count3<=20)
          {
            $category_id = $item['product_cat_id'];
            
            
            // card
            echo'
                <div class="card m-3" style="width: 250px; height:370px;cursor:pointer;">
                <img src="'.$item['product_image'].'" class="card-img-top p-2" style="height:57%;">
                <div class="card-body text-center" style="padding:15px 10px 0px 10px;">
                  <p class="card-title font-weight-light m-0 text-capitalize">'.substr($item['product_title'],0,50).'</p>
                  <h4 class="card-title font-weight-bold mt-1">Rs. '.$item['product_price'].'</h4>
                  <a href="detailproduct.php?productcatid='.$category_id.'&productid='.$item['product_id'].'&added=false" class="btn btn-outline-danger m-0 shadow-none">Buy Now</a>
                </div>
              </div>';
            $count3++;
            
          }
          }
          
        }
          
        echo '</div>';
        include("sub_files/footer.php");
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