<?php
$category = categories();
//print_r($category);
if (count($category) > 0) {
?>
    <header id="secondary-nav" class="secondary-nav shadow-sm " style="position: fixed;">
        <div class="container">
            <nav class="vam nav scroll dragger scroller" id="category-items">

                <?php
                for ($i = 0; $i < count($category); $i++) {
                ?>
                    <li class="nav-item padma-menu" style="text-decoration:none" id="categoryBssMobile<?php echo $i ?>" value="<?php echo $category[$i]->category_name; ?>"><a onclick="showProducts(<?php echo $category[$i]->category_id; ?>, <?php echo $i ?>);" class="nav-link"><?php echo $category[$i]->category_name; ?></a></li>
                <?php
                }
                ?>
                </nav>

</div>
</header>
                        <?php
                    }
                        ?>
