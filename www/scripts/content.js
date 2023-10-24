document.addEventListener("DOMContentLoaded", function () {
  const principalContent = document.getElementById("principal-content");
  const navLinks = document.querySelectorAll(".nav_pages");

  function hideLoadingWithDelay() {
    setTimeout(function () {
      $("#loading").fadeOut(1000);
    }, 2000);
  }

  function showLoading() {
    $("#loading").show();
  }

  function hideLoading() {
    $("#loading").fadeOut(1000);
  }

  function loadContent(contentName) {
    showLoading();

    fetch(`/contents/${contentName}/index.php`)
      .then((response) => response.text())
      .then((data) => {
        principalContent.innerHTML = data;
        hideLoading();

        const scriptHome = document.createElement("script");
        scriptHome.src = "../scripts/home.js";

        scriptHome.addEventListener("load", function () {
          const newsLessonsTable =
            document.getElementById("news-lessons-table");

          function getNewsLessonsTable() {
            fetch("api/get_news_lessons.php", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              },
            })
              .then((response) => response.json())
              .then((data) => {

                var tableHTML =
                  "<table class='table table-hover table-striped table-bordered'>";
                tableHTML += "<thead>";
                tableHTML += "<tr>";
                tableHTML +=
                  "<th style='border-top-left-radius: 8px;'>Categoria</th>";
                tableHTML += "<th>Conteúdo</th>";
                tableHTML +=
                  "<th style='border-top-right-radius: 8px;'>Adicionado em</th>";
                tableHTML += "<tr>";
                tableHTML += "</thead>";
                tableHTML += "<tbody>";

                data.forEach((lessons) => {
                  tableHTML += "<tr>";
                  tableHTML += "<td>" + lessons.category + "</td>";
                  tableHTML += "<td>" + lessons.text + "</td>";
                  tableHTML += "<td>" + lessons.creation + "</td>";
                  tableHTML += "</tr>";
                });

                tableHTML += "</tbody>";
                tableHTML += "</table>";

                newsLessonsTable.innerHTML = tableHTML;
              })
              .catch((error) => {
                console.error("Ocorreu um erro:", error);
              });
          }

          getNewsLessonsTable();
        });
        document.body.appendChild(scriptHome);
      })
      .catch((error) => {
        console.error("Erro ao carregar conteúdo: " + error);
        hideLoading();
      });
  }

  window.addEventListener("load", function () {
    loadContent("home");
  });

  navLinks.forEach((link) => {
    link.addEventListener("click", function (event) {
      event.preventDefault();
      const contentName = link.getAttribute("data-content");
      loadContent(contentName);
    });
  });
});
