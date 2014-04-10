var MDH = MDH || {};

MDH.HeaderLinks = {
    settings: {
        headerSelector: 'section.entry-content h2'
    },

    Init: function()
    {
        var thisModule = this;

        // False if no fields found
        var headers = $(this.settings.headerSelector);
        if ( headers.length < 1 ) {
            return false;
        }

        // Loop though all headers
        $(headers).each(function(index, element) {
            var element = $(element);

            // Create slug from the header text
            var slug = thisModule.createSlug(element.html())

            // Insert the anchor before the header
            $('<p><a name="' + slug + '"></a></p>').insertBefore(element);

            // Append a link to the header
            element.append('<a class="anchor" href="#' + slug + '">#</a>');
        });
    },

    createSlug: function(text)
    {
        return getSlug(text, {
            custom: {
                'amp': '',
                'Æ': 'AE',
                'æ': 'ae',
                'Ø': 'OE',
                'ø': 'oe',
                'Å': 'AA',
                'å': 'aa'
            },
            uric: false
        });
    }
};
