<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   
    <!-- partial files -->
    <?php
    //   session_start();
        if ($_SERVER["REQUEST_METHOD"]=="POST")
        {
          
            
            
            
            include("sub_files/_dbconnect.php");
            
            $searchInput = mysqli_real_escape_string($conn,$_POST['search']);
            echo '
            <title>Pasa.com-'.$searchInput.'</title>
            </head>
            
            <body style="background:rgba(242, 242, 242, 1);position:relative;">
            ';


            include("sub_files/header.php");
            include("sub_files/subheader.php");
            // caegoreis
            echo '
            <div class="cat" style="width:23%;height:79%;position:absolute;top:22vh;left:0px;">';
             include("sub_files/_categories.php");
            echo'</div>';


           
            $category_id_search = 0;
            //search from category
            $sql2 = "SELECT * FROM `categories` WHERE category_name LIKE '%$searchInput%'";
            $result2=mysqli_query($conn,$sql2);
            $row2 = mysqli_num_rows($result2);
            $addFromCat = 0;
            if($row2==1)
            {
              $item2 = mysqli_fetch_assoc($result2);
              // get cat id
              $category_id_search = $item2['category_id'];
            }
            echo '<div style="width:73%;margin-left:350px;">';
            echo '<div class="h1 my-4 mx-5 text-center">You searched: '.$searchInput.'</div>';
            echo '<div class="product-container"
            style="margin: 0 5% 0 0;display:flex;justify-content:space-around;
            flex-wrap:wrap;background:rgba(250, 250, 250, 1);border-radius:15px;padding:10px;">';
            if ($category_id_search!=0)
            {
              
              $sql3 = "SELECT * FROM `products` WHERE product_cat_id='$category_id_search'";
              $result3=mysqli_query($conn,$sql3);

              $count = 1;
           
              
              
              while($item = mysqli_fetch_assoc($result3))
              {
                $addFromCat=1;
                if($count<=20)
                {
                  $category_id = $item['product_cat_id'];
                  $product_id = $item['product_id'];
                  
                  // card
                  echo'
                      <div class="card m-3" style="width: 250px; height:370px;cursor:pointer;">
                        <img src="'.$item['product_image'].'" class="card-img-top p-2" style="height:57%;">
                        <div class="card-body text-center">
                          <p class="card-title font-weight-light">'.substr($item['product_title'],0,50).'</p>
                          <h4 class="card-title font-weight-bold">Rs. '.$item['product_price'].'</h4>
                          <a href="detailproduct.php?productcatid='.$category_id.'&productid='.$product_id.'&added=false" class="btn btn-outline-danger mt-1">Buy Now</a>
                        </div>
                      </div>';
                  $count++;
                  
                }
                
              }
              
            }
            //select all produtcs from produt table if has serch input
            $sql = "SELECT * FROM `products` WHERE (product_title LIKE '%$searchInput%' OR product_desc LIKE '%$searchInput%') AND product_cat_id != $category_id_search";
            $result=mysqli_query($conn,$sql);
            $row = mysqli_num_rows($result);
            
            if($row==0 && $addFromCat==0)
            {
                echo '
                <div class="jumbotron container mt-5 bg-light">
                <h1 class="display-4">No products found for '.$searchInput.'</h1>
                <p>Please check your spelling. <a href="index.php">Click Here</a> to go to home page.</p>
                    
                
              </div>
                ';
            }
           
            
            $count = 1;
           
      
      
      while($item = mysqli_fetch_assoc($result))
      {
        if($count<=20)
        {
          $category_id = $item['product_cat_id'];
          $product_id = $item['product_id'];
          
          // card
          echo'
              <div class="card m-3" style="width: 250px; height:370px;cursor:pointer">
                <img src="'.$item['product_image'].'" class="card-img-top p-2" style="height:57%;">
                <div class="card-body text-center">
                  <p class="card-title font-weight-light">'.$item['product_title'].'</p>
                  <h4 class="card-title font-weight-bold">Rs. '.$item['product_price'].'</h4>
                  <a href="detailproduct.php?productcatid='.$category_id.'&productid='.$product_id.'&added=false" class="btn btn-outline-danger mt-1">Buy Now</a>
                </div>
              </div>';
          $count++;
          
        }
      }
        }
        echo '</div>';
      
    ?>

    <!-- product display -->
    <?php
      include("sub_files/_dbconnect.php");
    
    ?>
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