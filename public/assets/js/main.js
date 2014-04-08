$(document).ready(function() {

    // ==========================================================================
    // Add 'prettyprint horscroll' class to pre.
    // Then apply prettyPrint.  horscroll
    // ==========================================================================
    function doPrettyprint() {
        $('.entry-content pre, .entry-content table code, p code').addClass('prettyprint linenums selectable');
        prettyPrint();
    }
    doPrettyprint();


    var line = new String(window.location.hash).slice(1) - 1;
    setTimeout(function() {
        $('.selectable ol li:eq('+line+')').addClass('selected');

        $('.selectable ol li').each(function(key, element)
        {
            $(this).click(function()
            {
                var line = key + 1;
                window.location.hash = '#'+ line;
            });
        });
    }, 1);

    $(window).bind('hashchange', function()
    {
        var line = new String(window.location.hash).slice(1) - 1;
        $('.selectable ol li').removeClass('selected');
        $('.selectable ol li:eq('+line+')').addClass('selected');
    });


    $("[data-close]").on("click", function(){
        $(this).parent().fadeTo(200, 0).slideUp(300, function(){
            $(this).remove();
        });
    });

    $('.help-tip').tooltip({
        placement: 'right',
        container: 'body'
    });

//    moment().format("yy-mm-dd HH:mm:ss");

    $('#publishDate').datetimepicker({
        pickDate: true,                 //en/disables the date picker
        pickTime: true,                 //en/disables the time picker
        useMinutes: true,               //en/disables the minutes picker
        useSeconds: true,               //en/disables the seconds picker
        useCurrent: true,               //when true, picker will set the value to the current date/time     
        minuteStepping:1,               //set the minute stepping
        showToday: true,                 //shows the today indicator
        language:'en',                  //sets language locale
});


//    var publishDate = $('#publishDate');
////    var unpublishDate = $('#unpublishDate');
//
//    publishDate.datetimepicker({
//        timeFormat: 'HH:mm:ss',
//        dateFormat: 'yy-mm-dd',
//        changeMonth: true,
//        changeYear: true,
////        addSliderAccess: true,
////        sliderAccessArgs: { touchonly: false },
////        onClose: function(dateText, inst) {
////            // if (unpublishDate.val() !== '') {
////            // 	var testStartDate = publishDate.datetimepicker('getDate');
////            // 	var testEndDate = unpublishDate.datetimepicker('getDate');
////            // 	if (testStartDate > testEndDate)
////            // 		unpublishDate.datetimepicker('setDate', testStartDate);
////            // }
////            // else {
////            // 	unpublishDate.val(dateText);
////            // }
////        },
////        onSelect: function (selectedDateTime){
////            unpublishDate.datetimepicker('option', 'minDate', publishDate.datetimepicker('getDate') );
////        }
//    });



    function updateMdPreview() {
        var input = $("#mdbody").val();
        $("#mdpreview").html(Markdown(input));
        doPrettyprint();
        createHeaderLink();
//        contentTables();
    }

    updateMdPreview();

    $('#mdbody').keyup(function(){
        updateMdPreview();
    });



    // ==========================================================================
    // Heading in article
    // --------------------------------------------------------------------------
    // Remember to put a "<p><a name="?"></a></p>" before Heading2's if you
    // want the oppotunity to link directly to it.
    // Like this:
    //
    // <p><a name="heading-here"></a></p>
    // ##Heading Here
    // ==========================================================================

    function createHeaderLink() {
        $('.entry-content h2').each(function(index, element) {
            element = $(element);
            anchor = element.prev().children().eq(0).attr('name');
            element.html(element.html() + '<a class="anchor" href="#' + anchor + '">#</a>');
        });
    }

    createHeaderLink();

});
