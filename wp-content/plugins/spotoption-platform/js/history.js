//var $j = jQuery.noConflict();
var History = {
	init : function(){
		$('input[name="startDate"]').jdPicker({ 
			 date_format:"YYYY-mm-dd", 
		});
		$('input[name="endDate"]').jdPicker({ 
			 date_format:"YYYY-mm-dd", 
		});
		this.getHistory();
		
		
		$('input[name="startDate"]').change(function(){History.getHistory()});
		$('input[name="endDate"]').change(function(){History.getHistory()});
		$('input[name="filterRadio"]').change(function(){History.getHistory()});
		
	},	
	
	updatePagination : function(totalRecords, currentPage)
	{		
		var pages = Math.ceil(totalRecords / 10);
		
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
														
														History.getHistory($(this).text());
												
														
													});
	},
	
	
	/***
		Function name	: 	getHistory
		Params			:	None
		Functionality	:	Retrive and populate the position table on page load	
	***/
	getHistory :function(page ){
			if($('input[name="startDate"]').val() == $('input[name="startDate"]').attr('default') )
				var start = 0;
			else
				var start = $('input[name="startDate"]').val() + ' 00:00';
			if($('input[name="endDate"]').val() == $('input[name="endDate"]').attr('default') )	
				var end = 0;
			else
				var end = $('input[name="endDate"]').val() + ' 00:00';
				
				var type = $('input[name="filterRadio"]:checked').val();
				
				if(isNaN(page))
					page = 1;
				
	
				$.ajax({
				 
				   url: 'http://'+SiteSettings.ajaxCallBack+'/myaccount/getTransactionsFiltered',
				   data: {limitStart: (page-1)*10 , limitOffset: 10, pageNum: page, startTime: start, endTime: end, type: type },
				   type: "POST",
				   dataType : 'json',
				   xhrFields: {
					  withCredentials: true
				   },
				   crossDomain : true,
				   success: function(result){					
					
					
					History.replaceHistory(result,page);
					
				   }
				});
	}, 
	
	changePaginationIndex : function(pageId)
	{		
		console.log(pageId);
		var newPos = 'div.pagination ul li.click_'+pageId;				
		$('div.pagination ul li.active').removeClass('active');
		$(newPos).addClass('active');
		
	},
	
	/***
		Function name	: 	filterHistory
		Params			:	pageNum
		Functionality	:	Called on each of the filters changes, or on Pagination. give pageNum 0 for the first page, or any other number for the pagination pages.
	***/
	filterHistory :function(pageNum){
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
					url: 'http://'+SiteSettings.ajaxCallBack+'/myaccount/getPositionsFiltered',
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
					
					History.replaceHistory(result, pageNum);
				   }
				});
	}, 
	/***
		Function name	: 	noInvestmentNote
		Params			:	None
		Functionality	:	If the Ajax returns with no positions - create a row with "No Position" message.	
	***/
	noHistoryNote : function(){
		var tbodyContainer = $('table.HistoryTable tbody');
		var html = '<tr class="error centered" >';
			html += '<td class="firstColumn"colspan="6">No Available History</td>';
			html += '</tr >';		
		$(tbodyContainer).append(html);
	},
	
	/***
		Function name	: 	replaceHistory
		Params			:	History Object
		Functionality	:	Updates the History table with the History that were recived from the Ajax.	
		//empty: []
	***/
	
	replaceHistory : function(history, pageNum){		
		var tbodyContainer = $('table#historyTable tbody');
		
		tbodyContainer.children('tr').remove();		
		if(history.numberRecords == 0)
			{
				History.noHistoryNote();
				History.updatePagination(0, 1);
				return false;
			}
		else if (history.numberRecords)	
			{		
				//console.log(history.numberRecords);
				History.updatePagination(history.numberRecords, pageNum);
				delete history.numberRecords;
			}
		$.each(history, function(key, historyRecord){
			
			var html = '<tr class="' + historyRecord.type + ' ' + history.status  + '">';
				html += '<td>' + historyRecord.id + '</td>';
				html += '<td>' + historyRecord.requestTime + '</td>';
				html += '<td>' + historyRecord.type + '</td>';
				html += '<td>' + historyRecord.status + '</td>';
				html += '<td>' + historyRecord.paymentMethod + '</td>';
				html += '<td>' + historyRecord.amount +  historyRecord.currency+'</td>';			
				html +='</tr>';
				$(tbodyContainer).append(html);
			
		})
	
	}
}

$(document).ready(function() { 
	History.init();
}); 