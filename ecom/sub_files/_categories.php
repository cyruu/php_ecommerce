<!-- categories -->

        
<style>
    .cat-link:hover
    {
        font-size:17px;
    }

</style>


<div class="categories" style="width:270px;background:rgba(250, 250, 250, 1);margin:auto;position:sticky;top:20vh;padding:0px 10px;border:1px solid rgba(220, 220, 220, 1);border-radius:5px;">
        <div class="my-2 mx-3" style="font-size:20px;border-bottom:1px solid rgba(190, 190, 190, 1);padding-bottom:10px;">Categories</div>
        <ul style="list-style:none;padding:0;display:flex;flex-direction:column;margin-left:20px;">
            <?php
                $sql5 = "SELECT * FROM `categories`";
                $result5 = mysqli_query($conn,$sql5);
                while($item5 = mysqli_fetch_assoc($result5))
                {
                    echo '
                        
                            <a href="'.$item5['category_name'].'.php?catid='.$item5['category_id'].'&catname='.$item5['category_name'].'" style="width:100%;height:40px;
                            color:black;padding:0px 10px 0px 40px;text-decoration:none;
                            display:flex;align-items:center;transition:all .2s ease; " class="cat-link text-capitalize">'.$item5['category_name'].'</a>
                        
                    ';
                }
            ?>
            
            
        </ul>
    </div>