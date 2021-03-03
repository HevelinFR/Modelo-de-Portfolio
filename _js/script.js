$(function() {
    $('nav.mobile').click(function() {
        //o que vai aconecer quando clicarmos na nav.mobile!

        var listaMenu = $('nav.mobile ul');
        /*
        if (listaMenu.is(':hidden') == true) {
            listaMenu.fadeIn();
        } else {
            listaMenu.fadeOut();
        } */
        listaMenu.slideToggle();


    })

    if ($('target').length > 0) {
        //o elemento existe, portanto precisamos dar scroll em algum elememto.
        var elemento = '#' + $('target').attr('target');
        var divScroll = $(elemento).offset().top;

        $('html,body').animate({ scrollTop: divScroll });
    }



})