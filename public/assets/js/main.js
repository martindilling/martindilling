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
