PrettifyCode    = require './modules/prettify-code'
DateTimePicker  = require './modules/date-time-picker'
HeaderLinks     = require './modules/header-links'
MarkdownPreview = require './modules/markdown-preview'
Utilities       = require './modules/utilities'

# Initialize all the modules
PrettifyCode.Init();
DateTimePicker.Init();
HeaderLinks.Init(); # TODO: Make it add target="blank" to links in the content (and rename to MarkdownCustom)
MarkdownPreview.Init();
Utilities.Init();
