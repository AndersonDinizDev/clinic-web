  const alertMessage = (message, type) => {
    const alert = document.createElement("div");
    alert.className = `alert-msg ${type} texts-type-8`;
    alert.textContent = message;

    document.body.appendChild(alert);

    setTimeout(() => {
      alert.classList.add("fade-in");

      setTimeout(() => {
        alert.classList.remove("fade-in");

        setTimeout(() => {
          document.body.removeChild(alert);
        }, 500);
      }, 3000);
    }, 100);
  };
