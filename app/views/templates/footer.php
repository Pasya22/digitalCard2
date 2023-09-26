<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script src="https://kit.fontawesome.com/09e00d7278.js" crossorigin="anonymous"></script>
<script src="<?= BASEURL; ?>js/script.js"></script>
<script>
    var splide = new Splide("#main-slider", {
        height: 570,
        pagination: false,
        arrows: false,
        cover: true
    });

    var thumbnails = document.getElementsByClassName("thumbnail");
    var current;

    for (var i = 0; i < thumbnails.length; i++) {
        initThumbnail(thumbnails[i], i);
    }

    function initThumbnail(thumbnail, index) {
        thumbnail.addEventListener("click", function() {
            splide.go(index);
        });
    }

    splide.on("mounted move", function() {
        var thumbnail = thumbnails[splide.index];

        if (thumbnail) {
            if (current) {
                current.classList.remove("is-active");
            }

            thumbnail.classList.add("is-active");
            current = thumbnail;
        }
    });

    splide.mount();
</script>
<script>
    new Splide('.splidex', {
        type: 'loop',
        reducedMotion: {
            interval: 5000,
            speed: 2000,
            autoplay: "play"
        }
    }).mount();
</script>
<script>
    new Splide('.category', {
        perPage: 10,
        arrows: false,
        pagination: false,
        autoWidth: true,
    }).mount();
</script>
<script>
    $('input').focus(function() {
        $(this).parents('.form-group').addClass('focused');
    });

    $('input').blur(function() {
        var inputValue = $(this).val();
        if (inputValue == "") {
            $(this).removeClass('filled');
            $(this).parents('.form-group').removeClass('focused');
        } else {
            $(this).addClass('filled');
        }
    })
</script>
<script>
    var button = document.querySelectorAll('.button-cat');
    var category = document.querySelectorAll('.contentCategory');

    category[0].style.display = 'flex ';
    button[0].classList.toggle('active');
    for (let i = 0; i < button.length; i++) {
        button[i].addEventListener('click', function() {
            for (let a = 0; a < button.length; a++) {
                category[a].style.display = 'none';
                button[a].classList.remove('active');
            }
            category[i].style.display = 'flex ';
            button[i].classList.toggle('active');
        })
    }
</script>
</body>

</html>