"use strict";
// Class definition

var KFormControls = function () {
    // Private functions

    // var demo1 = function () {
    //     $("#partners_blocks").validate({
    //         // define validation rules
    //         rules: {
    //             email: {
    //                 required: true,
    //                 email: true
    //             },
    //             link: {
    //                 // required: true
    //             },
    //             phone: {
    //                 required: true,
    //                 phoneUS: true
    //             },
    //             option: {
    //                 required: true
    //             },
    //             options: {
    //                 required: true,
    //                 minlength: 2,
    //                 maxlength: 4
    //             },
    //             memo: {
    //                 required: true,
    //                 minlength: 10,
    //                 maxlength: 100
    //             },
    //             title: {
    //                 required: true,
    //                 maxlength: 200
    //             },

    //         },

    //         //display error alert on form submit
    //         invalidHandler: function(event, validator) {
    //             var alert = $('#k_form_1_msg');
    //             alert.parent().removeClass('k-hidden');
    //             KUtil.scrollTo("partners_blocks", -200);
    //         },

    //         submitHandler: function (form) {
    //             form[0].submit(); // submit the form
    //         }
    //     });
    // }

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

    var demo3 = function () {
        $("#announcements-form").validate({
            // define validation rules
            rules: {
                title_ua: {
                    required: true,
                    maxlength: 200
                },
                short_description_ua: {
                    required: true,
                    maxlength: 200
                },
                full_description_ua: {
                    required: true
                },
                short_location_ua: {
                    maxlength: 200
                },
                full_location_ua: {
                    maxlength: 200
                },
                date: {
                    required: true
                },
                img_path: {
                    required: true
                },
                "slider-image": {
                    required: true
                },
                keywords: {
                    required: true,
                    maxlength: 200
                },
                description: {
                    required: true,
                    maxlength: 200
                },
            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#announcements-form');
                alert.parent().removeClass('k-hidden');
                KUtil.scrollTo("announcements-form", -200);
            },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
            }
        });
    }

    var demo4 = function () {
        $("#news-form").validate({
            // define validation rules
            rules: {
                title_ua: {
                    required: true,
                    maxlength: 200
                },
                short_description_ua: {
                    required: true,
                    maxlength: 200
                },
                full_description_ua: {
                    required: true
                },
                short_location_ua: {
                    maxlength: 200
                },
                full_location_ua: {
                    maxlength: 200
                },
                date: {
                    required: true
                },
                img_path: {
                    required: true
                },
                "slider-image": {
                    required: true
                },
                keywords: {
                    required: true,
                    maxlength: 200
                },
                description: {
                    required: true,
                    maxlength: 200
                },
            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#news-form');
                alert.parent().removeClass('k-hidden');
                KUtil.scrollTo("news-form", -200);
            },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
            }
        });
    }

    var demo5 = function () {
        $("#practic-header").validate({
            // define validation rules
            rules: {
                title_ua: {
                    required: true,
                    maxlength: 200
                },
                content_ua: {
                    required: true
                }
            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#practic-header');
                alert.parent().removeClass('k-hidden');
                KUtil.scrollTo("practic-header", -200);
            },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
            }
        });
    }

    var demo6 = function () {
        $("#practic-cards").validate({
            // define validation rules
            rules: {
                card_title1_ua: {
                    required: true,
                    maxlength: 200
                },
                card_description1_ua: {
                    required: true,
                    maxlength: 200
                },
                img_path1: {
                    required: true,
                    maxlength: 200
                },
                card_link1: {
                    required: true,
                    maxlength: 200
                },

                card_title2_ua: {
                    required: true,
                    maxlength: 200
                },
                card_description2_ua: {
                    required: true,
                    maxlength: 200
                },
                img_path2: {
                    required: true,
                    maxlength: 200
                },
                card_link2: {
                    required: true,
                    maxlength: 200
                },

                card_title3_ua: {
                    required: true,
                    maxlength: 200
                },
                card_description3_ua: {
                    required: true,
                    maxlength: 200
                },
                img_path3: {
                    required: true,
                    maxlength: 200
                },
                card_link3: {
                    required: true,
                    maxlength: 200
                },
            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#practic-cards');
                alert.parent().removeClass('k-hidden');
                KUtil.scrollTo("practic-cards", -200);
            },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
            }
        });
    }

    var demo7 = function () {
        $("#partners_blocks").validate({
            // define validation rules
            rules: {
                name: {
                    required: true,
                    maxlength: 200
                },
                link: {
                    required: true
                },
                img_path: {
                    required: true
                },
                cat: {
                    required: true
                },
                title_ua: {
                    required: true
                },
                file: {
                    required: true
                }
            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#partners_blocks');
                alert.parent().removeClass('k-hidden');
                KUtil.scrollTo("partners_blocks", -200);
            },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
            }
        });
    }

    return {
        // public functions
        init: function() {
            // demo1();
            demo2();
            demo3();
            demo4();
            demo5();
            demo6();
            demo7();
        }
    };
}();

jQuery(document).ready(function() {
    KFormControls.init();
});
