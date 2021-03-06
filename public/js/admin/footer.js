function addSocial(parent) {
	const main = document.createElement("div");
	const allId = [];
	$("[data-id]").each(function(elem) {
		allId.push($($("[data-id]")[elem]).attr("data-id"))
	})
	if(allId.length != 0) {
		var newId = Math.max.apply(null, allId) + 1;
	} else {
		var newId = 1;
	}
    const networks = document.getElementsByClassName('social-networks').length;
	main.className = "k-portlet__body partners social-networks new-social";
	main.id = "partners_block";
	main.setAttribute('data-id', newId);
	main.innerHTML = `
	<div  id="duplicater">
		<div class="form-group row">
	        <label class="col-form-label col-lg-3 col-sm-12">Назва соціальної мережі</label>
	        <div class="col-lg-9 col-md-9 col-sm-12">
	            <input type="text" class="form-control social-name" placeholder="" name="social-name${networks}">
	            <span class="form-text text-muted">Наприклад: Telegram</span>
	        </div>
	    </div>		
		<div class="form-group row">
			<label class="col-form-label col-lg-3 col-sm-12">Посилання</label>
			<div class="col-lg-9 col-md-9 col-sm-12">
			    <input type="text" class="form-control social-link" name="social-link${networks}"> 
			    <span class="form-text text-muted">По кліку зображення переходить на посиланням</span> 
			</div>
		</div>
		<div class="form-group row">
		  <label class="col-form-label col-lg-3 col-sm-12">Кольор при наведенні на логотип соціальної мережі</label>
		  <div class="col-lg-9 col-md-9 col-sm-12">
		      <input type="text" class="form-control social-color" name="social-color_bg[]" value="#4267b2">
              <span class="form-text text-muted">Наприклад: rgb(0,0,0) або black або #000</span>
		  </div>
		</div>
		
		<div class="form-group row align-items-center">
            <label class="col-form-label col-lg-3 col-sm-12">Загрузка фото</label>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <figure class="figure">
                    <img  id="social-image" src="" class="preview_img  figure-img img-fluid rounded">
                    <figcaption class="figure-caption">Поточне зображення</figcaption>
                </figure>
            </div>
            <div class="col-lg-3 col-md-9 col-sm-12">
                <input type="file"
                       name="img_path_social${networks}"
                       class="inp_footer_img  social-image required">
                <span class="form-text text-muted">Розширення зображення: jpg, jpeg, png, svg.</span>
            </div>
        </div>
		
		
		<div class="form-group row justify-content-center col-lg-12">
			<button id="delLeftCol" del-id="{{$data['footer'][$i]->footer_id}}" type="button" class="btn btn-danger">
				<span>
					<span>Видалити соціальну мережу</span>
				</span>
			</button>
		</div>
	</div>	
`

	main.getElementsByClassName("btn")[0].onclick = () => {
		let elem = parent.children[parent.children.length - 1];
		axios.post('/admin/footer-delete', {id: $(elem).attr('data-id')});
		$(elem).remove();
	}
	parent.appendChild(main)
}

document.getElementById("info_plus").onclick = () => {
	const block = document.getElementsByClassName('lef_block').length;
	if (block < 7){
        addInfo(document.getElementsByClassName("left-column-container")[0]);
        let inputImages = $('body').find('.inp_footer_img');
        inputImages.off('change');
        inputImages.on('change', handleChangeImage);
    }

	else alert('Максимальна кільскість соціальних мереж 7')
};

document.getElementById("social_plus").onclick = () => {
    const networks = document.getElementsByClassName('social-networks').length;
    if (networks < 7){
        addSocial(document.getElementsByClassName("social-networks-container")[0]);
        let inputImages = $('body').find('.inp_footer_img');
        inputImages.off('change');
        inputImages.on('change', handleChangeImage);
    }
    else alert('Максимальна кільскість соціальних мереж 7')
};

$('button#delLeftCol').click(function(e) {
	e.preventDefault();
	axios.post('/admin/footer-delete', {id: $(this).attr('del-id')}).then( (response) => {
		console.log(response);
	})
		.catch( (err) => {
			console.log(err);
		});
	$(this).parents('.partners').remove();
});

$('button#delSocial').click(function(e) {
	e.preventDefault();
	axios.post('/admin/footer-delete', {id: $(this).attr('del-id')}).then( (response) => {
		console.log(response);
	})
		.catch( (err) => {
			console.log(err);
		})
	$(this).parents('.social-networks').remove();
});

function addInfo(parent) {
	const infoMain = document.createElement("div");
	const allId = [];
	$("[data-id]").each(function(elem) {
		allId.push($($("[data-id]")[elem]).attr("data-id"))
	})
	if(allId.length != 0) {
		var newId = Math.max.apply(null, allId) + 1;
	} else {
		var newId = 1;
	}
    const block = document.getElementsByClassName('lef_block').length;

	infoMain.className = 'k-portlet__body partners left-footer-column new-info';
	infoMain.id = 'info_block';
	infoMain.setAttribute('data-id', newId);
	infoMain.innerHTML = `
	<div class="info  lef_block " id="duplicater">
		<div class="form-group row">
		    <label class="col-form-label col-lg-3 col-sm-12">Ім'я</label>
		    <div class="col-lg-9 col-md-9 col-sm-12">
		        <input type="text" class="form-control item-name" name="left-name${block}" placeholder="">
		        <span class="form-text text-muted">Наприклад: локація</span> 
		    </div>
		</div>
		
		<div class="form-group row align-items-center">
             <label class="col-lg-3 col-sm-12 col-form-label">Виберіть посилання чи звичайний текст</label>
             <div class="col-lg-6 col-md-9 col-sm-12">
				<div class="k-radio-inline ">
                    <label class="k-radio k-radio--bold k-radio--brand">
                        <input class="checkLink checkTypeLinTex" type="radio" checked="checked" id="link" name="contact${block}" value="1">
                        Посилання 
                        <span></span> 
                    </label>
                    <label class="k-radio k-radio--bold k-radio--brand">
                        <input class="checkText checkTypeLinTex" type="radio" id="text" name="contact${block}" value="0">
                       Звичайний текст
                       <span></span> 
                    </label>
				</div>
             </div>
        </div>
		
		<div class="form-group row ckeckLinkText">
             <label class="col-form-label col-lg-3 col-sm-12">Посилання</label>
             <div class="col-lg-9 col-md-9 col-sm-12">
                  <input type="text" class="form-control item-link required" placeholder=""  name="left-link${block}">
                  <span class="form-text text-muted">По кліку переходить за посиланням ...</span>
             </div>
        </div>
		
		<div class="form-group row">
		    <label class="col-form-label col-lg-3 col-sm-12">Інформація українською</label>
		    <div class="col-lg-9 col-md-9 col-sm-12">
		        <input type="text" class="form-control item-content_ua" name="left-content${block}" placeholder="">
		        <span class="form-text text-muted">Наприклад: Україна, м.Суми, вул. Римського-Корсакова,2, СумДУ, каб. Г-1012</span> 
		    </div>
		</div>
		
		<div class="form-group row">
		    <label class="col-form-label col-lg-3 col-sm-12">Інформація російською</label>
		    <div class="col-lg-9 col-md-9 col-sm-12">
		        <input type="text" class="form-control item-content_ru" name="left-content_ru${block}" placeholder="">
		        <span class="form-text text-muted">Например: Украина, г.Сумы, ул. Римского-Корсакова,2, СумГУ, каб. Г-1012</span> 
		    </div>
		</div>
		
		<div class="form-group row">
		    <label class="col-form-label col-lg-3 col-sm-12">Інформація англійською</label>
		    <div class="col-lg-9 col-md-9 col-sm-12">
		        <input type="text" class="form-control item-content_us" name="left-content_us${block}" placeholder="">
		        <span class="form-text text-muted">For example: Ukraine, c.Sumy, 2, Rymskogo-Korsakova st., SumDU, office. M-1012</span> 
		    </div>
		</div>  
		
		<div class="form-group row align-items-center">
		    <label class="col-form-label col-lg-3 col-sm-12">Загрузка фото</label>
		    <div class="col-lg-3 col-md-3 col-sm-6">
                <figure class="figure">
                    <img id="item-image" src="" class="preview_img  figure-img img-fluid rounded">
                    <figcaption class="figure-caption">Поточне зображення</figcaption>
                </figure>
            </div>
		    <div class="col-lg-3 col-md-9 col-sm-12">
		            <input type="file" name="img_path_left${block}" class="inp_footer_img item-image required"
		            accept="image/jpg,image/jpeg,image/png,image/svg+xml">
			</div>
		</div>  
		<div class="form-group row justify-content-center col-lg-12">
			<button id="delLeftCol" del-id="{{$data['footer'][$i]->footer_id}}" type="button" class="btn btn-danger">
				<span>
					<span>Видалити</span>
				</span>
			</button>
		</div>
	</div>`

	infoMain.getElementsByClassName("checkLink")[0].onclick = (e) => {

		// $(e.target).parents('div#info_block').find('input.item-link')[0].addClass('required');
		let tt = $(e.target).parents('div#info_block').find('input.item-link')[0];
		$(tt).addClass('required');
		$(e.target).parents('div#info_block').find('.ckeckLinkText').show('slow')
	};

	infoMain.getElementsByClassName("checkText")[0].onclick = (e) => {
		// $(e.target).parents('div#info_block').find('input.item-link')[0].removeClass("required")
        let tt = $(e.target).parents('div#info_block').find('input.item-link')[0];
        $(tt).removeClass('required');
		$(e.target).parents('div#info_block').find('.ckeckLinkText').hide('slow')
		// $(e.target).parents('div#info_block').find('input.item-link')[0].setAttribute("value", "")
	};

	infoMain.getElementsByClassName("btn")[0].onclick = () => {
		let elem = parent.children[parent.children.length - 1];
		axios.post('/admin/footer-delete', {id: $(elem).attr('data-id')});
		parent.removeChild(infoMain)
	};

	parent.appendChild(infoMain)
}



const formFooter = $('#form-footer');





const updateFooter = (data) => {
    axios.post('/admin/footer', data)
        .then( (response) => {
            console.log(response);

             window.location.href = '/admin/footer';
        })
        .catch( (err) => {
            console.log(err);
        });
};




const collectFooterData = (e) => {


	let formData = new FormData();


	const leftColumnBlocks = JSON.stringify([...formFooter.find('.left-footer-column')].map((block) => {

			let container = $(block),
				id = container.attr('data-id'),
				indexImage = `left-column-image-${id}`,
				image = container.find('.item-image')[0].files[0] || null;
			if(image == null && container.find('#item-image').attr('src') == '') {
				alert('Додайте зображення в розділ: Інформація про нас');
			} else {

				formData.append(indexImage, image);
				return {
					id,
					type: container.find('.left-type').val(),
					name: container.find('.item-name').val(),
					link:  container.find('.checkTypeLinTex:checked').val() == 1 ? container.find('.item-link').val() : null,
					content_ua: container.find('.item-content_ua').val(),
					content_ru: container.find('.item-content_ru').val(),
					content_us: container.find('.item-content_us').val(),
					img: container.find('#item-image').attr('src'),

				};

			}
		})),


		aboutUs = formFooter.find('.about-us-link'),
		aboutUsData = JSON.stringify({
			id: aboutUs.attr('data-id'),
			link: aboutUs.val()
		}),




		socialNetworks = JSON.stringify([...formFooter.find('.social-networks')].map( (socialNetwork) => {

			let container = $(socialNetwork),
				id = container.attr('data-id'),
				indexImage = `social-column-image-${id}`,
				image = container.find('.social-image')[0].files[0] || null;
			if(image == null && container.find('#social-image').attr('src') == '') {
				alert('Додайте зображення для соц-мереж');
			} else {
				formData.append(indexImage, image);
				return {
					id,
					type: container.find('.social-type').val(),
					link: container.find('.social-link').val(),
					name: container.find('.social-name').val(),
					color: container.find('.social-color').val(),
					img: container.find('#social-image').attr('src')
				}
			}
		}));


	formData.append('_token', formFooter.find('input[name="_token"]').val());
	formData.append('leftSide', leftColumnBlocks);
	formData.append('aboutUs', aboutUsData);
	formData.append('socialNetworks', socialNetworks);


    updateFooter(formData);

};
let ob = {};
for(let i=0; i<8; i++){
    ob = Object.assign(ob,{
        [`left-name${i}`]: {
            maxlength: 200,
            required: true
        },
        ['left-content'+i]: {
            required: true
        },
        ['left-content_ru'+i]: {
            required: true
        },
        ['left-content_us'+i]: {
            required: true
        },
        ['social-name'+i]:{
            required: true,
            maxlength: 200,
        },
        ['social-link'+i]:{
            required: true
        },
        ['img_path_left'+i]:{
            filesize: 5241880,
            extension: "jpg|png|jpeg|svg",
            accept: "image/jpg,image/jpeg,image/png,image/svg+xml",
        },
        ['img_path_social'+i]:{
            filesize: 5241880,
            extension: "jpg|png|jpeg|svg",
            accept: "image/jpg,image/jpeg,image/png,image/svg+xml",
        }

    },{
        'about-us-link':{
            required:true,
            maxlength:200
        }
    });
};
$("#form-footer").validate({
    rules: ob,
    invalidHandler: function(event, validator) {

        KUtil.scrollTo("document", -200);
    },
    submitHandler: function(form){
            collectFooterData();
    }

});


function updateselectLinkTextl() {
    for(let i=0; i<$('.checkTypeLinTex').filter(':checked').length;i++){
        let check = $('.checkTypeLinTex').filter(':checked')[i];
        let target = $(check).parents('.form-group').next();
        selectLinkText(check,target);
    }
}updateselectLinkTextl();

$('.checkTypeLinTex').on('change', function () {
    let target = $(this).parents('.form-group').next()
    selectLinkText(this, target)
});

function selectLinkText(t,target){
    if($(t).val()==0){
        target.hide('slow');
        target.find('input').removeClass('required');

    } else if($(t).val()==1){
        target.show('slow');
        target.find('input').addClass('required');
    }
};
