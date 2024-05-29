// Botão clicado
var menuItem = document.querySelectorAll(".item-menu");

function link() {
  menuItem.forEach((item) => item.classList.remove("ativo"));
  this.classList.add("ativo");
}

menuItem.forEach((item) => item.addEventListener("click", link));

// Expandir menu
var btn = document.querySelector("#btn-exp");
var menuSide = document.querySelector("#nav-lte");
var esconder = document.querySelector("#esconder");

btn.addEventListener("click", function () {
  menuSide.classList.toggle("expandir");
  esconder.classList.toggle("hidden", !menuSide.classList.contains("expandir"));
});

// Função para aplicar o modo escuro
function applyDarkMode() {
  const darkModeEnabled = localStorage.getItem("dark-mode") === "enabled";
  document.documentElement.classList.toggle("dark", darkModeEnabled);
  document
    .getElementById("icon-moon")
    .classList.toggle("hidden", darkModeEnabled);
  document
    .getElementById("icon-sun")
    .classList.toggle("hidden", !darkModeEnabled);
  document.getElementById("dark-mode-text").textContent = darkModeEnabled
    ? "Claro"
    : "Escuro";
}

// Aplicar o modo escuro ao carregar a página
document.addEventListener("DOMContentLoaded", applyDarkMode);

// Alternar o modo escuro/claro ao clicar no botão
document
  .getElementById("dark-mode-toggle")
  .addEventListener("click", function () {
    const darkModeEnabled = document.documentElement.classList.toggle("dark");
    localStorage.setItem("dark-mode", darkModeEnabled ? "enabled" : "disabled");
    document
      .getElementById("icon-moon")
      .classList.toggle("hidden", darkModeEnabled);
    document
      .getElementById("icon-sun")
      .classList.toggle("hidden", !darkModeEnabled);
    document.getElementById("dark-mode-text").textContent = darkModeEnabled
      ? "Claro"
      : "Escuro";
  });