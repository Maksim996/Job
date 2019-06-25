"use strict";
// Class definition

var KSummernoteDemo = function () {    
    // Private functions
    var demos = function () {
        $('.summernote').summernote({
            lang: 'uk-UA',
           toolbar: [
     // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height','link']],
        ['fullscreen',['fullscreen','help']],

      ],
             height: 100,
 minHeight: 100,
  maxHeight: null,
        });
    }

    return {
        // public functions
        init: function() {
            demos(); 
        }
    };
}();

// Initialization
jQuery(document).ready(function() {
    KSummernoteDemo.init();
});
