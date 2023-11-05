const nameInput = document.getElementById("name");
const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const cPasswordInput = document.getElementById("c-password");
const keyInput = document.getElementById("key");
const registerSubmit = document.getElementById("register-submit");
const divName = document.getElementById("div-name");
const divEmail = document.getElementById("div-email");
const divPassword = document.getElementById("div-password");
const divCPassword = document.getElementById("div-c-password");
const divKey = document.getElementById("div-key");
const iconName = document.getElementById("icon-name");
const iconEmail = document.getElementById("icon-email");
const iconPassword = document.getElementById("icon-password");
const iconCPassword = document.getElementById("icon-c-password");
const iconKey = document.getElementById("icon-key");
const spanEmail = document.getElementById("email-span");
const spanName = document.getElementById("name-span");
const spanPassword = document.getElementById("password-span");
const spanCPassword = document.getElementById("c-password-span");
const spanKey = document.getElementById("key-span");

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
  const key = keyInput.value;

  var hasError = false;

  function validateField(value, element, icon, item, message) {
    if (!value) {
      highlightField(element, icon, false);
      item.textContent = message;
      hasError = true;
    } else {
      highlightField(element, icon, true);
      item.textContent = "";
    }
  }

  validateField(name, divName, iconName, spanName, "Insira um nome");
  validateField(email, divEmail, iconEmail, spanEmail, "Email incorreto");
  if (email && !isValidEmail(email)) {
    validateField(false, divEmail, iconEmail, spanEmail, "Email incorreto");
    hasError = true;
  }
  validateField(
    password,
    divPassword,
    iconPassword,
    spanPassword,
    "Campo vazio ou com menos de 8 caracteres"
  );
  if (!password || password.length < 8) {
    validateField(
      false,
      divPassword,
      iconPassword,
      spanPassword,
      "Campo vazio ou com menos de 8 caracteres"
    );
    hasError = true;
  }
  validateField(
    cPassword,
    divCPassword,
    iconCPassword,
    spanCPassword,
    "Senhas não coincidem"
  );
  if (!cPassword || cPassword.length < 8 || password !== cPassword) {
    validateField(
      false,
      divCPassword,
      iconCPassword,
      spanCPassword,
      "Senhas não coincidem"
    );
    hasError = true;
  }

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
      user_key: key,
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
        highlightField(divKey, iconKey, true)

        setTimeout(() => {
          window.location.assign("/login");
        }, 2000);
      } else if (data.keyError) {
        alertMessage("Chave de acesso inválida.", "error");
        highlightField(divKey, iconKey, false)
      } else {
        alertMessage("Insira suas informações corretamente.", "error");
      }
    })
    .catch((error) => {
      console.error("Erro na solicitação: " + error.message);
    });
});
