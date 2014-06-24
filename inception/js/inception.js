/*
Theme name: Inception
Theme URI: http://www.redmexico.com.mx
Version: 1.0
Author: bitcero
Author URI: http://www.bitcero.info
*/

$(document).ready(function(){
    
    $("ul.sf-menu").supersubs({
        minWidth:    4,
        maxWidth:    27,
        extraWidth:  1
    }).superfish();
    
    if($('.flexslider').length>0){
        $('.flexslider').flexslider({
            animation: 'fade',
            controlsContainer: ".flex-container"
        });
    }
    
    /*if($("#i-content .i_content_left").length==1){
        var h = $("#i-content .i_content_left").height();
        
        if($("#i-content .i_content_contents").height()>h)
            $("#i-content .i_content_left").height($("#i-content .i_content_contents").height());
    }*/
    
});