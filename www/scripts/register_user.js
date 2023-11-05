const nameInput = document.getElementById("name");
const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const cPasswordInput = document.getElementById("c-password");
const registerSubmit = document.getElementById("register-submit");
const divName = document.getElementById("div-name");
const divEmail = document.getElementById("div-email");
const divPassword = document.getElementById("div-password");
const divCPassword = document.getElementById("div-c-password");
const iconName = document.getElementById("icon-name");
const iconEmail = document.getElementById("icon-email");
const iconPassword = document.getElementById("icon-password");
const iconCPassword = document.getElementById("icon-c-password");

function isValidEmail(email) {
  var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  return emailPattern.test(email);
}

function highlightField(field, icon, boolean) {
  if (!boolean) {
    field.style.borderColor = "#f44336";
    icon.setAttribute("color", "#f44336");
  } else {
    field.style.borderColor = "#4caf50";
    icon.setAttribute("color", "#4caf50");
  }
}

registerSubmit.addEventListener("click", function () {
  const name = nameInput.value;
  const email = emailInput.value;
  const password = passwordInput.value;
  const cPassword = cPasswordInput.value;

  var hasError = false;

  function validateField(value, element, icon) {
    if (!value) {
      highlightField(element, icon, false);
      hasError = true;
    } else {
      highlightField(element, icon, true);
    }
  }

  validateField(name, divName, iconName);
  validateField(email, divEmail, iconEmail);
  if (email && !isValidEmail(email)) {
    validateField(false, divEmail, iconEmail);
  }
  validateField(password || password.length >= 8, divPassword, iconPassword);
  validateField(
    password && password === cPassword,
    divCPassword,
    iconCPassword
  );

  if (hasError) {
    alertMessage("Informe suas informações corretamente.", "error");
    return;
  }

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
