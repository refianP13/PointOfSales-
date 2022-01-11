// JavaScript Document
	
	$(document).ready(function(){
		$("#login").click(function(){
			
			var action = $("#lg-form").attr('action');
			var form_data = {
				username: $("#username").val(),
				password: $("#password").val(),
				is_ajax: 1
			};
			
			$.ajax({
				type: "POST",
				url: action,
				data: form_data,
				success: function(response)
				{
					if(response == "success")
						$("#lg-form").slideUp('slow', function(){
							$("#message").html('<p class="success">You have logged in successfully!</p><p>Redirecting....</p>');
							window.location='index.php';
						});
					else
						$("#message").html('<p class="error">username dan password tidak sesuai.</p>');
				}	
			});
			return false;
		});
	});