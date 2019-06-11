const form = $('#news-announcements-form');


function submitForm (token, data, sliderImageBase64) {

	$.ajaxSetup({
		headers: {
	  		'X-CSRF-TOKEN': token
		}
	});

	$.ajax({
        url: '/admin/announcements',
        type: 'post',
        contentType: false,
        processData: false,
        data: {data, sliderImageBase64},
        success(response) {
            // console.log(response);
            // window.location.href();
        },
        error(err) {
            // console.log(err);
        }
    });
}

function collectFormData (e) {
	e.preventDefault();

    const formTitle = form.find('.form-title').val(),
        shortDescription = form.find('.short-description').val(),
        fullDescription = form.find('.full-description').val(),
        shortLocation = form.find('.short-location').val(),
        fullLocation = form.find('.full-location').val(),
        dateMeeting = form.find('.date-meeting').val(),
        mainImage = form.find('.main-image')[0].files[0],
        additionalInfo = form.find('.additional-info').val(),
        pageDescription = form.find('.page-description').val(),
        token = form.find('input[name="_token"]').val();



    const sliderImages = $("#list span img"),
        sliderImageBase64 = sliderImages.toArray().map((sliderImg) => $(sliderImg).attr('src'));

    // const dataToSend = {
    //     formTitle,
    //     shortDescription,
    //     fullDescription: 'test',
    //     shortLocation,
    //     fullLocation,
    //     dateMeeting,
    //     mainImage,
    //     additionalInfo,
    //     pageDescription,
    //     sliderImageBase64
    // };



    let dataToSend = new FormData();
	dataToSend.append('formTitle', formTitle);
	dataToSend.append('shortDescription', shortDescription);
	dataToSend.append('fullDescription', 'text');
	dataToSend.append('shortLocation', shortLocation);
	dataToSend.append('fullLocation', fullLocation);
	dataToSend.append('dateMeeting', dateMeeting);
	dataToSend.append('mainImage', mainImage);
	dataToSend.append('additionalInfo', additionalInfo);
	dataToSend.append('pageDescription', pageDescription);

	// dataToSend.append('sliderImageBase64', sliderImageBase64);


	// formData.append('_token', _token);


    submitForm(token, dataToSend, sliderImageBase64);
}


form.on('submit', collectFormData);
