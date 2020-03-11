if( $(window).innerWidth() >= 767 ) {
    $('#menu-nav').show();
    $('#menu-close').hide();
} 

$(document).ready(function(){
    let name = localStorage.getItem('myNameUser');
    let username = localStorage.getItem('myUsernameUser');
    let password = localStorage.getItem('myPasswordUser');
    let email = localStorage.getItem('myEmailUser');
    console.log('name ' + name);
    if(name === undefined && username === undefined && password === undefined && email === undefined ||
        name === null && username === null && password === null && email === null) {
            $('#btnLoginUser').show();
            $('#btnLoginUser').removeClass('d-none');
            $('#avatarUser').hide();
            $('#avatarUser').addClass('d-none');
        } else {
            $('#btnLoginUser').hide();
            $('#btnLoginUser').addClass('d-none');
            $('#avatarUser').show();
            $('#avatarUser').removeClass('d-none');
        }
    $('#menu-toggle').click(function(){
        $('body').addClass('overflowx');
        $('#menu-nav').slideToggle(500);
        $('#menu-toggle').toggle(500);
        $('#menu-close').toggle(500);
        $('#ul-menu li a').addClass('text-black');
        $('#ul-menu li svg').addClass('text-black');
    });
    $('#menu-close').click(function(){
        $('body').removeClass('overflowx');
        $('#menu-nav').slideToggle(500);
        $('#menu-toggle').toggle(500);
        $('#menu-close').toggle(500);
        $('.settings').hide(500);
        $('#settingsNav').slideToggle(500);
        $('#settingsClose').slideToggle(500);
    })
    // $('#settingsNav').click(function() {
    //     $('nav').addClass('nav-down');
    //     $('#settingsNav').slideToggle(500);
    //     $('body').addClass('overflowx');
    //     $('#settingsClose').slideToggle(500);
    //     $('.settings').slideToggle(500);
    //     $('#ul-menu li a').addClass('text-black');
    //     $('#ul-menu li svg').addClass('text-black');    
    //     $('#brand-nav p').addClass('text-black');
    //     $('.line').addClass('text-white');
    // });
    // $('#settingsClose').click(function() {
    //     $('#settingsNav').slideToggle(500);
    //     $('#settingsClose').slideToggle(500);
    //     $('.settings').slideToggle(500);
    //     $('#ul-menu li a').addClass('text-black');
    //     $('#ul-menu li svg').addClass('text-black');    
    //     $('#brand-nav p').addClass('text-black');
    //     $('.line').addClass('text-white');
    //     $('body').removeClass('overflowx');
    // });
        
    if($(window).innerWidth() <= 767) {
        $('#ul-menu li a').addClass('text-black');
        $('#ul-menu li svg').addClass('text-black');
    }
});

$(window).scroll(function() {
    var wScroll = $(this).scrollTop();
    $('#des-parallax1').css({
        "transform": "translate(0px, " + wScroll/4 + "px)"
    });
    if($(this).scrollTop() >= 100) {
        $('nav').addClass('nav-down');
        $('#ul-menu li a').addClass('text-black');
        $('#ul-menu li svg').addClass('text-black');
        $('#brand-nav p').addClass('text-black');
        $('.line').addClass('bg-dark');
    } else {
        $('nav').removeClass('nav-down');
        $('#ul-menu li a').removeClass('text-black');
        $('#ul-menu li svg').removeClass('text-black');
        $('#brand-nav p').removeClass('text-black');
        $('.line').removeClass('bg-dark');
    }
});
