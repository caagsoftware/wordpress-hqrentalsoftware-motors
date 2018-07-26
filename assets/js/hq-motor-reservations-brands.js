(function($) {
    "use strict";

    $(document).ready(function(){

        var dateTimeFormat = 'Y-m-d H:i';
        $('#caag-pick-up-date').datetimepicker({
            format: dateTimeFormat,
            closeOnDateSelect: true
        });
        $('#caag-return-date').datetimepicker({
            format: dateTimeFormat,
            closeOnDateSelect: true
        });
    });

    $('#caag-pick-up-date').change(function(){
        var newDate = moment($('#caag-pick-up-date').val(),'YYYY-MM-DD HH:mm');
        $('#caag-return-date').val(newDate.add(7, 'days').format('YYYY-MM-DD HH:mm'));
    });
    console.log(hq_rentals_brands);
    $('.xdsoft_current').css('background-color','#1184bf !important');
    $('#hq-pick-brand').on('change', function(){
        hq_rentals_brands.forEach( function(item){
            if(item.id == $('#hq-pick-brand').val() ){
                $("#hq-pick-up-location option").remove();
                item.locations
            }
        } );
        $('#caag-book-form').attr('action', $('#hq-pick-brand').val());
    });

})(jQuery);
