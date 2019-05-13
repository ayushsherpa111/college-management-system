<script type="text/javascript">
	$(document).ready(function(){
		$('.admin-form').on('submit',function(e){
			e.preventDefault();
			var oldPassword = $('.admin-form #pass-old').val();
	  		var newPassword = $('.admin-form #pass-new').val();
	  		var confirmPassword = $('.admin-form #pass-confirm').val();
	  		$.post($(this).attr('action'),{
	  			old:oldPassword,
	  			new:newPassword,
	  			confirm:confirmPassword
	  		},function(data){
	  			if (data == 'match') {
	  				$('#changeResult').html('The password you entered donot match');
	  				$('#changeResult').css('color','#ff0000');
	  			}else if (data == 'old') {
	  				$('#changeResult').html('Your old password is incorrect');
	  				$('#changeResult').css('color','#ff0000');
	  			}else {
	  				$('#changeResult').html('Password Changed');
	  				$('#changeResult').css('color','#33AA11');
	  				$('.admin-form').find('input[name="oldPassword"]').val('');
	  				$('.admin-form').find('input[name="newPassword"]').val('');
	  				$('.admin-form').find('input[name="confirmPassword"]').val('');
	  			}
	  		});
		});

		//file check
		$("#profileChange #profile").change(function() {
		        var file = this.files[0];
		        var imagefile = file.type;
		        var match= ["image/jpeg","image/png","image/jpg"];
		        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
		        	$('#profileChangeResult').html('Invalid File Type. Please choose (JPEG/JPG/PNG) type file');
		        	$('#profileChangeResult').css('color','#ff0000');
		            $("#profileChange #profile").val('');
		            return false;
		        }else{
		        	$('#profileChangeResult').html('');
		        }
		    });

		    $('#profileChange').on('submit',function(e){
		    	e.preventDefault();
		    	var imageData = new FormData();
		    	var image = document.getElementById('profile').files[0];
		    	imageData.append('pic',image);
		    	$.ajax({
		    		url:$(this).attr('action'),
					type:'POST',
					data : imageData,
					contentType: false,
			        cache: false,
			        processData:false,
					beforeSend:function(){
					},
					success:function(data,success){
						var back = '../../';
						var image = back.concat(data);
						$('#displayProfile').attr('src',image);
						$("#profileChange #profile").val('');
					}
		    	});
		    });
	});
</script>
<h2>Change your Password</h2>
<aside>
	<form action="../php/password.php" method="POST" class="admin-form">
			<div class="form-element">
				<label>Old Password</label>
				<input type="text" name="oldPassword" id="pass-old" required>
			</div>
			<div class="form-element">
				<label>New Password</label>
				<input type="password" name="newPassword" id="pass-new" required>
			</div>
			<div class="form-element">
			<label>Confirm Password</label>
				<input type="password" name="confirmPassword" id="pass-confirm" required>
			</div>
			<input type="submit" name="changePassword" value="Change Password">
	</form>
	<span id="changeResult"></span>
	<br>
	<br>
	<br>
	<br>
	<h2>Change Profile Picture</h2>
	<span id="profileChangeResult"></span>
	
	<form action="../php/changeProfilePic.php" id="profileChange" method="POST" enctype="multipart/form-data">
		<label>Select a Picture : </label>
		<input type="file" name="profilePic" id="profile" required>
		<input type="submit" name="" value="Change Profile">
	</form>
</aside>