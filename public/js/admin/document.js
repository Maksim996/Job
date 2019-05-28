function addDocument(parent) {
    const main = document.createElement("div")
    main.className = "documents"
    main.innerHTML = `
    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Категорія документу:</label>
                        <select class="" required>
                            <option value="">Вибрати</option>
                            <option value="Norm">Нормативні</option>
                            <option value="Rada">Рада роботодавців</option>
                            <option value="Other">Інші</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Заголовок документу</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Посилання</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input type="text" class="form-control" placeholder="">
                            <span class="form-text text-muted">По кліку переходить на посиланням ...</span> 
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Загрузка документу</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <form enctype="multipart/form-data" method="post">
                                <input type="file"class="form-control">
                            </form> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <button class="btn btn-brand-minus k-btn k-btn--icon but-minus col-form-label col-lg-2 col-sm-12 " id="docuement_minus">
                            <span> <i class="la la-minus"></i> <span>Видалити документ</span> </span>
                        </button>
                    </div>`

    main.getElementsByClassName("btn")[0].onclick = () => {
        parent.removeChild(main)
    }

    parent.appendChild(main)
  }

  document.getElementById("document_plus").onclick = () => {
    addDocument(document.getElementById("documents_block"))
  }



  $("#document_minus").on('click',function(){

    $(this).parents('.documents').remove();
  })