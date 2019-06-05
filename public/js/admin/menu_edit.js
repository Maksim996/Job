const contactChoice1 =  document.querySelector('#linkBar1');
const contactChoice2 =  document.querySelector('#linkBar2');
const pluc = document.querySelector('#plus');
const dropdownBar = document.querySelector('#dropdownBar');
const selectBut= $('.sel_change');  
// let extString = document.querySelector(".extString");



// select link or dropdown
const radioBut= $('input[name="contact"]');  
jQuery(document).ready(function(){
    let e = $('input[name="contact"]:checked');
    changeVal(e);
});

function changeVal(e){
const target_ch= $(e);    
    if (target_ch.val()=='link'){
       contactChoice1.style.display='flex';
       contactChoice2.style.display='none';
       pluc.style.display='none';
       dropdownBar.style.display='none';
    } else if (target_ch.val()=='dropdown'){
       contactChoice2.style.display='flex';
       contactChoice1.style.display='none';
       pluc.style.display='flex';
       dropdownBar.style.display="block";
    }
}

radioBut.on('change',function(){
    changeVal(this)
}  );


//end

// add new block in dropdown

function add(parent) {
    let count = $('#countSubcats').val()+1;
    const mains = document.createElement("div")
    mains.className = "partnerss border"
    mains.innerHTML = `
                <div class="form-group row ">
                    <label class="col-form-label col-lg-2 col-sm-12">Title</label>
                    <div class="col-lg-8 col-md-9 col-sm-12">
                        <input type="text" class="form-control" name="subcatTitle[${count}]" placeholder="">
                        <input type="text" name="id${count}" style="display:none" value="0">
                    </div>
                </div>
                
                <div class='row' >
                    <div class="form-group col-lg-6 col-md-9  col-sm-12">
                        <select class="col-lg-6 col-md-9 ml-5 col-sm-12 sel_change" name="subcatSelect${count}">                  
                            <option value= "External">Зовнішнє</option>
                            <option value= "News">news</option>
                            <option value= "Home">home</option>
                            <option value= "Documents">Documents</option>                      
                        </select>
                    </div>
                    
                    <div class="form-group row mt-3 extString">
                        <label class="col-form-label col-lg-6 col-sm-12">Зовнішнє</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input type="text" class="form-control" placeholder="" name="subcatLink${count}">
                        </div>
                    </div>
                </div>     
                <div class="form-group row">
                    <button class="btn btn-brand-minus k-btn k-btn--icon but-minus col-form-label mt-5 col-lg-2 col-sm-12 " id="minus">
                        <span> <i class="la la-minus"></i> <span>Видалити</span> </span>
                    </button>
                </div>      `

    mains.getElementsByClassName("btn")[0].onclick = () => {
        parent.removeChild(mains)
        //$('#countSubcats').val($('#countSubcats').val()-1);
    }

    parent.appendChild(mains);
    const selectBut= $('.sel_change');  
    selectBut.off('change');
   
    selectBut.on('change',function(){
        selectVal(this)
    
    }  );
  }

  document.getElementById("plus").onclick = () => {
    add(document.getElementById("dropdownBar"))
  }



  $("#minus").on('click',function(){

    $(this).parents('.partnerss').remove();
})


//end

//change in select External


jQuery(document).ready(function(){
    $( ".sel_change").each(function() {
        selectVal(this);
    });
});

function selectVal(j){
let target_sel= $(j); 
const extString = $(j).parents(".row").find(".extString");
    if (target_sel.val()=='External'){
        extString.show();
    } else {
        extString.hide();
    }
}
selectBut.on('change',function(){
    selectVal(this)
}  );

//end
