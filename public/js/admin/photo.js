function handleFilesSelect(evt, inputId) {
    var files = evt.target.files;
    for (var i = 0, f; f = files[i]; i++) {
    // work
        // if (!f.type.match('image.*')) {
        //     continue;
        // }

        if (f.type == 'image/jpeg' || f.type =='image/png' || f.type =='image/jpg') {
        } else {
            document.getElementById('files').value = "";
            continue;
        }
        var reader = new FileReader();
        reader.onload = (function(theFile) {
            return function(e) {
                var span = document.createElement('span');
                span.innerHTML = ['<img class="thumb" src="', e.target.result,
                    '" title="', escape(theFile.name), '">'
                ].join('');
                document.getElementById(inputId).insertBefore(span, null);
            };
        })(f);
        reader.readAsDataURL(f);
    }
}

function handleFileSelect(evt, inputId) {
    var file = evt.target.files[0];
    var reader = new FileReader();
    reader.onload = (function(theFile) {
        return function(e) {
            document.getElementById(inputId).innerHTML = '';
            var span = document.createElement('span');
            span.innerHTML = ['<img class="thumb" src="', e.target.result,
                '" title="', escape(theFile.name), '">'
            ].join('');
            document.getElementById(inputId).appendChild(span);
        };
    })(file);
    reader.readAsDataURL(file);
}

document.getElementById('files').addEventListener('change', (evt) => {
    handleFilesSelect(evt, 'list');
}, false);

document.getElementById('list').addEventListener('click', (evt) => {
    evt.target.parentNode.removeChild(evt.target);
});

document.getElementById('main_image').addEventListener('change', (evt) => {
    handleFileSelect(evt, 'single_img');
}, false);

document.getElementById('single_img').addEventListener('click', (evt) => {
    evt.target.parentNode.removeChild(evt.target);
});
