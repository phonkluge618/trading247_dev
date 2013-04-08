//var $j = jQuery.noConflict();

var genaral ={
    
    
    init: function(){
       
       $('.widget_login_widget .loginForm input:text').bind('focus', {}, genaral.onTextFieldFocus);
       $('.widget_login_widget .loginForm input:text').bind('blur', {}, genaral.onTextFieldBlur);
       $('.search .searchStringBg input:text').bind('focus', {}, genaral.onTextFieldFocus);
       $('.search .searchStringBg input:text').bind('blur', {}, genaral.onTextFieldBlur);
    },
    customAfterLogin: function(){
                $('#menu-item-267').removeClass('hidden');
                $('#menu-item-99').addClass('hidden');
                $('#headerForm').removeClass('log');
                $('#headerForm').addClass('login');
    },
    
    onTextFieldFocus: function(event){
                var field = $(event.target);
		var value = $.trim(field.val());
		if(value == field.attr('default')) field.val('');
		
    },
    
    onTextFieldBlur: function(event){
		var field = $(event.target);
		var value = $.trim(field.val());
		if(value == '') field.val(field.attr('default'))
    }
}
    

$(document).ready(function() { 
	genaral.init();
  
});
	



