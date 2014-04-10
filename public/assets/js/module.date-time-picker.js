var MDH = MDH || {};

MDH.DateTimePicker = {
    settings: {
        datetimefields: '#publishDate'
    },

    Init: function()
    {
        // False if no fields found
        var fields = $(this.settings.datetimefields, 'form');
        if ( fields.length < 1 ) {
            return false;
        }

        // Add the datetimepicker
        $(fields).datetimepicker({
            useSeconds: true
        });
    }
};
