//var $j = jQuery.noConflict();

var Info = {
	init : function()
	{
		this.getUserIngo();
		Api.getCountries();
	
	},
	
	getUserIngo : function(){ 
		$.ajax({
			url: 'http://'+SiteSettings.ajaxCallBack+'/RPCWP/getCustomerDetails',
			type: "POST",
			dataType : 'json',
			xhrFields: {
				withCredentials: true
			},
			crossDomain : true,
			success: function(result){
				if(result =='notLoggedIn'){
					window.location = SiteSettings.mainSite;
					}
				else{
						$('tr.mail input').val(result.email);
						$('tr.Fname td.info').text(result.FirstName);
						$('tr.Lname td.info').text(result.LastName);
						$('tr.Curr td.info').text(result.currency);						
						$('tr.phone input').val(result.Phone);						
					}
			}
		});
	},
	

}

$(document).ready(function(){
	Info.init();
	
});

$('#mainInfo').validate({
	rules: {
		email : { required: true,  email: true },
		Phone	: { required: true ,  minlength: 6}		
		},
	messages: {
		Phone :	{
			required	:	'You must enter your Phone Number',
			minlength	: 	"Your password must be at least 6 characters long",
			},
		email 	: {
			required	: 'You must enter email address',
			email		: "Email address is invalid",
			},
		
		},
	errorPlacement: function(error, element) {
		element.css('border','1px solid red');
		element.parent().parent().find('td.errors').append(error);
	},
	submitHandler: function() { 
		
		$.ajax({
			url:'https://'+SiteSettings.ajaxCallBack+'/MyAccount/personalDetails/true',
			type: "POST",
			data: $('#mainInfo').serialize(),
			xhrFields: {
				withCredentials: true
				},
			crossDomain : true,
			success: function(data){
				var response = eval("(" + data + ")");
				if(response.errors ){
					var errors = '';
					$.each(response.errors, function(key, error){ errors += error + "\r\n"});
					alert(errors);
					return;
					
				}
				
				alert('Your information changed successfully');
				
			}
			});
	},

});

$('.passwordForm').validate(
{
	rules: {
		oldPassword : { required: true },
		password	: { required: true ,  minlength: 6},
		repeatPassword	: { required: true ,  minlength: 6,  equalTo: 'input[name="repeatPassword"]'},
		},
	messages: {
		oldPassword : 'You must enter your password',
		password 	: {
			required	: 'You must enter a password',
			minlength	: "Your password must be at least 6 characters long",
			},
		repeatPassword :	{
			required	: 'You must enter a password',
			minlength	: "Your password must be at least 6 characters long",
			equalTo		: 'Passwords does not match'
			},
		},
	errorPlacement: function(error, element) {
		element.css('border','1px solid red');
		element.parent().parent().find('td.desc').append(error);
	},
	submitHandler: function() { 
		
		$.ajax({
			url:'https://'+SiteSettings.ajaxCallBack+'/MyAccount/personalDetails/true',
			type: "POST",
			data: $('.passwordForm').serialize(),
			xhrFields: {
				withCredentials: true
				},
			crossDomain : true,
			success: function(data){
				var response = eval("(" + data + ")");
				if(response.errors ){
					var errors = '';
					$.each(response.errors, function(key, error){ errors += error + "\r\n"});
					alert(errors);
					return;
					
				}
				
				alert('Your information changed successfully');
				
			}
			});
	},
	  
});