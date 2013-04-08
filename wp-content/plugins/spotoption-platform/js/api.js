//var $j = jQuery.noConflict();

var Api = {
	visitorIp : null ,
	visitorCountry : null ,
	visitorCountryId : null ,
	visitorPrefix : null ,
	countryBlocked : false,
	regAllowrd : true,
	countryObject : null,
	apiUrl : SiteSettings.apiUrl ,
	
	init: function () 
	{
		this.getCustomerDetails();
		$('form.loginForm').submit(function(){Api.loginSubmit(); return false;});
		this.getGeoData();
                this.getReutersTicker();
	},	
	
	/***
	*	Function 		: 	getGeoData
	*	Functionality 	: 	Retrive the user GeoLocation settings
	*	Parameters		: 	None
	*	Requries		: 	None
	*
	***/	
	getGeoData : function ()
	{
		$.ajax({
			url: 'http://'+SiteSettings.ajaxCallBack+'/RPCWP/visitorData',
			type: "POST",
			dataType : 'json',
			xhrFields: {
				withCredentials: true
			},
			crossDomain : true,
			success: function(result){			
				Api.visitorIp = result.ip ;
				Api.visitorCountry = result.country;
				Api.countryBlocked = result.countryBlocked;
				Api.regAllowrd = result.regAllowrd;
				
				}
		});
	},
	
	/***
	*	Function 		: 	getReutersTicker
	*	Functionality 	: 	Retrive the Reuters Ticker
	*	Parameters		: 	None
	*	Requries		: 	None
	*
	***/	
	getReutersTicker : function (){
		$.ajax({
			url: 'http://'+SiteSettings.ajaxCallBack+'/RPCWP/getJsonFile/LastOptions.json',
			type: "POST",
			dataType : 'json',
			xhrFields: {
				withCredentials: true
			},
			crossDomain : true,
			success: function(result){
				// console.log(result);
                            var marquee = '<marquee id="reuters" behavior="scroll" scrollamount="3" direction="left" width="350" >' ;
                             var Container = $('#HeaderNews #marqueeTopParent');
                             $.each(result,  function( key, asset){
                                 if(asset.color == 1)
                                 marquee +='<span id="call">'+ '  ' + asset.assetName + ' '  + asset.endRate + ' ' + asset.endDate +'</span>';
                                 else
                                 marquee +='<span id="put">' + asset.assetName + ' '  + asset.endRate + ' ' + asset.endDate +'</span>';    
                             });
                             marquee += '</marquee>';
                             $(Container).append(marquee);
                             
			}
		});
	
	
	
	},
	
	/***
	*	Function 		: 	buildPersonalHeader
	*	Functionality 	: 	Updates the login area
	*	Parameters		: 	user object
	*	Requries		: 	User must me loggedin | getCustomerDetails()
	*
	***/		
	buildPersonalHeader : function(user) 
	{	
		var logedin = $('#loggedInBox');
		logedin.find('div.welcome').text(user.FirstName + ' ' + user.LastName).end()
				.find('div.balance').text(user.accountBalance + ' ' + user.currency).end();
		logedin.removeClass('hidden');
               
		$('#userLoginForm').remove();
                if(window.customAfterLogin)
                        customAfterLogin();
               
                
	},
	
	/***
	*	Function 		: 	getCustomerDetails
	*	Functionality 	: 	Retrive the user object from the server
	*	Parameters		: 	None
	*	Requries		: 	User must me loggedin 
	*
	***/
	getCustomerDetails : function() 
	{ 
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
					document.cookie = 'customerId=0; expires=Fri, 27 Jul 2001 02:47:11 UTC; path=/';
					return false;
					}
				else{
					document.cookie ="customerId="+ result.id + ";path=/";				
					Api.buildPersonalHeader(result);
					}
			}
		});
	},
		
	/***
	*	Function 		: 	loginSubmit
	*	Functionality 	: 	Login the user to the system
	*	Parameters		: 	None
	*	Requries		: 	Login Form
	*
	***/	
	loginSubmit : function() 
	{ 
		$.ajax({
			url: 'http://'+SiteSettings.ajaxCallBack+'/Login/login/true',
			type: "POST",
			data: $('form.loginForm').serialize(),
			xhrFields: {
				withCredentials: true
			},
			crossDomain : true,
			success: function(data){
				if(data == "Login Params False")
					alert('Incorrect user name or password');
				else{
					Api.getCustomerDetails();
				
				}
				
				

			}
		});
	},
	
	/***
	*	Function 		: 	localizedAJAX
	*	Functionality 	: 	Gets the loacl data from the server.
	*	Parameters		: 	None
	*	Requries		: 	Api.getGeoData()
	*
	***/
	
	localizedAJAX : function() { 
		$.ajax({
			url: 'http://'+SiteSettings.ajaxCallBack+'/RPCWP/getlocalData',
			type: "POST",
			dataType : 'json',
			xhrFields: {
				withCredentials: true
			},
			crossDomain : true,
			success: function(result){
					//console.log(result.currencies);
			}
		});
	},
	
	/***
	*	Function 		: 	getCountries
	*	Functionality 	: 	Gets the country list from the server and update the country dropDowns
	*	Parameters		: 	None
	*	Requries		: 	Api.getGeoData()
	*
	***/
	getCountries : function () { 
		var urlCountry = 'http://'+SiteSettings.ajaxCallBack+'/RPCWP/getJsonFile/Countries.json';
		 $.ajax({
			url: urlCountry,
			type: "POST",
			dataType : 'json',
			xhrFields: {
				withCredentials: true
			},
			crossDomain : true,
			success: function(result){
				var selected = null;
				var container = $('select.countrylist');
				container.children('option').remove();	
				Api.countryObject = result;
				$.each(result, function(key, country){
					if (country.iso == Api.visitorCountry){
						Api.visitorCountryId = country.id;
						$('form#needHelp input[name="prefix"]').val(country.prefix);
						}
					var html = '<option value="'+country.id+'" prefix="'+country.prefix+'" >'+country.name+'</option>';
					container.append(html);
			   })
			   
			   container.val(Api.visitorCountryId);
			   if(typeof $('input[name="Prefix"]') == 'object')
					$('input[name="Prefix"]').val($('form#needHelp select :selected').attr('prefix'));
			   if(typeof $('input[name="phone_prefix"]') == 'object')
					$('input[name="phone_prefix"]').val($('select#country :selected').attr('prefix'));
			   
			}
		});
	} 
}
$(document).ready(function() {	
	Api.init();
	if(!isNaN($('#so_container')))
		SpotOption.load("#so_container", 'en');

	
}); 
function setIframeSize(width, height) { $('#Trade').css({ width: width, height: height }); }
