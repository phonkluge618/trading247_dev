//var $j = jQuery.noConflict();

var Sidebar ={
	
	container: null,
	
	init: function(){
		this.container = $('div.rightSide');
		this.container.find('.howToTradeTabs li').bind('click',{},this.changeTab);
	},

	changeTab: function(event){
            if(!($(this).hasClass('selected'))){
                var currentTab = $(this);
		var contentContainer = currentTab.parents(".how_to_trade:first");
		var tabsContainer = currentTab.parents("ul:first");
                var newTemp = currentTab.attr('class');
                
                
		tabsContainer.find("li").removeClass("selected");
                contentContainer.find(".steps").hide();
		contentContainer.find("." + currentTab.attr('class') + "Tab").show();
		currentTab.addClass("selected");
                $('.text .' + newTemp).css('display','block'); 
                
            }
                        
	}
}
$(document).ready(function() { 
	Sidebar.init();
   
});