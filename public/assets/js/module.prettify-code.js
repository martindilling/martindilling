var MDH = MDH || {};

MDH.PrettifyCode = {
    settings: {
        contentArea: $('section.entry-content'),
        codeAreas: 'pre, p code, table code',
        preClass: 'prettyprint linenums selectable',
        codeClass: 'prettyprint',
        selectedLine: 0,
        selectedClass: 'selected'
    },

    Init: function()
    {
        // Get codeAreas
        var codeAreas = this.GetCodeAreas();

        // False if no codeAreas found
        if ( !codeAreas ) {
            return false;
        }

        // Add the right classes
        this.AddPrettyPrintClasses(codeAreas);

        // Do le pwetty pwinting
        prettyPrint();


        // Select line if there's a url hash
        this.SelectLine(this.GetSelectedLineHash());

        // Register click event on lines
        this.SetLineClickEvents();

        // Register hashchange event
        this.SetHashChangeEvent();
    },

    GetCodeAreas: function()
    {
        // False if no contentArea found
        if ( this.settings.contentArea.length < 1 ) {
            return false;
        }

        // False if no codeAreas found
        var codeAreas = $(this.settings.codeAreas, this.settings.contentArea);
        if ( codeAreas.length < 1 ) {
            return false;
        }

        // Return codeAreas
        return codeAreas;
    },

    AddPrettyPrintClasses: function(codeAreas)
    {
        var thisModule = this;

        // Loop through all found codeAreas
        $.each( codeAreas, function( key, value ) {
            // Get the tag name of the codeArea
            var tagName = value.nodeName.toLowerCase();

            // Set the class from the settings
            $(this).addClass(thisModule.settings[tagName+'Class']);
        });
    },

    GetSelectedLineHash: function()
    {
        var url = window.location.hash;
        var match = url.match(/#.*[?&]line=([^&]+)(&|$)/);
        return(match ? match[1] : 0);
//        window.location.hash = '#?line='+ line;
    },

    SetSelectedLineHash: function(line)
    {
        window.location.hash = '#?line='+ line;
    },

    ScrollToCode: function(lineElement)
    {
        $('html, body').animate({
            scrollTop: ($(lineElement).parentsUntil('pre').offset().top - 40)
        },500);
    },

    SelectLine: function(line)
    {
        this.RemoveSelectLineClass();
        this.settings.selectedLine = line;
        this.AddSelectLineClass();
    },

    AddSelectLineClass: function()
    {
        if (this.settings.selectedLine > 0) {
            var selector = '.selectable ol li:eq('+(this.settings.selectedLine-1)+')';
            $(selector, this.settings.contentArea)
                .addClass(this.settings.selectedClass);

            this.ScrollToCode($(selector));
        }
    },

    RemoveSelectLineClass: function()
    {
        if (this.settings.selectedLine > 0) {
            var selector = '.selectable ol li:eq('+(this.settings.selectedLine-1)+')';
            $(selector, this.settings.contentArea)
                .removeClass(this.settings.selectedClass);
        }
    },

    SetLineClickEvents: function()
    {
        var thisModule = this;

        $('.selectable ol li').each(function(key, element)
        {
            $(this).click(function() {
                thisModule.SetSelectedLineHash(key + 1);
            });
        });
    },

    SetHashChangeEvent: function()
    {
        var thisModule = this;

        $(window).bind('hashchange', function() {
            thisModule.SelectLine(thisModule.GetSelectedLineHash());
        });
    }
};
