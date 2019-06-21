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
	e.preventDefault();
    const form = $(e.currentTarget),
        id = form.attr('data-id');

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

    if (isNews) {
        submitForm(id, dataToSend, true);
    } else {
        submitForm(id, dataToSend, false);
    }
}

announcementsForm.on('submit', (e) => collectFormData(e, false));
newsForm.on('submit', (e) => collectFormData(e, true));
