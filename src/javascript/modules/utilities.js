//var $ = require('jquery');

module.exports = {
    settings: {
        closeSelector: '[data-close]',
        helpTipSelector: '.help-tip'
    },

    Init: function()
    {
        this.RegisterAlertCloseClick();
        this.Tooltips();
    },

    RegisterAlertCloseClick: function()
    {
        // False if no alerts found
        var closeSelector = $(this.settings.closeSelector, '.alerts');
        if ( closeSelector.length < 1 ) {
            return false;
        }

        $(closeSelector).on("click", function(){
            $(this).parent().fadeTo(200, 0).slideUp(300, function(){
                $(this).remove();
            });
        });
    },

    Tooltips: function()
    {
        $(this.settings.helpTipSelector).tooltip({
            placement: 'right',
            container: 'body'
        });
    }
};
