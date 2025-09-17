/*Tag dos Produtos*/
$(document).ready(function () {
    $(".tag").addClass("visible");
});

/*Slider*/
let count = 1;
let radio1 = document.getElementById("radio1");

if (radio1) {
    radio1.checked = true;

    setInterval(function() {
        nextImage();
    }, 3000);

    function nextImage(){
        count++;
        if(count > 4){
            count = 1;
        }
        let radio = document.getElementById("radio" + count);
        if (radio) {
            radio.checked = true;
        }
    }
}

/*Cabeçalho*/
$(document).ready(function() {
    $(".menu-hamburguer").click(function () {
        if ($(".menu-login").hasClass('active')) {
            $(".menu-login").removeClass('active');
        }
        $(".menu").toggleClass("active");
    });

    $("#login").click(function () {
        if ($(".menu").hasClass('active')) {
            $(".menu").removeClass('active');
        }
        $(".menu-login").toggleClass("active");
    });

    $(document).click(function(event) {
        if (!$(event.target).closest(".menu-hamburguer, .menu").length) {
            $(".menu").removeClass("active");
        }
        if (!$(event.target).closest("#login, .menu-login").length) {
            $(".menu-login").removeClass("active");
        }
    });
});
