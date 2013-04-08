(function ($) {
    // custom css expression for a case-insensitive contains()
    jQuery.expr[':'].Contains = function(a,i,m){
        return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase())>=0;
    };
    function listFilter(header2, list) { // header is any element, list is an unordered list
        // create and add the filter form to the header
        var form = $("<form>").attr({
            "class":"search",
            "action":"#"
        }),
        input = $("<input>").attr({
            "class":"searchString",
            "type":"text",
            "value":"Search"
        });
 
        $(form).append(input).appendTo(header2);
        $(input)
        .change( function () {
            var filter = $(this).val();
            if(filter) {
                // this finds all links in a list that contain the input,
                // and hide the ones not containing the input while showing the ones that do
                $(list).find("h2:not(:Contains(" + filter + "))").parent().slideUp();
                if($(list).find("h2:Contains(" + filter + ")").length == 0){
                    $('.dictionary #noRecord').removeClass('hidden');
                }
                else{
                    $(list).find("h2:Contains(" + filter + ")").parent().slideDown();
                    $('.dictionary #noRecord').addClass('hidden');
                }
                
            } else {
                $(list).find("div.asset").slideDown();
                
            }
            return false;
        })
        .keyup( function () {
            // fire the above change event after every letter
            $(this).change();
        });
    }
   
    //ondomready
   
    $(function () {
        listFilter($("#header2"), $(".dictionary"));
        $("input.searchString").focus(function () {
            $(this).val('');
        });
        $("input.searchString").blur(function () {
            $(this).val('Search');
        });
    });
}(jQuery));