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
    'title_ru','content_ru'
];
arr_practic_header_us =[
    'title_us','content_us'
];
arr_practic_card_ru =[
    'card_title1_ru','card_title2_ru','card_title3_ru','card_description1_ru','card_description2_ru','card_description3_ru'
];
arr_practic_card_us =[
    'card_title1_us','card_title2_us','card_title3_us','card_description1_us','card_description2_us','card_description3_us'
];
arr_announcement_ru =[
    'title_ru','short_description_ru','full_description_ru','short_location_ru','full_location_ru',
];
arr_announcement_us =[
    'title_us','short_description_us','full_description_us','short_location_us','full_location_us',
];
arr_news_ru =[
    'title_ru','short_description_ru','full_description_ru',
];
arr_news_us =[
    'title_us','short_description_us','full_description_us',
];
arr_documents_ru=[
    'title_ru'
];
arr_documents_us=[
    'title_us'
];
arr_nav_ru=[
    'title_ru'
];
arr_nav_us=[
    'title_us'
];
function parseUrl(){
    let name_route = location.pathname.split("/")[2]
    switch (name_route) {
        case 'header':{
            updateReqiureFieldsLocal(arr_header_ru);
            updateReqiureFieldsLocal(arr_header_us);
        }
        break;
        case 'practic-cards':{
            updateReqiureFieldsLocal(arr_practic_card_ru);
            updateReqiureFieldsLocal(arr_practic_card_us);
        }
        break;
        case 'practic-header':{
            updateReqiureFieldsLocal(arr_practic_header_ru);
            updateReqiureFieldsLocal(arr_practic_header_us);
        }
        break;
        case 'announcements':{
            updateReqiureFieldsLocal(arr_announcement_ru);
            updateReqiureFieldsLocal(arr_announcement_us);
        }
        break;
        case 'news':{
            updateReqiureFieldsLocal(arr_news_ru);
            updateReqiureFieldsLocal(arr_news_us);
        }
        break;
        case 'documents':{
            updateReqiureFieldsLocal(arr_news_ru);
            updateReqiureFieldsLocal(arr_news_us);
        }
        break;
        case 'nav':{
            updateReqiureFieldsLocal(arr_nav_ru);
            updateReqiureFieldsLocal(arr_nav_us);
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
