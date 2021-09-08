<!DOCTYPE html>
<?php
@include("includes/config.php");
if($_SESSION["customer_id"]=="" && !isset($_SESSION["guest_id"]))
{
    header("Location: login.php");
}
$myorders=getMyOrders();
$myprofile=getMyProfile();
?>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.js"></script>
        <title> BSS</title>
        <style>
        label{margin-bottom:5px;margin-top:5px;}
    </style>
    </head>
<body>
<?php @include("header.php"); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php @include("sidebar.php"); ?>
            </div>
            <div class="col-sm-9">
                <div class="heading">
                  <h2>Change Password</h2>
                  <hr>
                </div>
                <form name="updateMyPassword" class="form-validate" id="updateMyPassword" action="updatepassword.php" method="post">
                        <div class="from-group">
                          <label for="current_password">Current Password</label>
                          <input name="current_password" type="password" class="form-control field-validate" id="current_password" placeholder="Current Password">
                        </div>
                        
                        <div class="from-group">
                          <label for="password">New Password</label>
                          <input name="new_password" type="password" class="form-control password" id="new_password" placeholder="New Password">
                        </div>

                        <div class="from-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input name="confirm_password" type="password" class="form-control password" id="confirm_password" placeholder="New Password">
                        </div>

                        <div class="alert alert-danger" hidden style="margin:5px;" hidden="" id="passowrd-error" role="alert">
                        </div>

                          <div class="col-sm-12" style="margin-top:5px;">
                              <button type="submit" class="btn btn-primary">Update</button>                            
                          </div>
                      </form>
            </div>
    </div>
 <br>
 <br>
 <script>
     //focus form field
jQuery(document).on('keyup focusout change', '.field-validate', function(e){
	if(this.value == '') {
		jQuery(this).css('border-color', 'red');
        message="Please fill this field";
        jQuery('#passowrd-error').text(message);
		jQuery('#passowrd-error').removeAttr('hidden');
	}else{
		jQuery(this).css('border-color', '#dee2e6');
		jQuery('#passowrd-error').attr('hidden', true);
	}
});
//change password
jQuery(document).on('submit', '#updateMyPassword', function(e){
  //passowrd-error
  var confirm_password = jQuery("#confirm_password").val();
  var new_password = jQuery('#new_password').val();
  var current_password = jQuery('#current_password').val();
  jQuery('#passowrd-error').attr('hidden', true);
      
  if(confirm_password !='' && new_password != '' && current_password !=''){
    if(new_password.length < 6){
      message = "Please enter at least 6 characters.";
      jQuery('#passowrd-error').text(message);
      jQuery('#passowrd-error').removeAttr('hidden');
      return false;
    }
    
    if(confirm_password == new_password){
      return true;
    }else{
      message = "New and confirm password does not match.";
      jQuery('#passowrd-error').text(message);
      jQuery('#passowrd-error').removeAttr('hidden');
      return false;
    }
    
  }else{
    message = "Please fill all the input fields.";
    jQuery('#passowrd-error').text(message);
    jQuery('#passowrd-error').removeAttr('hidden');
    return false;
  }

});
</script>
</body>
</html>