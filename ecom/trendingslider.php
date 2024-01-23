
<?php

include("sub_files/_dbconnect.php");

?>


<!-- featured products -->
<div style="width:73%;margin-left:350px;">
    <div class="h2 my-4" style="">Trending Products</div>
    <section style="margin: 0 5% 0 0;display:flex;justify-content:space-around;
        flex-wrap:wrap;background:rgba(250, 250, 250, 1);border-radius:15px;width:100%;">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width:100%;height:100%;background:rgba(250, 250, 250, 1);border-radius:15px;padding:10px;">
            <div class="carousel-inner h-100 ">
                <!-- first slide -->
                <div class="carousel-item active h-100">
                    <div class="collection h-100 w-100" style="display:flex;justify-content:space-evenly;align-items:center;">
                        <!-- card -->
                        <?php
                            $sql = "SELECT * FROM `products` ORDER BY rand() LIMIT 3";
                            $result = mysqli_query($conn,$sql);
                            while($item = mysqli_fetch_assoc($result))
                            {
                                $category_id = $item['product_cat_id'];
                                $product_id = $item['product_id'];
                                
                                // card
                                echo'
                                    <div class="card m-3" style="width: 260px; height:370px;">
                                        <img src="'.$item['product_image'].'" class="card-img-top p-2" style="height:57%;">
                                        <div class="card-body text-center" style="padding:15px 10px 0px 10px;">
                                        <p class="card-title font-weight-light m-0">'.substr($item['product_title'],0,50).'</p>
                                        <h4 class="card-title font-weight-bold mt-1">Rs. '.$item['product_price'].'</h4>
                                        <a href="detailproduct.php?productcatid='.$category_id.'&productid='.$product_id.'&added=false" class="btn btn-outline-danger m-0 shadow-none">Buy Now</a>
                                        </div>
                                    </div>';
                            }
                        ?>
                    </div>
                </div>


                <!-- second slide -->
                <div class="carousel-item h-100">
                    <div class="collection h-100 w-100" style="display:flex;justify-content:space-evenly;align-items:center;">
                        
                        
                        <!-- card -->
                        <?php
                            $sql = "SELECT * FROM `products` ORDER BY rand() LIMIT 3";
                            $result = mysqli_query($conn,$sql);
                            while($item = mysqli_fetch_assoc($result))
                            {
                                $category_id = $item['product_cat_id'];
                                $product_id = $item['product_id'];
                                
                                // card
                                echo'
                                    <div class="card m-3" style="width: 260px; height:370px;">
                                        <img src="'.$item['product_image'].'" class="card-img-top p-2" style="height:57%;">
                                        <div class="card-body text-center" style="padding:15px 10px 0px 10px;">
                                        <p class="card-title font-weight-light m-0">'.substr($item['product_title'],0,50).'</p>
                                        <h4 class="card-title font-weight-bold mt-1">Rs. '.$item['product_price'].'</h4>
                                        <a href="detailproduct.php?productcatid='.$category_id.'&productid='.$product_id.'&added=false" class="btn btn-outline-danger m-0 shadow-none">Buy Now</a>
                                        </div>
                                    </div>';
                            }
                        ?>
            
                    </div>
                    
                </div>
                
            </div>
            <a class="carousel-control-prev" style="" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


    </section>
</div>