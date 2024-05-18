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


//dark mode

document.getElementById('dark-mode-toggle').addEventListener('click', function() {
    document.documentElement.classList.toggle('dark');
    document.getElementById('icon-moon').classList.toggle('hidden');
    document.getElementById('icon-sun').classList.toggle('hidden');
    const darkModeText = document.getElementById('dark-mode-text');
    darkModeText.textContent = document.documentElement.classList.contains('dark') ? 'Claro' : 'Escuro';
});