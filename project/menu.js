//Botão clicado
var menuItem = document.querySelectorAll('.item-menu');

function link(){
    menuItem.forEach((item)=>
        item.classList.remove('ativo')
    )
    this.classList.add('ativo')
}

menuItem.forEach((item)=>
    item.addEventListener('click', link)
)

//Expandir menu

var btn = document.querySelector('#btn-exp');
var menuSide = document.querySelector('#nav-lte');

btn.addEventListener('click', function(){
    menuSide.classList.toggle('expandir')
})