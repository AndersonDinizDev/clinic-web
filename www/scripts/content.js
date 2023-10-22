const principalContent = document.getElementById("principal-content");
const navLinks = document.querySelectorAll(".nav_pages");

function hideLoadingWithDelay() {
  setTimeout(function() {
    $('#loading').fadeOut(1000);
  }, 2000);
}

function showLoading() {
  $('#loading').show();
}

function hideLoading() {
  $('#loading').fadeOut(1000);
}

function loadContent(contentName) {
  showLoading()

  fetch(`/contents/${contentName}/index.php`)
    .then((response) => response.text())
    .then((data) => {
      principalContent.innerHTML = data;
      hideLoading();
    })
    .catch((error) => {
      console.error("Erro ao carregar conteúdo: " + error);
      hideLoading();
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
