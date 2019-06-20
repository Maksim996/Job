let ru, us,
    arr_header_ru,
    arr_header_us,
    arr_practic_header_ru,
    arr_practic_header_us;

ru = $('input[loc-name="local_ru"]');
us = $('input[loc-name="local_us"]');
arr_header_ru = [
    'title_ru','content_ru'
];
arr_header_us = [
    'title_us','content_us'
];
arr_practic_header_ru =[
    'card_title_ru','card_description_ru'
];
arr_practic_header_us =[
    'card_title_us','card_description_us'
]
function parseUrl(){
    let name_route = location.pathname.split("/")[2]
    switch (name_route) {
        case 'header':{
            updateReqiureFieldsLocal(arr_header_ru);
            updateReqiureFieldsLocal(arr_header_us);
        }
        break;
        case 'practic-cards':{
            updateReqiureFieldsLocal(arr_practic_header_ru);
            updateReqiureFieldsLocal(arr_practic_header_us);

        }
        break;
    }
}

function checkLocal(tag,block){
    let t =  tag.val();
    let tt = '#' + t;
    if(tag.prop('checked')){
        $(tt).show("slow");
    } else{
        $(tt).hide("slow");
    }
}

function updateCheckLocal() {
    for(let i=0; i<$('input[loc-name^="local_"]').length; i++){
        let input = $('input[loc-name^="local_"]')[i];
        let t =  $(input).val();
        let tt = '#' + t;
        $(input).prop('checked')? $(tt).show("slow") : $(tt).hide("slow");
    }
}
function updateReqiureFieldsLocal(arr) {
    for(let i=0; i<$('input[loc-name^="local_"]').length; i++){
        let input = $('input[loc-name^="local_"]')[i];
        reqiureFieldsLocal($(input) , arr);
    }
}
function reqiureFieldsLocal(tag, arr){
    let t =  tag.val();
    let tt = '#' + t;
    for(let i=0;i<arr.length; i++ ){
        if(tag.prop('checked')){
            $(tt).find('input[name='+ arr[i]+"]").addClass('required');
            $(tt).find( 'textarea[name='+ arr[i]+"]" ).addClass('required');
        } else{
            $(tt).find('input[name='+ arr[i]+"]").removeClass('required');
            $(tt).find( 'textarea[name='+ arr[i]+"]").removeClass('required');
        }
    }

}


$('input[name="img_path"]').on('change', function () {
    let reader = new FileReader();
    reader.onload = function (e) {
        $('#blah')
            .attr('src', e.target.result);

    };
    reader.readAsDataURL(this.files[0]);
})


updateCheckLocal();
parseUrl();
ru.on('change', function () {
    checkLocal($(this));
    parseUrl()
});
us.on('change', function () {
    checkLocal($(this));
    parseUrl();
});
