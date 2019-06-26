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
	main.className = "k-portlet__body social-networks new-social";
	main.id = "partners_block";
	main.setAttribute('data-id', newId);
	main.innerHTML = `
	<div class="partners" id="duplicater">
		<div class="form-group row">
	        <label class="col-form-label col-lg-2 col-sm-12">Назва соціальної мережі</label>
	        <div class="col-lg-9 col-md-9 col-sm-12">
	            <input type="text" class="form-control social-name" placeholder="" name="social-name${networks}">
	            <span class="form-text text-muted">Наприклад: Telegram</span>
	        </div>
	    </div>		
		<div class="form-group row">
			<label class="col-form-label col-lg-2 col-sm-12">Посилання</label>
			<div class="col-lg-9 col-md-9 col-sm-12">
			    <input type="text" class="form-control social-link" name="social-link${networks}"> 
			    <span class="form-text text-muted">По кліку зображення переходить на посиланням</span> 
			</div>
		</div>
		<div class="form-group row">
		  <label class="col-form-label col-lg-2 col-sm-12">Кольор при наведенні на логотип соціальної мережі</label>
		  <div class="col-lg-9 col-md-9 col-sm-12">
		      <input type="text" class="form-control social-color" name="social-color_bg[]" value="#4267b2">
              <span class="form-text text-muted">Наприклад: rgb(0,0,0) або black або #000</span>
		  </div>
		</div>
		
		<div class="form-group row align-items-center">
		<label class="col-form-label col-lg-2 col-sm-12">Загрузка фото</label>
		<div class="col-lg-3 col-md-9 col-sm-12">
		    <form enctype="multipart/form-data" method="post">
		        <input type="file" class="social-image">
		    </form> 
		</div>
		<img src="" id="social-image">
		</div>
		<div class="form-group row justify-content-center col-lg-12">
			<button id="delLeftCol" del-id="{{$data['footer'][$i]->footer_id}}" type="button" class="btn btn-danger col-2">
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
        addInfo(document.getElementsByClassName("left-column-container")[0])
    }
	else alert('Максимальна кільскість соціальних мереж 7')
};

document.getElementById("social_plus").onclick = () => {
    const networks = document.getElementsByClassName('social-networks').length;
    if (networks < 7){
        addSocial(document.getElementsByClassName("social-networks-container")[0])
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
	//const Countleftblock = document.getElementsByClassName('info');
	//console.log(Countleftblock);
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
	/*let count = Countleftblock.length;
	if(document.getElementById("info_plus").onclick = () => {
	}){
		count++;
		return count;
	}*/
    const block = document.getElementsByClassName('lef_block').length;

	infoMain.className = 'k-portlet__body left-footer-column new-info';
	infoMain.id = 'info_block';
	infoMain.setAttribute('data-id', newId);
	infoMain.innerHTML = `
	<div class="info partners lef_block " id="duplicater">
		<div class="form-group row">
		    <label class="col-form-label col-lg-2 col-sm-12">Ім'я</label>
		    <div class="col-lg-9 col-md-9 col-sm-12">
		        <input type="text" class="form-control item-name" name="left-name${block}" placeholder="">
		        <span class="form-text text-muted">Наприклад: локація</span> 
		    </div>
		</div>
		
		<div class="form-group row">
		    <label class="col-form-label col-lg-2 col-sm-12">Посилання</label>
		    <div class="col-lg-9 col-md-9 col-sm-12">
		        <input type="text" class="form-control item-link" name="left-link${block}"   placeholder="">
		        <span class="form-text text-muted">По кліку переходить на посиланням ...</span> 
		    </div>
		</div>
		
		
		<div class="form-group row">
		    <label class="col-form-label col-lg-2 col-sm-12">Інформація українською</label>
		    <div class="col-lg-9 col-md-9 col-sm-12">
		        <input type="text" class="form-control item-content_ua" name="left-content${block}" placeholder="">
		        <span class="form-text text-muted">Наприклад: Україна, м.Суми, вул. Римського,2, СумДУ, каб. Г-1012</span> 
		    </div>
		</div>
		
		<div class="form-group row">
		    <label class="col-form-label col-lg-2 col-sm-12">Інформація російською</label>
		    <div class="col-lg-9 col-md-9 col-sm-12">
		        <input type="text" class="form-control item-content_ru" name="left-content_ru${block}" placeholder="">
		        <span class="form-text text-muted">Наприклад: Україна, м.Суми, вул. Римського,2, СумДУ, каб. Г-1012</span> 
		    </div>
		</div>
		
		<div class="form-group row">
		    <label class="col-form-label col-lg-2 col-sm-12">Інформація англійською</label>
		    <div class="col-lg-9 col-md-9 col-sm-12">
		        <input type="text" class="form-control item-content_us" name="left-content_us${block}" placeholder="">
		        <span class="form-text text-muted">Наприклад: Україна, м.Суми, вул. Римського,2, СумДУ, каб. Г-1012</span> 
		    </div>
		</div>  
		
		<div class="form-group row align-items-center">
		    <label class="col-form-label col-lg-2 col-sm-12">Загрузка фото</label>
		    <div class="col-lg-3 col-md-9 col-sm-12">
		        <form enctype="multipart/form-data" method="post">
		            <input type="file" class=" item-image">
		        </form> 
			</div>
			<img src="" id="item-image">
			
		</div>  
		 
		<div class="form-group row justify-content-center col-lg-12">
			<button id="delLeftCol" del-id="{{$data['footer'][$i]->footer_id}}" type="button" class="btn btn-danger col-2">
				<span>
					<span>Видалити</span>
				</span>
			</button>
		</div>
	</div>`

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
					link: container.find('.item-link').val(),
					content_ua: container.find('.item-content_ua').val(),
					content_ru: container.find('.item-content_ru').val(),
					content_us: container.find('.item-content_us').val(),
					img: container.find('#item-image').attr('src')
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
        ["left-name"+i]: {
            maxlength: 200,
            required: true
        },
        ['left-link'+i]: {
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
 //formFooter.on('submit', collectFooterData);

