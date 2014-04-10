var MDH = MDH || {};

// TODO: Find a way to make all these modules one file
// module.prettify-code.js
// module.date-time-picker.js
// module.header-links.js
// module.markdown-preview.js
// module.utilities.js

(function() {

    MDH.PrettifyCode.Init();
    MDH.DateTimePicker.Init();
    MDH.HeaderLinks.Init();// TODO: Make it add target="blank" to links in the content (and rename to MarkdownCustom)
    MDH.MarkdownPreview.Init();
    MDH.Utilities.Init();

})();
