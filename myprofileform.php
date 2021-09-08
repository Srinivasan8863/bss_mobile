<div class="row">
    <div class="col-sm-10">
    <form name="signup" class="profile-validate" action="updateprofile.php" method="post">
        <input type="hidden" name="previous" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
        <input type="hidden" name="current" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <div class="from-group">
            <label for="firstname"><strong style="color: red;">*</strong>First Name</label>
            <input  name="firstname" type="text" class="form-control field-validate" id="firstname" placeholder="Please enter your first name" value="<?php echo $myprofile[0]->first_name; ?>">
            <span class="form-text text-muted error-content" hidden>Please enter your name.</span>
        </div>

        <div class="from-group">
            <label for="email">Email Address</label>
            <input  name="email" type="email" class="form-control email-validate" id="email" placeholder="Enter Your Email Address" value="<?php echo $myprofile[0]->email; ?>">
            <span class="form-text text-muted error-content" hidden>Please enter your valid email address</span>
        </div>
        
        <div class="from-group">
            <label for="mobile"><strong style="color: red;">*</strong>Phone Number</label>
            <input  name="mobile" type="text" class="form-control mobile-validate" id="mobile" placeholder="Please enter your valid mobile number" value="<?php echo $myprofile[0]->phone; ?>">
            <span class="form-text text-muted error-content" hidden>Please enter your valid mobile number</span>
        </div>
 
        <div class="from-group">
            <button type="submit" id="update" pattern="[1-9]{4}" class="btn btn-primary" style="margin-top:5px;">Update</button>

		</div>
	</form>
    </div>
</div>