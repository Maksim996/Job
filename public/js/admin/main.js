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


WebFont.load({
    google: {
"families":[
"Poppins:300,400,500,600,700"]},

    active: function() {

        sessionStorage.fonts = true;
    }
});

function handleFileSelect(evt) {
    var files = evt.target.files; 

      for (var i = 0, f; f = files[i]; i++) {
  
        if (!f.type.match('image.*')) {
          continue;
        }
    
        var reader = new FileReader();
  
        reader.onload = (function(theFile) {
          return function(e) {
            var span = document.createElement('span');
            span.innerHTML = ['<img class="thumb" src="', e.target.result,
              '" title="', escape(theFile.name), '"/>'
            ].join('');
            document.getElementById('list').insertBefore(span, null);
          };
        })(f);
  
        reader.readAsDataURL(f);
        
      }    
  }
  





  document.getElementById('files').addEventListener('change',handleFileSelect, false);


  
  document.getElementById('list').addEventListener('click', (evt) => {
     evt.target.parentNode.removeChild(evt.target);
  });
