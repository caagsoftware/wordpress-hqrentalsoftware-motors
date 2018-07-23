(function($) {
    "use strict";

    $(document).ready(function(){

        /*Timepicker*/
        var stmToday = new Date();
        var stmTomorrow = new Date(+new Date() + 86400000);
        var stmStartDate = false;
        var stmEndDate = false;
        var startDate = false;
        var endDate = false;
        var dateTimeFormat = 'Y-m-d H:i';
        /*Datepicker Init*/

        /*$('#caag-pick-up-date').stm_datetimepicker({
            defaultDate: stmTomorrow,
            defaultSelect: false,
            closeOnDateSelect: true,
            timeHeightInTimePicker: 40,
            fixed: false,
            lang: stm_lang_code,
        });*/
        $('#caag-pick-up-date').datetimepicker({
            format: dateTimeFormat,
            closeOnDateSelect: true
        });
        $('#caag-return-date').datetimepicker({
            format: dateTimeFormat,
            closeOnDateSelect: true
        });

        /*Datepicker Init*/
        /*
        $('#caag-return-date').stm_datetimepicker({
            format:dateTimeFormat,
            defaultDate: stmTomorrow,
            defaultSelect: false,
            closeOnDateSelect: true,
            timeHeightInTimePicker: 40,
            fixed: false,
            lang: stm_lang_code
        });*/



    });

    $('#caag-pick-up-date').change(function(){
        console.log($('#caag-pick-up-date').val());
        var newDate = moment($('#caag-pick-up-date').val(),'YYYY-MM-DD HH:mm');
        $('#caag-return-date').val(newDate.add(7, 'days').format('YYYY-MM-DD HH:mm'));
    });
    $('.xdsoft_current').css('background-color','#1184bf !important');

    $('#hq-pick-brand').on('change', function(){
        $('#caag-book-form').attr('action', $('#hq-pick-brand').val());
    });

})(jQuery);
