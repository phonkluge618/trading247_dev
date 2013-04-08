//var $j = jQuery.noConflict();
var Investments = {
	oneTouch : 'getOneTouchPositionsAJAX',
	oneTouchFiltered : 'getOneTouchPositionsFiltered',
	Binary : 'getPositions',
	BinaryFiltered : 'getPositionsFiltered',
	
	init : function(){
		Investments.getPositions();
		Investments.getAssetsDropDown();
		Investments.custTotalsAJAX('regular');
		$('input[name="startDate"]').jdPicker({ 
			 date_format:"YYYY-mm-dd", 
			
			
		});
		$('input[name="endDate"]').jdPicker({ 
			 date_format:"YYYY-mm-dd", 
			 
			
		});
		
		$('input[name="startDate"]').change(function(){Investments.filterInvestments()});
		$('input[name="endDate"]').change(function(){Investments.filterInvestments()});
		$('select[name="assetId"]').change(function(){Investments.filterInvestments()});
		$('select[name="statusFilter"]').change(function(){Investments.filterInvestments()});
		$('select#assetType').change(function(){Investments.filterInvestments()});
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
						var Container = $('select#asset');
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
	
	updatePagination : function(totalRecords, currentPage)
	{
		
		var pages = Math.ceil(totalRecords / 10);
		
		var pagination = $('div.pagination ul');
		if(pages<2)
			pagination.addClass('hidden');
		else
			pagination.removeClass('hidden');
		pagination.children('li').remove();	
		var html = '<li><a href="#">Prev</a></li>';
		$(pagination).append(html);
		for (var i = 1; i <= pages ; i++){
			if (i == currentPage) 
				var selected = 'active';
			else
				var selected = '';
			var html = '<li class="click_'+i+" "+selected+'"><a href="#">'+i+'</a></li>';
			$(pagination).append(html);
		}
		var html = '<li><a href="#">Next</a></li>';
		$(pagination).append(html);
		$('div.pagination ul li a').click(function(e){
														e.preventDefault();
														Investments.filterInvestments($(this).text());
												
														
													});
	},
	
	custTotalsAJAX : function(type) 
	{ 			
		$.ajax({
			url: 'http://'+SiteSettings.ajaxCallBack+'/RPCWP/getPositionCount',
			type: "POST",
			dataType : 'json',
			xhrFields: {
				withCredentials: true
			},
			crossDomain : true,
			success: function(result){	
				Investments.updatePagination(result[type], 1);				
			}
		});
	},
	/***
		Function name	: 	getPositions
		Params			:	None
		Functionality	:	Retrive and populate the position table on page load	
	***/
	getPositions :function(){
				if($('select#assetType').val() == 1)
					var callBack = Investments.Binary;
				else
					var callBack = Investments.oneTouch;
				$.ajax({
				   url: 'http://'+SiteSettings.ajaxCallBack+'/myaccount/' + callBack ,
				   data: {limitStart: 0, limitOffset: 10, pageNum: 1, clientId: 1},
				   type: "POST",
				   dataType : 'json',
				   xhrFields: {
					  withCredentials: true
				   },
				   crossDomain : true,
				   success: function(result){					
					
					Investments.replaceInvestments(result,1);
				   }
				});
	}, 
	
	changePaginationIndex : function(pageId)
	{		
		
		var newPos = 'div.pagination ul li.click_'+pageId;				
		$('div.pagination ul li.active').removeClass('active');
		$(newPos).addClass('active');
		
	},
	
	/***
		Function name	: 	filterInvestments
		Params			:	pageNum
		Functionality	:	Called on each of the filters changes, or on Pagination. give pageNum 0 for the first page, or any other number for the pagination pages.
	***/
	filterInvestments :function(pageNum){
				if($('select#assetType').val() == 1){
					var callBack = Investments.BinaryFiltered;
					var rateSwitch = 'Rate';
					var statusSwitch = 'Expiry Rate';
					
					}
				else {
					var callBack = Investments.oneTouchFiltered;
					var rateSwitch = 'Goal rate';
					var statusSwitch = 'Status';
					}
					
					$('table.investmentsTable th.rateSwitch').text(rateSwitch);
					$('table.investmentsTable th.statusSwitch').text(statusSwitch);
					
					if(isNaN(pageNum))
						pageNum = 1;
					if($('input[name="startDate"]').val() == '' )
						var startTimeFilter = '0 00:00';
					else
						var startTimeFilter = $('input[name="startDate"]').val() + ' 00:00';
					if( $('input[name="endDate"]').val() == '')
						var endTimeFilter =  '0 23:59';
					else
						var endTimeFilter = $('input[name="endDate"]').val() + ' 23:59';
					var assetFilter = $('select[name="assetId"]').val()							
					var statusFilter = $('select[name="statusFilter"]').val()
					var limitStart = (pageNum-1)*10 ;
					var limitOffset =  10;
					var pageNum = pageNum;
				$.ajax({
					url: 'http://'+SiteSettings.ajaxCallBack+'/myaccount/' + callBack ,
					data: {
							startTime: startTimeFilter,
							endTime: endTimeFilter,
							assetId: assetFilter,
							status: statusFilter, 
							limitStart: limitStart,
							limitOffset: limitOffset,
							pageNum: pageNum
						},
				   type: "POST",
				   dataType : 'json',
				   xhrFields: {
					  withCredentials: true
				   },
				   crossDomain : true,
				   success: function(result){					
					
					Investments.replaceInvestments(result, pageNum);
				   }
				});
	}, 
	/***
		Function name	: 	noInvestmentNote
		Params			:	None
		Functionality	:	If the Ajax returns with no positions - create a row with "No Position" message.	
	***/
	noInvestmentNote : function(){
		var tbodyContainer = $('table.investmentsTable tbody');
		var html = '<tr class="error centered" >';
			html += '<td class="firstColumn"colspan="9">No Available positions</td>';
			html += '</tr >';		
		$(tbodyContainer).append(html);
	},
	
	/***
		Function name	: 	replaceInvestments
		Params			:	investments Object
		Functionality	:	Updates the investments table with the investments that were recived from the Ajax.	
	***/
	
	replaceInvestments : function(investments, pageNum){		
		var tbodyContainer = $('table.investmentsTable tbody');
		var theadContainer = $('table.investmentsTable thead');
		tbodyContainer.children('tr').remove();	
	
		if(investments.numberRecords == 0)
			{
				Investments.noInvestmentNote();
				Investments.updatePagination(0, 1);
				return false;
			}
		else if (investments.numberRecords)	
			{		
				Investments.updatePagination(investments.numberRecords, pageNum);
				delete investments.numberRecords;
			}
		$.each(investments, function(key, investment){
			
			
				
			var myclass='';
			switch(investment.status){
				case('won'): 
					myclass= 'success';
					break;
				case('lost'):
					myclass='error';
					break;
				case('open'):	
					myclass='info';
					break;
			}
			if($('select#assetType').val() == 0){
				investment.entryRate = investment.goalRate;
				investment.endRate = investment.status;
				if(investment.status == 'lost')
					investment.amount = investment.loseSum;
				else
					investment.amount = investment.winSum;
			}
			var html = '<tr class="' + investment.status + ' ' + myclass  + '">';
				html += '<td class="firstColumn">' + investment.id + '</td>';
				html += '<td>' + investment.currency + ' ' + investment.amount + '</td>';
				html += '<td class="veryLongCell" title="' + investment.name + '">' + investment.name + '</td>';
				html += '<td class="longCell">' + investment.executionDate + '</td>';
				html += '<td>' + investment.entryRate + '</td>';
				html += '<td class="'+investment.position+'"></td>';
				html += '<td class="longCell">' + investment.optionEndDate + '</td>';
				html += '<td class="extra longCell">' + investment.endRate + '</td>';
				html += '<td>' + investment.amount + ' ' + investment.currency + '</td>';
				html +='</tr>';
				$(tbodyContainer).append(html);
			
		})
	
	}
}

$(document).ready(function() { 
	Investments.init();
}); 