<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Pasa.com-Electronics</title>
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
      include("sub_files/header.php");
      include("sub_files/subheader.php");
    ?>

    <!-- product display -->
    <?php
      include("sub_files/_dbconnect.php");
      // caegoreis
      echo '
      <div class="cat" style="width:23%;height:79%;position:absolute;top:22vh;left:0px;">
      ';
      include("sub_files/_categories.php");
      echo'</div>';

      // fetch
      $passed_id = $_GET['catid'];
      $passed_name = $_GET['catname'];
      $sql = "SELECT * FROM `products` WHERE product_cat_id=$passed_id";
      $result = mysqli_query($conn,$sql);
      $count = 1;
      echo '<div style="width:73%;margin-left:350px;">';
      echo '<div class="h2 my-4 text-capitalize">'.$passed_name.' Products</div>';
      echo '<div class="product-container"
      style="margin: 0 5% 0 0;display:flex;justify-content:space-around;
        flex-wrap:wrap;background:rgba(250, 250, 250, 1);border-radius:15px;padding:10px;">';
      
      
      while($item = mysqli_fetch_assoc($result))
      {
        if($count<=20)
        {
          $category_id = $item['product_cat_id'];
          $product_id = $item['product_id'];
          
          // card
          echo'
          <div class="card m-3" style="width: 250px; height:370px;cursor:pointer;">
          <img src="'.$item['product_image'].'" class="card-img-top p-2" style="height:57%;">
          <div class="card-body text-center" style="padding:15px 10px 0px 10px;">
            <p class="card-title font-weight-light m-0 text-capitalize">'.substr($item['product_title'],0,50).'</p>
            <h4 class="card-title font-weight-bold mt-1">Rs. '.$item['product_price'].'</h4>
            <a href="detailproduct.php?productcatid='.$category_id.'&productid='.$product_id.'&added=false" class="btn btn-outline-danger m-0 shadow-none">Buy Now</a>
          </div>
        </div>';
    $count++;
          
        }
      }
        
      echo '</div>';
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