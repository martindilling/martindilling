var MDH = MDH || {};

MDH.MarkdownPreview = {
    settings: {
        textArea: '#mdbody',
        previewArea: '#mdpreview'
    },

    Init: function()
    {
        // False if no fields found
        var textArea = $(this.settings.textArea, 'form');
        if ( textArea.length < 1 ) {
            return false;
        }

        this.UpdatePreview();
        this.RegisterKeyUpEvent();
    },

    UpdatePreview: function()
    {
        var previewArea = $(this.settings.previewArea)
        var textArea = $(this.settings.textArea, 'form');
        var input = textArea.val();

        previewArea.html(Markdown(input));
        MDH.PrettifyCode.Init();
        MDH.HeaderLinks.Init();
    },

    RegisterKeyUpEvent: function()
    {
        thisModule = this;

        var delay = (function(){
            var timer = 0;
            return function(callback, ms){
                clearTimeout (timer);
                timer = setTimeout(callback, ms);
            };
        })();

        $(this.settings.textArea).keyup(function(){
            delay(function(){
                thisModule.UpdatePreview();
            }, 500 );
        });
    }
};
