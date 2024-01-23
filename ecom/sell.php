<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Pasa.com-Sell</title>
</head>

<body style="background:rgba(242, 242, 242, 1);position:relative;">
    
    <?php
    if(!session_id())
    {
        session_start();
    }
       
    
        if(!isset($_SESSION['login'])&&$_SESSION['login']!=true)
        {
            header("location: login.php?c=none&e=none&p=none");
        }
    ?>
    <!-- partial files -->
    <?php
      include("sub_files/header.php");
      include("sub_files/subheader.php");
    ?>

    <div class="h2 my-4 text-capitalize text-center">Sell Your Product</div>
    <!-- need
    product_title
    product_desc
    product_price
    product_by
    product_image
    product_cat_id
    product_rating -->

    <!-- form -->
    <form autocomplete="off" action="handlesell.php" method="POST" class="container w-50 " style="margin-top:0px;background:rgba(253, 253, 253, 1);padding:10px 15px;border-radius:15px;">
        <div class="form-group ">
            <label for="exampleFormControlInput1">Product Name</label>
            <input type="text" class="form-control shadow-none" id="exampleFormControlInput1" placeholder="" name="productname" required>
        </div>
        <div class="form-group ">
            <label for="exampleFormControlTextarea1">Description</label>
            <input type="text" class="form-control shadow-none" id="exampleFormControlTextarea1" rows="3" required name="productdesc">
        </div>
        <div class="form-row ">
            <div class="form-group col-md-6 ">
                <label for="inputEmail4">Price</label>
                <input type="number" step="100" min="0" class="form-control shadow-none" id="inputEmail4" placeholder="" required name="productprice">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Rating</label>
                <input type="text" class="form-control shadow-none" id="inputPassword4" placeholder="" required name="productrating">
            </div>
        </div>

        <div class="form-group ">
            <label for="exampleFormControlSelect1">Category</label>
            <select class="form-control text-capitalize shadow-none" id="exampleFormControlSelect1" name="productcategory" required>
                <option value="" disabled selected hidden>Select Category</option>
                <?php
                    //fetch cartegories for dropdown
                    include("sub_files/_dbconnect.php");

                    $sql = "SELECT * FROM `categories`";
                    $result = mysqli_query($conn,$sql);
                    while ($item = mysqli_fetch_assoc($result))
                    {
                        $category_name = $item['category_name'];
                        echo '<option class="text-capitalize">'.$category_name.'</option>';
                    }
                ?>



            </select>
        </div>
        <!-- url -->
        
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Image URL</label>
            <input type="text" class="form-control shadow-none" id="exampleFormControlTextarea1" rows="3" placeholder="URL" name="producturl">
        </div>

         <!-- file -->
       

         
         
        <!-- submit -->
        <div class="main w-100 text-center">
            <button type="submit" name="submit" class="mt-3 btn btn-outline-danger shadow-none">Sell Item</button>
        </div>

       


    </form>
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