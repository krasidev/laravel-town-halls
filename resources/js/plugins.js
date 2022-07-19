/**
 * Function that initializes a button to delete text in an input field.
 */
 $(document).on('input propertychange', '.has-clear input[type="text"]', function() {
    var input = $(this);

    input.closest('.has-clear').find('.btn-clear').toggleClass('btn-clear-hidden', !Boolean(input.val()));
}).on('click', '.btn-clear', function() {
    $(this).closest('.has-clear').find('input[type="text"]').val('').trigger('propertychange').focus();
});

/**
 * Function that initializes a blur effect on main content when side nav is open on a mobile resolution.
 */
window.navbarNavInit = function() {
    var buttonNavbarNav = $('[data-target="#navbarNav"]');
    var navbarNav = $('#navbarNav');
    var main = $('main');

    navbarNav.on('show.bs.collapse hide.bs.collapse', function (e) {
        if ($(this).is(e.target)) {
            main.toggleClass('blur', !$(this).hasClass('show'));
        }
    });

    main.on('click', function() {
        if (buttonNavbarNav.is(':visible') && navbarNav.is(':visible')) {
            navbarNav.collapse('hide');
        }
    });
};

/**
 * Function that initializes a search box in side nav.
 */
window.navbarNavSearchInit = function() {
    var appSideNavGroupULs = $('#app-side-nav-group ul');
    var appSideNavGroupULsLinks = appSideNavGroupULs.find('a');

    $('#app-side-nav-search').on('keyup propertychange', function(){
        var text = $(this).val().toUpperCase();

        appSideNavGroupULs.toggleClass('searching', text != '');
        appSideNavGroupULsLinks.map(function() {
            if (text != '' && this.text.toUpperCase().indexOf(text) > -1) {
                $(this).parents('li').addClass('show-search').find('.collapse').addClass('show');
            } else {
                $(this).parent().removeClass('show-search').find('.collapse').removeClass('show');
            }
        });
    });
};

$(function() {
    navbarNavInit();
    navbarNavSearchInit();
});
