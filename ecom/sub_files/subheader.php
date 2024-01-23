<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!-- fecth category from database -->
<?php
          include("_dbconnect.php");

          //include("_categories.php");
          $sql = "SELECT * FROM `categories`";
          $result = mysqli_query($conn,$sql);
          // $rows = mysqli_num_rows($result);
          // echo $rows;

          ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light p-0 my-0 h-25 bg-white text-center"
    style="border-bottom:1px solid #e6e6e6;position:sticky;top:12vh;z-index:2;box-shadow:0px 5px 5px rgba(0, 0, 0, 0.2);">

    <div class="collapse navbar-collapse text-center" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <!-- dropdown -->
            <!-- empty -->
            <li class="nav-item ml-4">

            </li>
            <!-- dropdown -->

            <!-- empty -->
            <li class="nav-item mr-5">

            </li>
            <!-- empty -->
            <li class="nav-item mr-5">

            </li>
            <!-- empty -->
            <li class="nav-item mr-5">

            </li>
            <!-- empty -->
            <li class="nav-item mr-5">

            </li>
            <!-- empty -->
            <li class="nav-item mr-5">

            </li>
            
            <!-- Home -->
            <li class="nav-item mx-5" style="transition:all .2s ease;">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <!-- electonic -->
            <li class="nav-item" style="transition:all .2s ease;">
                <a class="nav-link ml-5 mx-5" href="electronics.php?catid=1&catname=electronics">Electronics <span
                        class="sr-only">(current)</span></a>
            </li>
            <!-- fashion -->
            <li class="nav-item" style="transition:all .2s ease;">
                <a class="nav-link ml-5 mx-5" href="fashion.php?catid=4&catname=fashion">Fashion <span
                        class="sr-only">(current)</span></a>
            </li>
            <!-- sports -->
            <li class="nav-item" style="transition:all .2s ease;">
                <a class="nav-link ml-5 mx-5" href="sports.php?catid=5&catname=sports">Sports <span
                        class="sr-only">(current)</span></a>
            </li>
            <!-- music -->
            <li class="nav-item mx-5" style="transition:all .2s ease;">
                <a class="nav-link" href="music.php?catid=2&catname=music">Music</a>
            </li>
            <!-- sell -->
            <li class="nav-item mx-5" style="transition:all .2s ease;">
                <a class="nav-link" href="sell.php">Sell</a>
            </li>


        </ul>
    </div>
</nav>