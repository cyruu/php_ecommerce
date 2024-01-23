<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Pasa.com-Cart</title>
</head>

<body style="background:rgba(250,250,250,1);position:relative;">
    <!-- partial files -->
    <?php
      include("sub_files/header.php");
      include("sub_files/subheader.php");
    ?>


    <?php
    // data for cart
    include("sub_files/_dbconnect.php");
    
    // $passed_product_id = $_GET['productid'];//may not require
    $passed_user_id = $_GET['userid'];
    $removedFromCart = $_GET['removed'];


    // alert
    if($removedFromCart!='false')
    {
        
      echo '
      
      <div class="alert alert-danger alert-dismissible fade show position-absolute w-100 text-center" role="alert">
          <strong>Removed!</strong> '.$removedFromCart.' removed from cart.
          <button type="button" class="close" style="outline:none;" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      ';
    }

    $sql = "SELECT * FROM `carts` WHERE cart_user_id=$passed_user_id";
    $result = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($result);
        if ($rows==0)
    {
        echo '
                <div class="jumbotron container mt-5 bg-light">
                <h1 class="display-4">Your Cart is empty</h1>
                <p>Add some product to cart. <a href="index.php">Click Here</a> to go to home page.</p>
                    
                
              </div>
                ';
    }
    else{
        
        echo '
        
        <table class="table table-hover position-absolute" style="width:900px;margin:80px 100px;">
        <thead>
            <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        
        <tbody style="height:30px;">
        ';

        //content of cart table
        while ($item = mysqli_fetch_assoc($result))
        {
            //fetch from product table using each cart_product_id
            $cart_product_id = $item['cart_product_id'];
            // $cart_product_quantity = $item['cart_product_quantity'];
            // echo $cart_product_id;
            $sql2 = "SELECT * FROM `products` WHERE product_id=$cart_product_id";
            $result2 = mysqli_query($conn,$sql2);
            $item2 = mysqli_fetch_assoc($result2);
            $product_price=$item2['product_price'];
            $product_title=$item2['product_title'];

            // table data
            echo '<tr >
                        <td>'.$product_title.'</td>
                        <td>'.$product_price.'<input type="hidden" class="price" value="'.$product_price.'"></td>
                        <td class="px-0"><input type="number" id="quantity" onchange=\'calcTotal()\' value="1" name="quantity" min="1" max="10" placeholder="0" class="mx-0 text-center ml-3 w-50 quantity"></td>
                        <td class="total px-0"></td>
                        <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-danger shadow-none" data-toggle="modal" data-target="#exampleModal1'.$cart_product_id.'">
                          Remove
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" style="width:100%;padding-top:210px;padding-left:150px;" id="exampleModal1'.$cart_product_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              You want to remove <b>'.$product_title.'</b>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                              <a href="handleremove.php?productid='.$cart_product_id.'" class="btn btn-outline-danger shadow-none">Yes, Remove</a>
                              
                            </div>
                          </div>
                          </div>
                        </div>
                        </td>
                        
                        
                        
                    </tr>
        ';
        
            
        }
        echo '
        </tbody>
    </table>


    <!-- card -->
    <div class="card" style="height:270px;width:350px;border-radius:10px; position: absolute;right:110px;top:200px;">

        <div class="card-body text-center">
            <h5 class="card-title">Grand Total</h5>
            <span style="font-size:3rem;" class="text-danger"><b>Rs. </b></span>
            <span class="card-text font-weight-bold text-danger" id="grandtotal" style="font-size:3rem;">0</span>
    </br>
            <!-- payment -->
           
            <!-- buttons -->
            <!-- esewa -->
            <label for="payesewa" style="cursor:pointer;">
                <input type="radio" name="payment" id="payesewa" class="mt-4"> Esewa
            </label>
            <!-- cash -->
            <label for="paycash" style="cursor:pointer;" class="ml-5">
                <input type="radio" name="payment" id="paycash"> Cash on Delivery
            </label>
            <!-- <button type="button" class="btn btn-outline-danger mt-4 shadow-none">Place Order</button> -->

            <button type="button" class="btn btn-outline-danger shadow-none mt-4"  onchange=\'calcTotal()\'  data-toggle="modal" data-target="#exampleModal">
        Place Order
        </button>


            <!-- Modal -->
            <div class="modal fade" style="padding-top:120px;" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                  <div class="top d-flex align-items-center text-success">
                  <i class="fa-solid fa-circle-check ml-5 pl-5 mr-3 text-success" style="font-size:50px;"></i>
                  Order Placed Successfully
                  </div>
              
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body">
                  <div class="list">';
                  $sql4 = "SELECT * FROM `carts` WHERE cart_user_id=$passed_user_id";
                  $result4 = mysqli_query($conn,$sql4);
                  while ($item4 = mysqli_fetch_assoc($result4))
                  {
                    $cart_product_id = $item4['cart_product_id'];
                    $sql5 = "SELECT * FROM `products` WHERE product_id=$cart_product_id";
                    $result5 = mysqli_query($conn,$sql5);
                    $item5 = mysqli_fetch_assoc($result5);
          
                    $product_title=$item5['product_title'];

                    echo '<p class="my-3">'.$product_title.'</p>';
                  }
                  echo '</div>
                  <a href="index.php" class="btn btn-outline-success mt-4">Go To Home Page</a>
                  </div>
                  
                </div>
              </div>
            </div>

<!-- sakyo -->
            
        </div>
    </div>
        ';
        // elseends
    }

    // main
    ?>



    

        



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="cart.js"></script>
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