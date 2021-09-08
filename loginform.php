<?php
$cart_array=cart();
?>
<h4>LOGIN</h4>
<div class="row">
    <div class="col-sm-10">
    <form class="form-validate-login" action="processlogin.php" method="post">
        <input type="hidden" name="previous" value="<?php if(isset($_SERVER['HTTP_REFERER'])) echo $_SERVER['HTTP_REFERER']; ?>">
        <input type="hidden" name="current" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <div class="from-group">
            <label for="phone">Phone Number</label>
            <input name="phone" type="text" class="form-control phone-validate" id="phone" placeholder="Please enter your valid phone number." value="">
            <span class="form-text text-muted error-content" hidden="">Please enter your valid phone number.</span>
        </div>
        <div class="from-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password-login" placeholder="Please Enter Password" class="form-control password-login">
            <span class="form-text text-muted error-content" hidden="">This field is required.</span>
        </div>
        <button type="submit" style="margin-top:20px;margin-left: 15px;" class="btn btn-primary">Login</button>
        <a href="forgotpassword.php"  style="margin-top:20px;margin-left: 15px;" class="btn btn-link">Forgot Password</a>
    </form>
    <?php 
    if(!isset($_SESSION["customer_id"]) && count($cart_array)>0 ){?>
    <p style="text-align:center; margin-top:30px;">
        <strong> OR</strong>
    </p>
    <a href="guestcheckout.php" type="button" class="btn btn-primary col-sm-12">Guest Checkout</a>
    <?php } ?>
    </div>
</div>