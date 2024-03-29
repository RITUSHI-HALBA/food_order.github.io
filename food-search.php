<?php include("partials_front/menu.php") ?>


<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        <?php
        $search = $_POST['search'];
        ?>
        <h2>Foods on Your Search <a href="" class="text-white">
                <?php echo $search; ?>
            </a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php
        $sql = "SELECT * FROM table_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {

                $id = $row['id'];
                $image_name = $row['image_name'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                ?>
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <?php
                        if ($image_name != "") {
                            ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name ?>" alt="Pizza"
                                class="img-responsive img-curve">
                            <?php
                        } else {
                            echo "<div>There is no image available</div>";
                        }
                        ?>
                    </div>

                    <div class="food-menu-desc">
                        <h4>
                            <?php echo $title; ?>
                        </h4>
                        <p class="food-price">
                            <?php echo $price; ?>
                        </p>
                        <p class="food-detail">
                            <?php echo $description; ?>
                        </p>
                        <br>

                        <a href="<?php echo SITEURL; ?>order.php" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<div>No food was found</div>";
        }
        ?>



        <div class="clearfix"></div>



    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php include("partials_front/footer.php") ?>