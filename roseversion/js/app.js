(function(){
    var click = document.querySelector('.control__menu');
    click.addEventListener('click', function(e){
        var getMenu = document.querySelector('.menu__list');
        getMenu.classList.toggle('menu__show')
    })
})();
(function(){
    var click = document.querySelector('.control__menu1');
    click.addEventListener('click', function(e){
        var getMenu = document.querySelector('.menu__list');
        getMenu.classList.toggle('menu__show')
    })
})()
