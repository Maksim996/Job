var KAppOptions = {

    "colors": {

        "state": {

            "brand": "#5d78ff",

            "metal": "#c4c5d6",

            "light": "#ffffff",

            "accent": "#00c5dc",

            "primary": "#5867dd",

            "success": "#34bfa3",

            "info": "#36a3f7",

            "warning": "#ffb822",

            "danger": "#fd3995",

            "focus": "#9816f4"
        },

        "base": {

            "label": [

                "#c5cbe3",

                "#a1a8c3",

                "#3d4465",

                "#3e4466"
            ],

            "shape": [

                "#f0f3ff",

                "#d9dffa",

                "#afb4d4",

                "#646c9a"
            ]
        }
    }
};
// $('input[name="img_path"]').on('change', function () {
//     let reader = new FileReader();
//     reader.onload = function (e) {
//         $('#blah')
//             .attr('src', e.target.result);
//
//     };
//     reader.readAsDataURL(this.files[0]);
// });


function handleChangeImage(e) {
    let target = $(this).parents('.form-group').find('.preview_img');
    let file = e.target.files[0];
    if ((file.type == 'image/jpeg' || file.type =='image/png' || file.type =='image/jpg' || file.type =='image/svg+xml' ) && file.size < 5241880) {
        imgSelectPriview(this, target )
    }
}

$('body').find('.inp_footer_img').on('change', handleChangeImage);

$('.inp_partner_img').on('change', function (e) {
    let file = e.target.files[0];
    if ((file.type == 'image/jpeg' || file.type =='image/png' || file.type =='image/jpg' || file.type =='image/svg+xml' ) && file.size < 5241880) {
        imgSelectPriview(this,'#blah' )
    }
});
$('.inp_header_img').on('change', function (e) {
    let file = e.target.files[0];
    if ((file.type == 'image/jpeg' || file.type =='image/png' || file.type =='image/jpg' || file.type =='image/svg+xml' ) && file.size < 5241880) {
        imgSelectPriview(this,'#blah' )
    }
});
function imgSelectPriview(evt, block_img) {
    let reader = new FileReader();
    reader.onload = function (evt) {
        $(block_img)
            .attr('src', evt.target.result);

    };
    reader.readAsDataURL(evt.files[0]);
}

//
// WebFont.load({
//     google: {
// "families":[
// "Poppins:300,400,500,600,700"]},
//
//     active: function() {
//
//         sessionStorage.fonts = true;
//     }
// });

// function handleFileSelect(evt) {
//     var files = evt.target.files; 

//       for (var i = 0, f; f = files[i]; i++) {
  
//         if (!f.type.match('image.*')) {
//           continue;
//         }
    
//         var reader = new FileReader();
  
//         reader.onload = (function(theFile) {
//           return function(e) {
//             var span = document.createElement('span');
//             span.innerHTML = ['<img class="thumb" src="', e.target.result,
//               '" title="', escape(theFile.name), '"/>'
//             ].join('');
//             document.getElementById('list').insertBefore(span, null);
//           };
//         })(f);
  
//         reader.readAsDataURL(f);
        
//       }    
//   }
  

//   document.getElementById('files'##).addEventListener('change',handleFileSelect, false);

//   document.getElementById('list').addEventListener('click', (evt) => {
//      evt.target.parentNode.removeChild(evt.target);
//   });




// document.getElementById('brand_plus').addEventListener('click', () => {
  
//   var original = document.getElementById('duplicater');
//   let counts= document.getElementsByClassName('partners')

//   var clone = original.cloneNode(true); 
  
//   var count= counts.length;
//   clone.id = "duplicater" + count;
//   // buttonMinus.id ='brand_minus'+ ++count;
//   // or clone.id = ""; if the divs don't need an ID
//   original.parentNode.appendChild(clone);
 
// });


// function addBlock(parent) {
//     const main = document.createElement("div")
//     main.className = "partners"
//     main.innerHTML = `
//     <div class="form-group row">
//     <label class="col-form-label col-lg-2 col-sm-12">Ім'я партнера</label>
//     <div class="col-lg-6 col-md-9 col-sm-12">
//         <input type="text" class="form-control" placeholder="">
//     </div>
//   </div>

//   <div class="form-group row">
//     <label class="col-form-label col-lg-2 col-sm-12">Посилання</label>
//     <div class="col-lg-6 col-md-9 col-sm-12">
//         <input type="text" class="form-control" placeholder="">
//         <span class="form-text text-muted">По кліку на заголовок переходить на посиланням ...</span> 
//     </div>
//   </div>

//   <div class="form-group row">
//     <label class="col-form-label col-lg-2 col-sm-12">Загрузка фото</label>
//     <div class="col-lg-6 col-md-9 col-sm-12">
//         <form enctype="multipart/form-data" method="post">
//             <input type="file"class="form-control">
//         </form> 
//     </div>
//   </div>
//   <div class="form-group row">
//     <button class="btn btn-brand-minus k-btn k-btn--icon but-minus col-form-label col-lg-2 col-sm-12 " id="brand_minus">
//         <span> <i class="la la-minus"></i> <span>Видалити бренд</span> </span>
//     </button>
//   </div>`

//     main.getElementsByClassName("btn")[0].onclick = () => {
//         parent.removeChild(main)
//     }

//     parent.appendChild(main)
//   }

//   document.getElementById("brand_plus").onclick = () => {
//     addBlock(document.getElementById("partners_block"))
//   }



//   $("#brand_minus").on('click',function(){

//     $(this).parents('.partners').remove();
//   })



  // function addBlock(parent) {
  //   const main = document.createElement("div")
  //   main.className = "partners"
  //   main.innerHTML = `
  //   <div class="form-group row">
  //   <label class="col-form-label col-lg-2 col-sm-12">Назва соціальної мережі</label>
  //   <div class="col-lg-6 col-md-9 col-sm-12">
  //       <input type="text" class="form-control" placeholder="">
  //   </div>
  // </div>

  // <div class="form-group row">
  //   <label class="col-form-label col-lg-2 col-sm-12">Посилання</label>
  //   <div class="col-lg-6 col-md-9 col-sm-12">
  //       <input type="text" class="form-control" placeholder="">
  //       <span class="form-text text-muted">По кліку зображення переходить на посиланням</span> 
  //   </div>
  // </div>

  // <div class="form-group row">
  //   <label class="col-form-label col-lg-2 col-sm-12">Загрузка фото</label>
  //   <div class="col-lg-6 col-md-9 col-sm-12">
  //       <form enctype="multipart/form-data" method="post">
  //           <input type="file"class="form-control">
  //       </form> 
  //   </div>
  // </div>
  // <div class="form-group row">
  //   <button class="btn btn-brand-minus k-btn k-btn--icon but-minus col-form-label col-lg-2 col-sm-12 " id="brand_minus">
  //       <span> <i class="la la-minus"></i> <span>Видалити соціальну мережу</span> </span>
  //   </button>
  // </div>`

  //   main.getElementsByClassName("btn")[0].onclick = () => {
  //       parent.removeChild(main)
  //   }

  //   parent.appendChild(main)
  // }

  // document.getElementById("social_plus").onclick = () => {
  //   addBlock(document.getElementById("partners_block"))
  // }



  // $("#social_minus").on('click',function(){

  //   $(this).parents('.partners').remove();
  // })

