
const pluc = document.querySelector('#plus');
const dropdownBar = document.querySelector('#dropdownBar');
const selectBut= $('.sel_change');  
const contactChoice1 =  document.querySelector('#linkBar1');
const contactChoice2 =  document.querySelector('#linkBar2');
// let extString = document.querySelector(".extString");

// select link or dropdown
const radioBut= $('input[name="type"]');  
jQuery(document).ready(function(){
    let e = $('input[name="type"]:checked');
    changeVal(e);
});

function changeVal(e) {
    const target_ch= $(e);
    const linked = $("#linkBar1").find('input[name="link"]');
    const fil =$("#linkBar2").find('input[name="file"]');
    if (target_ch.val() == 'link'){
       contactChoice1.style.display='flex';
        linked.addClass('required');
        fil.removeClass('required');
       contactChoice2.style.display='none';
    } else if (target_ch.val() == 'file'){
       contactChoice2.style.display='flex';
       contactChoice1.style.display='none';
        linked.removeClass('required');
        fil.addClass('required');
    }
}

radioBut.on('change',function(){
    changeVal(this)
}  );


//end



// add new block in dropdown

function add(parent) {
    let count = $('#countSubcats').val();
     
    console.log(count);
    const mains = document.createElement("div")
    mains.className = "partnerss border"
    mains.innerHTML = `
                <div class="form-group row ">
                    <label class="col-form-label col-lg-2 col-sm-12">Title</label>
                    <div class="col-lg-8 col-md-9 col-sm-12">
                        <input type="text" class="form-control" name="subcatTitle[${count}]" placeholder="">
                        <input type="text" class='subIdsField' name="id[${count}]" style="display:none" value="0">
                    </div>
                </div>
                
                <div class='row' >
                    <div class="form-group col-lg-6 col-md-9  col-sm-12">
                        <select class="col-lg-6 col-md-9 ml-5 col-sm-12 sel_change" name="subcatSelect[${count}]">                  
                            <option value= "external">Зовнішнє</option>
                            <!--<option value= "news">Новини</option>-->
                            <!--<option value= "home">Головна</option>-->
                            <option value= "documents">Документы</option> 
                            <option value= "pracevlashtuvannya-praktika">Працевлаштування та практика</option>                      
                        </select>
                    </div>
                    
                    <div class="form-group row mt-3 extString">
                        <label class="col-form-label col-lg-6 col-sm-12">Зовнішнє</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input type="text" class="form-control" placeholder="" name="subcatLink[${count}]">
                        </div>
                    </div>
                </div>     
                <div class="form-group row">
                    <button type="button" class="btn btn-brand-minus k-btn k-btn--icon but-minus col-form-label mt-5 col-lg-2 col-sm-12 " id="minus">
                        <span> <i class="la la-minus"></i> <span>Видалити</span> </span>
                    </button>
                </div>      `
    $('#countSubcats').val(parseInt(count, 10)+1);
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

  /*document.getElementById("plus").onclick = () => {
    add(document.getElementById("dropdownBar"))
  }*/


 
  $(".minus").on('click', (e) => {
    e.preventDefault();

    let id = $(e.target).closest('.partnerss').children('input').val();
    if(id != 0) {
        $.ajax({
                     headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                   url: "/admin/delete-subcategory",
                   method: 'post',
                   data : {'id':id},
                    dataType: 'json',    
                   success: function(res){
                    $(e.target).closest('.partnerss').remove();
                    
                   
                       //alert("Success");
                       //location.href = "http://job.test/admin/partners"
                   }
               }); 
    };
    

    
});


//end

//change in select External


jQuery(document).ready(function(){
    $( ".sel_change").each(function() {
        selectVal(this);
    });
});

function selectVal(j){
let target_sel= $(j); 
const extString = $('body').find(".extString");
const requiredField =  $('body').find(".requiredField");
const table = $('body').find(".tableHide");
    if (target_sel.val()=='external'){
        extString.show('slow');
        table.hide('slow');
        requiredField.addClass("required");
    } else {
        extString.hide('slow');
        table.show('slow');
        requiredField.removeClass("required");

    }
}
selectBut.on('change',function(){
    selectVal(this)
}  );

//end
