const announcementsForm = $('#announcements-form'),
    newsForm = $('#news-form');

function submitForm (id, data, isNews) {
    if (isNews) {
        const isUpdate = $('#news-form').attr('data-is-update') === '1',
        baseUrl = '/admin/news',
        url = isUpdate ? `${baseUrl}/${id}` : baseUrl,
        type = isUpdate ? 'PUT' : 'POST';
        $.ajax({
            url,
            type,
            data,
            success: function(data) {
                window.location.href = '/admin/news';
            },
            error(err) {
                console.log(err);
            }
        });
    } else {
        const isUpdate = $('#announcements-form').attr('data-is-update') === '1',
        baseUrl = '/admin/announcements',
        url = isUpdate ? `${baseUrl}/${id}` : baseUrl,
        type = isUpdate ? 'PUT' : 'POST';
        console.log(isUpdate);
        $.ajax({
            url,
            type,
            data,
            success: function(data) {
                window.location.href = '/admin/announcements';
            },
            error(err) {
                console.log(err);
            }
        });
    }
}

function collectFormData (e, isNews) {
	// e.preventDefault();
    // const form = $(e.currentTarget),
    const form = $(e),
        id = form.attr('data-id');
    console.log(form);

    const formTitleUa = form.find('.form-title-ua').val(),
        formTitleRu = form.find('.form-title-ru').val(),
        formTitleUs = form.find('.form-title-us').val(),
        shortDescriptionUa = form.find('.short-description-ua').val(),
        shortDescriptionRu = form.find('.short-description-ru').val(),
        shortDescriptionUs = form.find('.short-description-us').val(),
        fullDescriptionUa = form.find('.full-description-ua').val(),
        fullDescriptionRu = form.find('.full-description-ru').val(),
        fullDescriptionUs = form.find('.full-description-us').val(),
        shortLocationUa = form.find('.short-location-ua').val(),
        shortLocationRu = form.find('.short-location-ru').val(),
        shortLocationUs = form.find('.short-location-us').val(),
        fullLocationUa = form.find('.full-location-ua').val(),
        fullLocationRu = form.find('.full-location-ru').val(),
        fullLocationUs = form.find('.full-location-us').val(),
        checkLocalRu = form.find('input[loc-name="local_ru"]').prop('checked'),
        checkLocalUs = form.find('input[loc-name="local_us"]').prop('checked'),
        dateMeeting = form.find('.date-meeting').val(),
        additionalInfo = form.find('.additional-info').val(),
        pageDescription = form.find('.page-description').val(),
        _token = form.find('input[name="_token"]').val();



    const mainImage = $("#single_img span img").attr('src');
    const sliderImages = $("#list span img"),
    	sliderImageBase64 = sliderImages.toArray().map((sliderImg) => $(sliderImg).attr('src'));

    const dataToSend = {
    	_token,
        checkLocalRu,
        checkLocalUs,
        formTitleUa,
        formTitleRu,
        formTitleUs,
        shortDescriptionUa,
        shortDescriptionRu,
        shortDescriptionUs,
        fullDescriptionUa,
        fullDescriptionRu,
        fullDescriptionUs,
        shortLocationUa,
        shortLocationRu,
        shortLocationUs,
        fullLocationUa,
        fullLocationRu,
        fullLocationUs,
        dateMeeting,
        mainImage,
        additionalInfo,
        pageDescription,
        sliderImageBase64
    };

    // if( (checkLocalRu && (shortDescriptionRu == '' || (!isNews && shortLocationRu == '') || (!isNews && fullDescriptionRu == '') || fullLocationRu == '')) || (checkLocalUs && (shortDescriptionUs == '' || (!isNews && shortLocationUs == '') || (!isNews && fullDescriptionUs == '') || fullLocationUs == ''))) {
    //     console.log("err");
    // }
    // else {
        if (isNews) {
            submitForm(id, dataToSend, true);
        } else {
            submitForm(id, dataToSend, false);
        }
    // }
}

$("#announcements-form").validate({
    // define validation rules
    rules: {
        ignore: ':hidden:not(.summernote),.note-editable.card-block',
        title_ua: {
            required: true,
            maxlength: 75
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
            required: true,
            date: true
        },
        img_path: {
            // required: true,
            extension: "jpg|png|jpeg",
            accept: "image/jpg,image/jpeg,image/png",

        },
        "slider-image": {
            // required: true,
            extension: "jpg|png|jpeg",
            accept: "image/jpg,image/jpeg,image/png",

        },
        keywords: {
            required: true,
            maxlength: 200
        },
        description: {
            required: true,
            maxlength: 200
        },
        title_ru: {
            maxlength: 75
        },
        short_description_ru: {
            maxlength: 200
        },
        short_location_ru: {
            maxlength: 200
        },
        full_location_ru: {
            maxlength: 200
        },
        title_us: {
            maxlength: 75
        },
        short_description_us: {
            maxlength: 200
        },
        short_location_us: {
            maxlength: 200
        },
        full_location_us: {
            maxlength: 200
        },
    },

    //display error alert on form submit
    invalidHandler: function(event, validator) {
        KUtil.scrollTo("announcements-form", -200);
    },
    errorPlacement: function(error, element){
        var element = $(element);
        element.addClass('is-invalid');
        error.addClass('invalid-feedback');
        error.appendTo(element.parent());
    },
    submitHandler: function (form) {
        announcementsForm.submit(collectFormData(form, false));
        // form[0].submit(); // submit the form
    }
});
$('#announcements-form').each(function () {
    if ($(this).data('validator')) $(this).data('validator').settings.ignore = ".note-editor *";
});
// announcementsForm.on('submit', (e) => collectFormData(e, false));
newsForm.on('submit', (e) => collectFormData(e, true));
