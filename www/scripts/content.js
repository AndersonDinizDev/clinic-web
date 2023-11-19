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

          const newUsersTable = document.getElementById("news-users-table");
          const newUpdateTable = document.getElementById("news-updates-table");

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
                  "<table style='cursor: pointer;' class='table table-hover table-striped custom-table'>";
                tableHTML += "<thead>";
                tableHTML += "<tr>";
                tableHTML +=
                  "<th class='texts-type-12' style='border-top-left-radius: 8px;'># Categoria</th>";
                tableHTML += "<th class='texts-type-12'># Conteúdo</th>";
                tableHTML +=
                  "<th class='texts-type-12' style='border-top-right-radius: 8px;'># Adicionado em</th>";
                tableHTML += "</tr>";
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

          function getNewUsers() {
            fetch("api/get_new_users.php", {
              method: "POST",
              headers: {
                "Content-type": "application/json",
              },
            })
              .then((response) => response.json())
              .then((data) => {
                var tableUsersHTML =
                  "<table style='cursor: pointer;' class='table table-hover table-striped custom-table'>";
                tableUsersHTML += "<thead>";
                tableUsersHTML += "<tr>";
                tableUsersHTML +=
                  "<th class='texts-type-12' style='border-top-left-radius: 8px;'># Nome</th>";
                tableUsersHTML +=
                  "<th class='texts-type-12' style='border-top-right-radius: 8px;'># Entrou em</th>";
                tableUsersHTML += "</tr>";
                tableUsersHTML += "</thead>";
                tableUsersHTML += "<tbody>";

                data.forEach((users) => {
                  tableUsersHTML += "<tr>";
                  tableUsersHTML += "<td class='texts-type-7'>" + users.name + "</td>";
                  tableUsersHTML += "<td class='texts-type-7'>" + users.creation + "</td>";
                  tableUsersHTML += "</tr>";
                });

                tableUsersHTML += "</tbody>";
                tableUsersHTML += "</table>";

                newUsersTable.innerHTML = tableUsersHTML;
              })
              .catch((error) => {
                console.error("Ocorreu um erro:", error);
              });
          }

          function getNewUpdates() {
            fetch("api/get_new_updates.php", {
              method: "POST",
              headers: {
                "Content-type": "application/json",
              },
            })
              .then((response) => response.json())
              .then((data) => {
                var tableUpdatesHTML =
                  "<table style='cursor: pointer;' class='table table-hover table-striped custom-table'>";

                tableUpdatesHTML += "<thead>";
                tableUpdatesHTML += "<tr>";
                tableUpdatesHTML +=
                  "<th class='texts-type-12' style='border-top-left-radius: 8px'># Atualização</th>";
                tableUpdatesHTML +=
                  "<th class='texts-type-12' style='border-top-right-radius: 8px'># Adicionado em</th>";
                tableUpdatesHTML += "</tr>";
                tableUpdatesHTML += "</thead>";
                tableUpdatesHTML += "<tbody>";

                data.forEach((updates) => {
                  tableUpdatesHTML += "<tr>";
                  tableUpdatesHTML += "<td class='texts-type-7'>" + updates.newupdate;
                  tableUpdatesHTML += "<td class='texts-type-7'>" + updates.creation;
                  tableUpdatesHTML += "</tr>";

                  newUpdateTable.innerHTML = tableUpdatesHTML;
                });
              });
          }

          getNewsLessonsTable();
          getNewUsers();
          getNewUpdates();
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
