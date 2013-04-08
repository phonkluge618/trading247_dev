//var $j = jQuery.noConflict();
$(document).ready(function() {	
	Api.getCountries();
	$('input[name="Prefix"]').val($('form#needHelp select :selected').attr('prefix'));
	$('form#needHelp input[type="text"]').focus(function(){if ( this.value == $(this).attr('default')) this.value = ''});
	$('form#needHelp input[type="text"]').blur(function(){if (this.value == '') this.value = $(this).attr('default')});	
	$('form#needHelp select').change(function(){$('input[name="Prefix"]').val($('option:selected', this).attr('prefix'));});
	
}); 

jQuery.validator.addMethod("notEqual", function(value, element, param) {
  return this.optional(element) || value != param;
}, "Please specify a different (non-default) value");



$('#needHelp').validate({
                
                    rules: {
                        FirstName:{ 
							required : true, 
							notEqual: "First Name" 
							},
                        LastName: {
							required  : true,
							notEqual: "Last Name" 
							},
                        email: {
                            required: true,
                            email: true
                        }
                        
                    },
                    messages: {
                        FirstName: "Please enter your firstname",
                        LastName: "Please enter your lastname",
                        email: "Please enter a valid email address"
                       
                    },
                    errorPlacement: function(error, element) {
                        element.css('border','1px solid red');
						$('form#needHelp div.errors').append(error);
                        
                    },
                
                    submitHandler: function(form) { 
                        $('.error').remove();
                        $.ajax({
                            url: 'http://'+SiteSettings.ajaxCallBack+'/openAccount/wpRegister',
                            type: "POST",
                            data: $('#needHelp').serialize(),
                            xhrFields: {
                                withCredentials: true
                            },
                            crossDomain : true,
                            success: function(data){
                                console.log(data);
                                var response = eval("(" + data + ")");
								console.log(response);
								
                                if(response == "leadCreated"){										
										form.submit();
									}
                                if (response.errors){
									alert(response.errors);
									}
									

                            }
                        });
                    }
                
                
	


});