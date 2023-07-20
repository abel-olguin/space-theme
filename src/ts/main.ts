jQuery(document).ready(function($) {
    $('#tabs').tabs({ activate: function(event ,ui){
            $('#destination-image').hide();
            $('#destination-image').attr('src', $(ui.newTab[0]).data('image'));
            $('#destination-image').show('slow');

        } });

    $('#toggleMenu').on('click', () => {
        $('#menu-default').toggleClass('hidden')
    })
})