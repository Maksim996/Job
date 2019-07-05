"use strict";
// Class definition

var KBootstrapMaxlength = function () {
    
    // Private functions
    var demos = function () {
        $('.k_maxlength_5').maxlength({
            alwaysShow: true,
            threshold: 10,
            warningClass: "k-badge k-badge--primary k-badge--rounded k-badge--inline",
            limitReachedClass: "k-badge k-badge--brand k-badge--rounded k-badge--inline"

        });


    }

    return {
        // public functions
        init: function() {
            demos();  
        }
    };
}();

jQuery(document).ready(function() {    
    KBootstrapMaxlength.init();
});
