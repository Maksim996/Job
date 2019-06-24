"use strict";
// Class definition

var KFormControls = function () {
    // Private functions
    var demo1 = function () {
        $("#nav_menu").validate({
            // define validation rules
            rules: {
                title_ua: {
                    required: true,
                    maxlength: 200
                },
                title_ru: {
                    required: true,
                    maxlength: 200
                },
                title_us: {
                    required: true,
                    maxlength: 200
                },

            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                KUtil.scrollTo("nav_menu", -200);
            },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
            }
        });
    };
    var demo2 = function () {
        $( "#admin_header" ).validate({
            // define validation rules
            rules: {
                title_ua: {
                    required: true,
                    maxlength: 200,
                },
                title_ru: {
                    maxlength: 200,
                },
                title_us: {
                    maxlength: 200,
                },
                link:{
                    required: true,
                },
                content_ua:{
                    required: true,
                    maxlength: 250,
                },
                content_ru:{
                    maxlength: 250,
                },
                content_us:{
                    maxlength: 250,
                },
                keywords:{
                    required: true,
                    maxlength:200,
                },
                description:{
                    required: true,
                },

            },

            invalidHandler: function(event, validator) {
                KUtil.scrollTo("admin_header", -200);
            },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
            }
        });
    };

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
                    required: true,
                    maxlength: 200
                },
                full_location_ua: {
                    required: true,
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
                KUtil.scrollTo("announcements-form", -200);
            },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
            }
        });
    };

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
                KUtil.scrollTo("news-form", -200);
            },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
            }
        });
    };
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
                KUtil.scrollTo("practic-header", -200);
            },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
            }
        });
    };

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
                card_link3: {
                    required: true,
                    maxlength: 200
                },
            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                KUtil.scrollTo("practic-cards", -200);
            },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
            }
        });
    };

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
                KUtil.scrollTo("partners_blocks", -200);
            },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
            }
        });
    };
    var demo8 = function () {
        $("#subcat").validate({
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
                KUtil.scrollTo("practic-header", -200);
            },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
            }
        });
    };

    return {
        // public functions
        init: function() {
            demo1();
            demo2();
            demo3();
            demo4();
            demo5();
            demo6();
            demo7();
            demo8();
        }
    };
}();

jQuery(document).ready(function() {
    KFormControls.init();
});
