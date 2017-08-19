if (window){
    function bxrResizeRK(){
        $('.rk-fullwidth').each(function(){
            rkWidth = $(this).children('.rk-fullwidth-canvas').children('img').width();
            if (rkWidth>0 && rkWidth>$(this).width()){
                rkWidth = Math.round((rkWidth-$(this).width())/2);
                $(this).children('.rk-fullwidth-canvas').css('margin-left', '-'+rkWidth+'px');
            }
        });
    };
    $(document).ready(function(){
        bxrResizeRK();
    });
}
