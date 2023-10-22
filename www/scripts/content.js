const principalContent = document.getElementById("principal-content");
const navLinks = document.querySelectorAll(".nav_link");

function loadContent(contentName) {
  fetch(`/contents/${contentName}/index.php`)
    .then((response) => response.text())
    .then((data) => {
      principalContent.innerHTML = data;
    })
    .catch((error) => {
      console.error("Erro ao carregar conteúdo: " + error);
    });
}

window.addEventListener("load", function () {
  loadContent("inicio");
});

navLinks.forEach((link) => {
  link.addEventListener("click", function (event) {
    event.preventDefault();
    const contentName = link.getAttribute("data-content");
    loadContent(contentName);
  });
});
