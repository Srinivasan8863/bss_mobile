<?php
$category=categories();
//print_r($category);
if(count($category)>0)
{
?>
<ul class="list-group">
    <?php
    for($i=0;$i<count($category);$i++)
    {
    ?>
    <li class="list-group-item" style="text-align:right;"><a href="#" onclick="showProducts(<?php echo $category[$i]->category_id; ?>);"><?php echo $category[$i]->category_name; ?></a></li>
    <?php
    }
    ?>
</ul>
<?php
}
?>
