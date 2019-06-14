const form = $('#news-announcements-form');

function submitForm (id, data) {

	const isUpdate = $('#news-announcements-form').attr('data-is-update') === '1',
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

function collectFormData (e) {
	e.preventDefault();
	const id = $(form).attr('data-id');

    const formTitle = form.find('.form-title').val(),
        shortDescription = form.find('.short-description').val(),
        fullDescription = form.find('.full-description').val(),
        shortLocation = form.find('.short-location').val(),
        fullLocation = form.find('.full-location').val(),
        dateMeeting = form.find('.date-meeting').val(),
        additionalInfo = form.find('.additional-info').val(),
        pageDescription = form.find('.page-description').val(),
        _token = form.find('input[name="_token"]').val();

    const mainImage = $("#single_img span img").attr('src');
    const sliderImages = $("#list span img"),
    	sliderImageBase64 = sliderImages.toArray().map((sliderImg) => $(sliderImg).attr('src'));

    const dataToSend = {
    	_token,
        formTitle,
        shortDescription,
        fullDescription,
        shortLocation,
        fullLocation,
        dateMeeting,
        mainImage,
        additionalInfo,
        pageDescription,
        sliderImageBase64
    };

    submitForm(id, dataToSend);
}

form.on('submit', collectFormData);
