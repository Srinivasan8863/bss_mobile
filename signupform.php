<h4>NEW CUSTOMER</h4>
<div class="row">
    <div class="col-sm-10">
    <form name="signup" class="form-validate" action="signupprocess.php" method="post">
        <input type="hidden" name="previous" value="<?php if(isset($_SERVER['HTTP_REFERER'])) echo $_SERVER['HTTP_REFERER']; ?>">
        <input type="hidden" name="current" value="<?php  if(isset($_SERVER['REQUEST_URI'])) echo $_SERVER['REQUEST_URI']; ?>">
        <div class="from-group">
            <label for="firstname"><strong style="color: red;">*</strong>First Name</label>
            <input  name="firstname" type="text" class="form-control field-validate" id="firstname" placeholder="Please enter your first name" value="">
            <span class="form-text text-muted error-content" hidden>Please enter your name.</span>
        </div>

        <div class="from-group">
            <label for="email">Email Address</label>
            <input  name="email" type="email" class="form-control email-validate" id="email" placeholder="Enter Your Email Address" value="">
            <span class="form-text text-muted error-content" hidden>Please enter your valid email address</span>
        </div>
        
        <div class="from-group">
            <label for="password"><strong style="color: red;">*</strong>Password</label>
            <input name="password" id="password" type="password" class="form-control password"  placeholder="Please enter your password">
            <span class="form-text text-muted error-content" hidden>Please enter your password</span>
        </div>

        <div class="from-group">
            <label for="re_password"><strong style="color: red;">*</strong>Confirm Password</label>
            <input type="password" class="form-control re-password" id="re_password" name="re_password" placeholder="Enter Your Password">
            <span class="form-text text-muted error-content" hidden>Please re-enter your password.</span>
            <span class="form-text text-muted re-password-content" hidden>Both passwords do not match.</span>
        </div>

        <div class="from-group">
            <label for="mobile"><strong style="color: red;">*</strong>Phone Number</label>
            <input  name="mobile" type="text" class="form-control mobile-validate" id="mobile" placeholder="Please enter your valid mobile number" value="">
            <span class="form-text text-muted error-content" hidden>Please enter your valid mobile number</span>
        </div>

            <br><br>
        <div class="from-group">
            <button type="submit" id="createaccount" class="btn btn-primary">Create an Account</button>

		</div>
	</form>
    </div>
</div>
<br><br>