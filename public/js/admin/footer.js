
  function addSocial(parent) {
    const main = document.createElement("div")
    main.className = "partners"
    main.innerHTML = `
    <div class="form-group row">
    <label class="col-form-label col-lg-2 col-sm-12">Назва соціальної мережі</label>
    <div class="col-lg-6 col-md-9 col-sm-12">
        <input type="text" class="form-control" placeholder="">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-form-label col-lg-2 col-sm-12">Посилання</label>
    <div class="col-lg-6 col-md-9 col-sm-12">
        <input type="text" class="form-control" placeholder="">
        <span class="form-text text-muted">По кліку зображення переходить на посиланням</span> 
    </div>
  </div>

  <div class="form-group row">
    <label class="col-form-label col-lg-2 col-sm-12">Загрузка фото</label>
    <div class="col-lg-6 col-md-9 col-sm-12">
        <form enctype="multipart/form-data" method="post">
            <input type="file"class="form-control">
        </form> 
    </div>
  </div>
  <div class="form-group row">
    <button class="btn btn-brand-minus k-btn k-btn--icon but-minus col-form-label col-lg-2 col-sm-12 " id="brand_minus">
        <span> <i class="la la-minus"></i> <span>Видалити соціальну мережу</span> </span>
    </button>
  </div>`

    main.getElementsByClassName("btn")[0].onclick = () => {
        parent.removeChild(main)
    }
    
      console.log(main.className.length);
    
    
    parent.appendChild(main)
  }

  document.getElementById("social_plus").onclick = () => {
    addSocial(document.getElementById("partners_block"))
  }



  $("#social_minus").on('click',function(){
    
    $(this).parents('.partners').remove();
})


