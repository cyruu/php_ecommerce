<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Pasa.com-Checkout</title>
</head>
<body>
<body style="background:rgba(242, 242, 242, 1);position:relative;">
    <!-- partial files -->
    <?php
      include("sub_files/header.php");
      include("sub_files/subheader.php");
    ?>
    <div class="display-4 text-center mb-3" style="margin-top:30px;">Checkout</div>

    <form action="buynow.php" method="POST" class="container "style="width:500px;margin-top:20px;outline:1px solid rgba(220, 220, 220, 1);padding:20px 40px;border-radius:10px;background:rgba(250, 250, 250, 1);">
        <div class="form-group">
            <label for="exampleInputEmail1">Full Name</label>
            <input type="text" class="form-control shadow-none mb-2" id="exampleInputEmail1" aria-describedby="emailHelp"
            name="fname" required>

            <label >Delivery Address</label>
            <div class="row mb-2">
            <div class="col ">
                <input type="text" class="form-control shadow-none" placeholder="City" aria-label="" name="daddress" reqiured>
            </div>
            <div class="col">
                <input type="text" class="form-control shadow-none" placeholder="Area" aria-label="" name="area" reqiured>
            </div>
        </div>

        <label for="exampleInputEmail1">Phone Number</label>
        <input type="text" class="form-control shadow-none" id="exampleInputEmail1" aria-describedby="emailHelp"
        name="phone" required>


        <!-- payment -->
        <p class="mt-2 mb-1"><b>Payment:</b></p>
            <!-- esewa -->
            <label for="payesewa" style="cursor:pointer;">
            <input type="radio" name="payment" id="payesewa" class="">   Esewa
            </label>
            <!-- cash -->
            <label for="paycash" style="cursor:pointer;" class="ml-5">
            <input type="radio" name="payment" id="paycash" >   Cash on Delivery
            </label>
            </br>
            
        <!-- <div class="main w-100 text-center">
            <button type="submit" class="btn btn-outline-danger shadow-none mt-4">Place Order</button>
        </div> -->

        <!-- modal -->
        <!-- Button trigger modal -->
        <div class="main w-100 text-center">
        <button type="button" class="btn btn-outline-danger shadow-none mt-4" data-toggle="modal" data-target="#exampleModal">
        Place Order
        </button>
        </div>

    

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding-top:200px;">
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
            <div class="modal-body text-center">
                
                <?php
                $product_name = $_POST["producttitle"];
                $price = $_POST["productprice"];
                $quantity = $_POST["quantity"];
                
                $total = $price*$quantity;
                echo '
                    <p>'.$product_name.' ('.$quantity.')</p>
                    <p class="h2 text-success mb-4">Rs. '.$total.'</p>
                    <a href="index.php" class="btn btn-outline-success">Go To Home Page</a>
                ';
                ?>
            </div>
            
            </div>
        </div>
        </div>
      


</form>
            

            <!-- card -->
            <div class="card" style="height:270px;width:350px;border-radius:10px; position: absolute;right:110px;top:240px;background:rgba(250, 250, 250, 1);">

        <div class="card-body text-center">
            <h5 class="card-title">Grand Total</h5>
            <span style="font-size:3rem;" class="text-danger"><b>Rs. </b></span>
            <?php
                $product_name = $_POST["producttitle"];
                $price = $_POST["productprice"];
                $quantity = $_POST["quantity"];
                
                $total = $price*$quantity;
                echo '
                <span class="card-text font-weight-bold text-danger" id="grandtotal" style="font-size:3rem;">'.$total.'</span>
                ';

                echo '
                
                <p class="mb-1 mt-2 font-weight-bold ">Product: </p>
                <p class="mb-2 text-danger">'.$product_name.'</p>
                <p class="mb-1 font-weight-bold">Quantity: </p>
                <p class="text-danger h5">'.$quantity.'</p>';
            ?>
            
    </br>
            
        </div>
    </div>
</body>
</html>