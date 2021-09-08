<!DOCTYPE html>
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
<?php
@include("includes/config.php");
@include("header.php");
?>

<div class="container" style="padding-top:80px;">
    <div class="row">
        <div class="col-sm-6">
            <?php include("loginform.php"); ?>
        </div>
        <div class="col-sm-6">
            <?php include("signupform.php"); ?>
        </div>
    </div>
</div>
<script>

jQuery(document).on('keyup focusout', '.phone-validate', function(e)
{

    if(this.value == '' || isNaN(this.value) || this.value.length < 10) {
        jQuery(this).css('border-color', 'red');
        jQuery(this).parents(".input-group").addClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
        jQuery(this).next(".error-content").removeAttr('hidden');
    }
    else
    {
        jQuery(this).css('border-color', '#dee2e6');
        jQuery(this).parents(".input-group").removeClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
        jQuery(this).next(".error-content").attr('hidden', true);
    }
});

jQuery(document).on('keyup focusout', '.password-login ', function(e)
{
	var regex = "^\\s+$";
	if(this.value == '' )
    {
		jQuery(this).css('border-color', 'red');
		jQuery(this).parents(".input-group").addClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
		jQuery(this).next(".error-content").removeAttr('hidden');
	}
    else
    {
		jQuery(this).css('border-color', '#dee2e6');
		jQuery(this).parents(".input-group").removeClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
		jQuery(this).next(".error-content").attr('hidden', true);
	}
});

//validate form
jQuery(document).on('submit', '.form-validate-login', function(e){
var error = "";
jQuery(".phone-validate").each(function() {
    if(this.value == '' || isNaN(this.value) || this.value.length < 10) {
        jQuery(this).css('border-color', 'red');
        jQuery(this).parents(".input-group").addClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
        jQuery(this).next(".error-content").removeAttr('hidden');
        error = "has error";
    }
    else
    {
        jQuery(this).css('border-color', '#dee2e6');
        jQuery(this).parents(".input-group").removeClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
        jQuery(this).next(".error-content").attr('hidden', true);
    }
});
jQuery(".password-login").each(function() {
	if(this.value == '') {
		jQuery(this).css('border-color', 'red');
		jQuery(this).parents(".input-group").addClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
		jQuery(this).next(".error-content").removeAttr('hidden');
		error = "has error";
	}else{
		jQuery(this).css('border-color', '#dee2e6');
		jQuery(this).parents(".input-group").removeClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
		jQuery(this).next(".error-content").attr('hidden', true);
	}

});


	if(error=="has error"){
		return false;
	}
});



jQuery(document).on('keyup focusout', '.mobile-validate', function(e)
{

    if(this.value == '' || isNaN(this.value) || this.value.length < 10) {
        jQuery(this).css('border-color', 'red');
        jQuery(this).parents(".input-group").addClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
        jQuery(this).next(".error-content").removeAttr('hidden');
    }
    else
    {
        jQuery(this).css('border-color', '#dee2e6');
        jQuery(this).parents(".input-group").removeClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
        jQuery(this).next(".error-content").attr('hidden', true);
    }
});

//match password
jQuery(document).on('keyup focusout', '.re-password', function(e){
	var regex = "^\\s+$";//    alert("hai");
	if(this.value == '' || this.value!=jQuery("#password").val()) {
		jQuery(this).css('border-color', 'red');
		jQuery(this).parents(".input-group").addClass('has-error');
        jQuery(".re-password-content").css('color', 'red');
        jQuery(".re-password-content").removeAttr('hidden');
	}else{
		jQuery(this).css('border-color', '#dee2e6');
		jQuery(this).parents(".input-group").removeClass('has-error');
        jQuery(".re-password-content").css('color', 'red');
		jQuery(".re-password-content").attr('hidden', true);
	}
});

jQuery(document).on('keyup focusout', '.email-validate', function(e){
	var validEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

	if(this.value != '' && validEmail.test(this.value)) {
		jQuery(this).css('border-color', '#dee2e6');
		jQuery(this).parents(".input-group").removeClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
		jQuery(this).next(".error-content").attr('hidden', true);
	}else{
		jQuery(this).css('border-color', 'red');
		jQuery(this).parents(".input-group").addClass('has-error');
        jQuery(this).next(".error-content").css('color', 'red');
		jQuery(this).next(".error-content").removeAttr('hidden');
		error = "has error";
	}

});

//validate form
jQuery(document).on('submit', '.form-validate', function(e){
var error = "";
jQuery(".field-validate").each(function() {
		if(this.value == '') {
			jQuery(this).css('border-color', 'red');
			jQuery(this).parents(".input-group").addClass('has-error');
            jQuery(this).next(".error-content").css('color', 'red');
			jQuery(this).next(".error-content").removeAttr('hidden');
			error = "has error";
		}else{
			jQuery(this).css('border-color', '#dee2e6');
			jQuery(this).parents(".input-group").removeClass('has-error');
            jQuery(this).next(".error-content").css('color', 'red');
			jQuery(this).next(".error-content").attr('hidden', true);
		}
});

/*jQuery(".email-validate").each(function() {
		var validEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		if(this.value != '' && validEmail.test(this.value)) {
			jQuery(this).css('border-color', '#dee2e6');
			jQuery(this).parents(".input-group").removeClass('has-error');
            jQuery(this).next(".error-content").css('color', 'red');
			jQuery(this).next(".error-content").attr('hidden', true);
		}else{
			jQuery(this).css('border-color', 'red');
			jQuery(this).parents(".input-group").addClass('has-error');
            jQuery(this).next(".error-content").css('color', 'red');
			jQuery(this).next(".error-content").removeAttr('hidden');
			error = "has error";
		}
	});
*/
var check = 0;
jQuery(".password").each(function() {
		var regex = "^\\s+$";
		if(this.value.match(regex)||this.value=='') {
			jQuery(this).css('border-color', 'red');
			jQuery(this).parents(".input-group").addClass('has-error');
            jQuery(this).next(".error-content").css('color', 'red');
			jQuery(this).next(".error-content").removeAttr('hidden');
			error = "has error";
		}else{
			if(check == 1){
				 var res = passwordMatch();

					if(res=='matched'){
						jQuery(this).css('border-color', '#dee2e6');
						jQuery('.password').parents(".input-group").removeClass('has-error');
                        jQuery(".re-password-content").css('color', 'red');
						jQuery('.re-password-content').attr('hidden', true);
					}else if(res=='error'){
						jQuery(this).css('border-color', 'red');
						jQuery('.password').parents(".input-group").addClass('has-error');
                        jQuery(".re-password-content").css('color', 'red');
						jQuery('.re-password-content').removeAttr('hidden');
						error = "has error";
					}
				}else{
					jQuery(this).css('border-color', '#dee2e6');
					jQuery(this).parents(".input-group").removeClass('has-error');
                    jQuery(this).next(".error-content").css('color', 'red');
					jQuery(this).next(".error-content").attr('hidden', true);
				}
				 check++;
			}

});

    jQuery(".mobile-validate").each(function() {
		if(this.value == '' || isNaN(this.value) || this.value.length < 10) {
			jQuery(this).css('border-color', 'red');
			jQuery(this).parents(".input-group").addClass('has-error');
            jQuery(this).next(".error-content").css('color', 'red');
			jQuery(this).next(".error-content").removeAttr('hidden');
			error = "has error";
		}else{
			jQuery(this).css('border-color', '#dee2e6');
			jQuery(this).parents(".input-group").removeClass('has-error');
            jQuery(this).next(".error-content").css('color', 'red');
			jQuery(this).next(".error-content").attr('hidden', true);
		}

	});
	if(error=="has error"){
		return false;
	}
});
</script>

</body>
</html>