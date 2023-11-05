const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const buttonSubmit = document.getElementById("button-submit");

buttonSubmit.addEventListener("click", function () {
  const userEmail = emailInput.value;
  const userPassword = passwordInput.value;

  fetch("/api/login_check.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      user_email: userEmail,
      user_password: userPassword,
    }),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Ocorreu algum problema");
      }
      return response.json();
    })
    .then((data) => {
      if (data.success) {
        window.location.assign("/panel");
      } else {
        alertMessage("Informações de login incorretas.", "error");
      }
    })
    .catch((error) => {
      console.error("Erro na solicitação: " + error.message);
    });
});
