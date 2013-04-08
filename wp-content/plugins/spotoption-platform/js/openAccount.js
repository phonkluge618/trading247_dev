//var $j = jQuery.noConflict();
  // -----------------------------------------------------  OPEN ACCOUNT ---------------------------------------------- 
 
$(document).ready(function() {	 
				
				updateCurrencies();
				Api.getCountries();
				$('select#country').change(function(){
					$('input.prefix').val($('option:selected', this).attr('prefix'));
				});
                $('#accountForm').validate({
                
                    rules: {
                        FirstName: "required",
                        LastName: "required",
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                            minlength: 5
                        },
                        repeatPassword: {
                            required: true,
                            minlength: 5,
                            equalTo: "#realPassConfirm"
                        },
                        acceptTerms: "required"
                    },
                    messages: {
                        FirstName: "Please enter your firstname",
                        LastName: "Please enter your lastname",
                        email: "Please enter a valid email address",
                        password: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 5 characters long"
                        },
                        repeatPassword: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 5 characters long",
                            equalTo: "Passwords must match"
                        },
                        acceptTerms: "Please accept our Terms"
                    },
                    errorPlacement: function(error, element) {
                        element.css('border','1px solid red');
						element.parent().parent().find('td.errors').append(error);
                        //$(error).insertAfter(element);
                    },
                
                    submitHandler: function() { 
                        $('.error').remove();
                        $.ajax({
                            url: 'http://'+SiteSettings.ajaxCallBack+'/openAccount/wpRegister',
                            type: "POST",
                            data: $('#accountForm').serialize(),
                            xhrFields: {
                                withCredentials: true
                            },
                            crossDomain : true,
                            success: function(data){
                                
                                var response = eval("(" + data + ")");
                                if(response == "newCustomerRegistered"){										
										window.location = SiteSettings.mainSite+"/thank-you/";
									}
                                if (response.errors){
									
									$(".captchaImage").attr("src", "http://"+SiteSettings.ajaxCallBack+"/captcha");
								
                                    $.each(response.errors, function(index, value) { 
                                        var  error= '<span class="error" style="color: red">'+value+'</span>';
                                        var element = $("input[name='" +index+ "']");
                                        element.css('border','1px solid red');
                                        element.after(error)
                                    });
									}

                            }
                        });
                    }
                
                });     
}); 


function updateCurrencies() { 
		$.ajax({
			url: 'http://'+SiteSettings.ajaxCallBack+'/RPCWP/getlocalData',
			type: "POST",
			dataType : 'json',
			xhrFields: {
				withCredentials: true
			},
			crossDomain : true,
			success: function(result){
				var container = $('select#currency');
				container.children('option').remove();
				$.each(result.currencies, function(key, currency){					
					var html = '<option value="'+key+'">'+currency.name+'</option>';
					container.append(html);
				})
			}
		})
	}


