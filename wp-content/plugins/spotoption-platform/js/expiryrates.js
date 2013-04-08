//var $j = jQuery.noConflict();

var ExpiryRate = {
	
	init : function(){
		$('input[name="endDate"]').jdPicker({ 
			 date_format:"YYYY-mm-dd", 
		});
		this.getAssetsDropDown();
		this.getFiltered();
		$('#endDate').change(function(){ExpiryRate.getFiltered()});
		$('#assetType').change(function(){ExpiryRate.getFiltered()});
	},
	
	/***
		Function name	: 	getAssetsDropDown
		Params			:	None
		Functionality	:	Retrive and populate the assets dropdown	
	***/
	getAssetsDropDown : function(){
				
				var ajaxUrl = 'http://'+SiteSettings.ajaxCallBack+'/RPCWP/getJsonFile/Assets.json';
				$.ajax({
					url: ajaxUrl,				  
					type: "POST",
					dataType : 'json',
					xhrFields: {
						withCredentials: true
					},
					crossDomain : true,
					success: function(result){					
						var Container = $('select#assetType');
						
						Container.children('option').remove();	
						var html = '<option value="0">All Assets</option>';
						
						$(Container).append(html);
						
						$.each(result,  function(key, assetType){
							var html = '<option value="SEPERATOR" disabled="disabled">--'+ key +'--</option>';
							$(Container).append(html);
							
							$.each(assetType,  function(key, asset){
								var html = '<option value="'+key+'">'+ asset +'</option>';								
								$(Container).append(html);
						  	} );
						});
						
				   }
				});
	},
	getFiltered : function(page){
		var url = '';
		if($('input[name="endDate"]').val() == '' ){
			var d = new Date();
			date = d.getUTCFullYear() + '-' + d.getMonth() + '-' + d.getDay();
		}		
		else
			var date = $('input[name="endDate"]').val();
		
		var assetFilter = $('select[name="assetType"]').val();
		if(isNaN(assetFilter) || assetFilter == "" || assetFilter == null)
			assetFilter = 0;
		if(isNaN(page)){
			page = 1;			
			}
		var Start = (page - 1 ) * 20;
		
		$.ajax({
				   url: 'http://'+SiteSettings.ajaxCallBack+'/ExpireRates/getExpiredRatesFiltered' ,
				   data: {limitStart: Start, limitOffset: 20, pageNum: page, assetId: assetFilter, endDate: date},
				   type: "POST",
				   dataType : 'json',
				   xhrFields: {
					  withCredentials: true
				   },
				   crossDomain : true,
				   success: function(result){					
					
					ExpiryRate.calculatePagination(result.numberRecords, page);
					delete result.numberRecords;		
					ExpiryRate.updateRows(result);
				   }
				});
	
	
	},
	
	calculatePagination : function(totalRecords, currentPage)
	{		
		var pages = Math.ceil(totalRecords / 20);
		
		var start = 1;
		if(pages<10)
			var end = pages;
		else
			var end = start+9;
		
		
		var pagination = $('div.pagination ul');
		if(pages<2)
			pagination.addClass('hidden');
		else
			pagination.removeClass('hidden');
		if(pages>10 && currentPage > 5){
			start = currentPage - 5;
			end = start+9;			
			}
		if (end > pages)
			end = pages;
		
		pagination.children('li').remove();	
		if ( currentPage == 1 )
			var html = '<li class="prev active"><a href="#">Prev</a></li>';
		else	
			var html = '<li class="prev"><a href="#">Prev</a></li>';
		$(pagination).append(html);
		for (var i = start; i <= end ; i++){
			if (i == currentPage) 
				var selected = 'active';
			else
				var selected = '';
			var html = '<li class="click_'+i+" "+selected+'"><a href="#">'+i+'</a></li>';
			$(pagination).append(html);
		}
		if(currentPage == pages)
			var html = '<li class="next active"><a href="#">Next</a></li>';
		else
			var html = '<li class="next"><a href="#">Next</a></li>';
		$(pagination).append(html);
		$('div.pagination ul li a').click(function(e){
														e.preventDefault();
														
														ExpiryRate.getFiltered($(this).text());
												
														
													});
	},
	
	updateRows : function(data)
	{
		var tbodyContainer = $('table.expiryRateTable tbody');
		tbodyContainer.children('tr').remove();	
		$.each(data, function(key, asset){	
			var html = '<tr>';
			html += '<td class="firstColumn">' + asset.assetName + '</td>';
			html += '<td>' + asset.endRate + '</td>';
			html += '<td>' + asset.endDateFormatted + '</td></tr>';
			$(tbodyContainer).append(html);
			});
	},

}


$(document).ready(function() { 
	ExpiryRate.init();
}); 