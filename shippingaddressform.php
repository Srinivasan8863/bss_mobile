<h3>Shipping Address</h3>
<p>Shipping Address and billing address should be same.</p>
<div class="row">
    <div class="col-sm-10">
    <form name="shippingaddress" class="form-validate" action="shippingaddressprocess.php" method="post">
        <input type="hidden" name="previous" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
        <input type="hidden" name="current" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <div class="from-group">
            <label for="firstname"><strong style="color: red;">*</strong>First Name</label>
            <input  name="firstname" type="text" class="form-control field-validate" id="firstname" placeholder="Please enter your first name" value="<?php echo $_SESSION["shipping_username"]; ?>">
            <span class="form-text text-muted error-content" hidden>Please enter your name.</span>
        </div>

        <div class="from-group">
            <label for="address1"><strong style="color: red;">*</strong>Address 1</label>
            <textarea  name="address1" type="text" class="form-control address-validate" id="address1" placeholder="Enter Your Address"><?php echo trim($_SESSION["shipping_address1"]); ?>
            </textarea>
            <span class="form-text text-muted error-content" hidden>Please enter your  address</span>
        </div>
        
       <div class="from-group">
            <label for="city"><strong style="color: red;">*</strong>City</label>
            <input  name="city" type="text" class="form-control city-validate" id="city" placeholder="Enter Your City" value="Chennai" readonly>
            <span class="form-text text-muted error-content" hidden>Please enter your city</span>
        </div>

        <div class="from-group">
            <label for="state"><strong style="color: red;">*</strong>State</label>
            <input  name="state" type="text" class="form-control state-validate" id="state" placeholder="Enter Your State" value="Tamil Nadu" readonly>
            <span class="form-text text-muted error-content" hidden>Please enter your state</span>
        </div>
        
        <div class="from-group">
            <label for="pincode"><strong style="color: red;">*</strong>Pincode</label>
            <input  name="pincode" type="text" class="form-control pincode-validate" id="pincode" placeholder="Enter Your pincode" value="<?php echo $_SESSION["shipping_pincode"]; ?>">
           <span class="form-text text-muted error-content" hidden>Please enter your pincode</span>
        </div>
        <div class="from-group">
            <label for="email">Email Address</label>
            <input  name="email" type="email" class="form-control email-validate" id="email" placeholder="Enter Your Email Address" value="<?php echo $_SESSION["shipping_email"]; ?>">
            <span class="form-text text-muted error-content" hidden>Please enter your valid email address</span>
        </div>
        <div class="from-group">
            <label for="mobile"><strong style="color: red;">*</strong>Phone Number</label>
            <input  name="mobile" type="text" class="form-control mobile-validate" id="mobile" placeholder="Please enter your valid mobile number" value="<?php echo $_SESSION["shipping_mobile"]; ?>">
            <span class="form-text text-muted error-content" hidden>Please enter your valid mobile number</span>
        </div>

        <div class="from-group pull-right" style="margin-top: 5px;">
            <button type="submit"class="btn btn-primary">Continue</button>

		</div>
	</form>
    </div>
</div>