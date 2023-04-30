var toggle = false;
var navMenu = $('#navMenus');

function showNavMenus()
{
    if(navMenu.hasClass('hidden'))
    {
        navMenu.removeClass('hidden')
    }else{
        navMenu.addClass('hidden')
    }
}