<?php
$filename=basename($_SERVER["REQUEST_URI"], ".php").".php";
?>
<nav role="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">BSS</a>
        </div>
        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse" data-toggle="collapse" data-target="#navbarCollapse">
            <ul class="nav navbar-nav">
                <li <?php if($filename=="index.php") { ?>class="active"<?php } ?>><a href="index.php">Home</a></li>
                <li <?php if($filename=="myprofile.php") { ?>class="active"<?php } ?>><a href="myprofile.php">Profile</a></li>
            </ul>
            <!--<ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Cart</a></li>
            </ul>-->
        </div>
    </div>
</nav>
<div style="padding-top:80px;"></div>