const nameInput = document.getElementById("name");
const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const cPasswordInput = document.getElementById("c-password");
const registerSubmit = document.getElementById("register-submit");

registerSubmit.addEventListener("click", function () {
  const name = nameInput.value;
  const email = emailInput.value;
  const password = passwordInput.value;
  const cPassword = cPasswordInput.value;

  fetch("/api/register_user.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      user_name: name,
      user_email: email,
      user_password: password,
      user_c_password: cPassword,
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
        alertMessage("Usuário cadastrado com sucesso!", "success");

        setTimeout(() => {
          window.location.assign("/login");
        }, 2000);
      } else {
        alertMessage("Insira suas informações corretamente.", "error");
      }
    })
    .catch((error) => {
      console.error("Erro na solicitação: " + error.message);
    });
});
