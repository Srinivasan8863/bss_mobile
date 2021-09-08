<?php
$category = categories();
//print_r($category);
if (count($category) > 0) {
?>
    <div orientation="vertical" id="category-items" class=" sc-10mkyz7-0 sc-1woi3cc-0 eulj9w-1 gSztOG sc-1li42hb-0 kFGDQL">
        <?php
        for ($i = 0; $i < count($category); $i++) {
        ?>
            <button 
            onclick="showProducts(<?php echo $category[$i]->category_id; ?>, <?php echo $i ?>);" 
            value="<?php echo $category[$i]->category_name; ?>" 
            id="categoryBss<?php echo $i ?>" 
            orientation="vertical" 
            class="sc-1hdkpm0-0 eulj9w-0 klBrHK sc-1li42hb-1 eQpvsi"><?php echo $category[$i]->category_name; ?>
            </button>
        <?php
        }
        ?>
    </div>
<?php
}
?>