var safari_browser = navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1;
(function($) {
    "use strict";
    if(safari_browser){
        $("a").each(function(){
            if($(this).attr('href').endsWith("/reservations") || $(this).attr('href').endsWith("/reservations/")){
                $(this).attr('href','https://libra-car-rental.hqrentals.eu/public/car-rental/reservations/step1?new=1&brand=ad3c96e5-e401-4010-a17c-14fa30a9c229');
                $(this).attr('target','_blank');
            }
        });
        $("#caag-book-form").attr("action","https://libra-car-rental.hqrentals.eu/public/car-rental/reservations/step1?new=1&brand=ad3c96e5-e401-4010-a17c-14fa30a9c229");
        $("#caag-book-form").attr("target","_blank");
    }
})(jQuery);