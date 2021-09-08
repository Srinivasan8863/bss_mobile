<?php
$bannerlist=banners();
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-bottom:5px; width:100%; display:none">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php
        for($i=0;$i<count($bannerlist);$i++)
        {?>
       <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" <?php if($i==0) { ?>class="active"<?php } ?>></li>
      <?php } ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php
        for($i=0;$i<count($bannerlist);$i++)
        {?>
      <div class="item <?php if($i==0) { ?> active <?php } ?>">
        <a href="<?php echo $bannerlist[$i]->link; ?>"><img src="images/banners/<?php echo $bannerlist[$i]->imagename; ?>" alt="BSS" style="width:100%; height:165px"></a>
      </div>
      <?php } ?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>