<script>
    document.getElementById("image").addEventListener('change', cambiarImagen);

    function cambiarImagen(event) {
        var file = event.target.files[0];

        var reader = new FileReader();
        reader.onload = (event) => {
            document.getElementById("picture").setAttribute('src', event.target.result);
        };

        reader.readAsDataURL(file);
    }
</script>

<script>
    window.onload = function() {
        var images = document.getElementById("images");
        images.onchange = function() {
            if (typeof(FileReader) != "undefined") {
                var pictures = document.getElementById("pictures");
                pictures.innerHTML = "";
                var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png|.webp)$/;
                for (var i = 0; i < images.files.length; i++) {
                    var file = images.files[i];
                    if (regex.test(file.name.toLowerCase())) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var img = document.createElement("IMG");

                            img.src = e.target.result;
                            pictures.appendChild(img);
                        }
                        reader.readAsDataURL(file);
                    }
                }
            }
        }
    };
</script>
