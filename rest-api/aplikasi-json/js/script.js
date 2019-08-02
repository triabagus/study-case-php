function tampilMenu() {
    $.getJSON('data/juz.json', function (data) {
        let menu = data.menu;
        $.each(menu, function (i, data) {
            $("#daftar-menu").append('<div class="col-md-4"><div class="card"><img class="card-img-top" src="img/' + data.img + '"><div class="card-body"><h5 class="card-title">' + data.product + '</h5><h5 class="card-title">' + data.price + '</h5><p class="card-text">Stock = ' + data.stock + '. Some quick example text to build on the card title and make up the bulk of the cards content.</p><a href="#" class="btn btn-primary">Pesan</a></div></div></div>');
        });
    });
}

tampilMenu();

$('.nav-link').on('click', function () {
    $('.nav-link').removeClass('active');
    $(this).addClass('active');

    let kategori = $(this).html();
    $('h1').html(kategori);

    if (kategori == 'All Menu') {
        tampilMenu();
        return;
    }


    $.getJSON('data/juz.json', function (data) {
        let menu = data.menu;
        let content = '';

        $.each(menu, function (i, data) {
            if (data.kategori == kategori.toLowerCase()) {
                content += '<div class="col-md-4"><div class="card"><img class="card-img-top" src="img/' + data.img + '"><div class="card-body"><h5 class="card-title">' + data.product + '</h5><h5 class="card-title">' + data.price + '</h5><p class="card-text">Stock = ' + data.stock + '. Some quick example text to build on the card title and make up the bulk of the cards content.</p><a href="#" class="btn btn-primary">Pesan</a></div></div></div>';
            }
        });

        $('#daftar-menu').html(content);
    });


});