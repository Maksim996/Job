"use strict";
// Class definition

var KFormControls = function () {
    // Private functions

    var demo1 = function () {
        $( "#partners_blocks" ).validate({
            // define validation rules
            rules: {
                email: {
                    required: true,
                    email: true
                },
                link: {
                    // required: true
                },
                phone: {
                    required: true,
                    phoneUS: true
                },
                option: {
                    required: true
                },
                options: {
                    required: true,
                    minlength: 2,
                    maxlength: 4
                },
                memo: {
                    required: true,
                    minlength: 10,
                    maxlength: 100
                },
                title: {
                    required: true,
                    maxlength: 200
                },

            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#k_form_1_msg');
                alert.parent().removeClass('k-hidden');
                KUtil.scrollTo("partners_blocks", -200);
            },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
            }
        });
    }

    var demo2 = function () {
        $( "#k_form_2" ).validate({
            // define validation rules
            rules: {
                //= Client Information(step 3)
                // Billing Information
                billing_card_name: {
                    required: true
                },
                billing_card_number: {
                    required: true,
                    creditcard: true
                },
                billing_card_exp_month: {
                    required: true
                },
                billing_card_exp_year: {
                    required: true
                },
                billing_card_cvv: {
                    required: true,
                    minlength: 2,
                    maxlength: 3
                },

                // Billing Address
                billing_address_1: {
                    required: true
                },
                billing_address_2: {

                },
                billing_city: {
                    required: true
                },
                billing_state: {
                    required: true
                },
                billing_zip: {
                    required: true,
                    number: true
                },

                billing_delivery: {
                    required: true
                }
            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                swal({
                    "title": "",
                    "text": "There are some errors in your submission. Please correct them.",
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary k-btn k-btn--wide",
                    "onClose": function(e) {
                        console.log('on close event fired!');
                    }
                });

                event.preventDefault();
            },

            submitHandler: function (form) {
                //form[0].submit(); // submit the form
                swal({
                    "title": "",
                    "text": "Form validation passed. All good!",
                    "type": "success",
                    "confirmButtonClass": "btn btn-secondary"
                });

                return false;
            }
        });
    }

    return {
        // public functions
        init: function() {
            demo1();
            demo2();
        }
    };
}();

jQuery(document).ready(function() {
    KFormControls.init();
});
