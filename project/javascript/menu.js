// Expandir menu
var menuSide = document.querySelector("#nav-lte");
menuSide.classList.toggle("expandir");

// Função para aplicar o modo escuro
function applyDarkMode() {
  const darkModeEnabled = localStorage.getItem("dark-mode") === "enabled";
  document.documentElement.classList.toggle("dark", darkModeEnabled);
  document.getElementById("icon-moon").classList.toggle("hidden", darkModeEnabled);
  document.getElementById("icon-sun").classList.toggle("hidden", !darkModeEnabled);
  document.getElementById("dark-mode-text").textContent = darkModeEnabled ? "Claro" : "Escuro";
}

// Aplicar o modo escuro ao carregar a página
document.addEventListener("DOMContentLoaded", applyDarkMode);

// Alternar o modo escuro/claro ao clicar no botão
document.getElementById("dark-mode-toggle").addEventListener("click", function () {
  const darkModeEnabled = document.documentElement.classList.toggle("dark");
  localStorage.setItem("dark-mode", darkModeEnabled ? "enabled" : "disabled");
  document.getElementById("icon-moon").classList.toggle("hidden", darkModeEnabled);
  document.getElementById("icon-sun").classList.toggle("hidden", !darkModeEnabled);
  document.getElementById("dark-mode-text").textContent = darkModeEnabled ? "Claro" : "Escuro";
});
