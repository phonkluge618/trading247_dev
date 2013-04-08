//var $j = jQuery.noConflict();

var assetIndex ={
	
        ontainer: null,
	
	init: function(){
		this.container = $('div.pageContainer');
		this.container.find('.faqTitles li').bind('click',this.changeTab);
                this.container.find('.curTab .asset').bind('click',this.onAssetClick);
                this.container.find('.submitSearchBg #submitSearch').bind('click',this.onAssetClick);
                
	},

	changeTab: function(event){
              if(!($(this).hasClass('selected'))){
                  
                var currentTab = $('ul.faqTitles li.selected')
                var nextTab = $(this);
                		
                var temp = currentTab.attr('id');
                var lastElemetNumber = temp.split('-');
                temp = $(this).attr('id');
                var nextElemetNumber =  temp.split('-');

                $('#tax-block-' + nextElemetNumber[1]).removeClass('hidden');
                $('#tax-block-' + lastElemetNumber[1]).addClass('hidden');
                
		currentTab.removeClass('selected');
                nextTab.addClass('selected');
                                       
            }
                        
	},
        onAssetClick: function(event){
            $(this).toggleClass('open');
            $(this).next().toggleClass('hidden');      
        }
       
        
}
$(document).ready(function() { 
	assetIndex.init();
        
});