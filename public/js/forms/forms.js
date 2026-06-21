// Validación estilo "Bootstrap" pero con Tailwind
(function () {
  const form = document.querySelector(".needs-validation");
  if (!form) return;

  // Mostrar valor del color en el input de texto
  const colorInput = document.getElementById("color_admin");
  const colorPreview = document.getElementById("color_preview");
  if (colorInput && colorPreview) {
    colorInput.addEventListener("input", () => {
      colorPreview.value = colorInput.value;
    });
  }

  // Validación al enviar y feedback en cada campo
  form.addEventListener(
    "submit",
    function (e) {
      const elements = Array.from(
        form.querySelectorAll("input, textarea, select"),
      );
      let formIsValid = true;

      elements.forEach((el) => {
        // ignorar elementos sin name o botones
        if (!el.name || el.type === "button" || el.type === "submit") return;

        const validMsg = el.parentNode.querySelector(".valid-feedback");
        const invalidMsg = el.parentNode.querySelector(".invalid-feedback");

        if (el.checkValidity()) {
          if (validMsg) validMsg.classList.remove("hidden");
          if (invalidMsg) invalidMsg.classList.add("hidden");
          el.classList.remove("border-red-500");
          el.classList.add("border-green-500");
        } else {
          formIsValid = false;
          if (validMsg) validMsg.classList.add("hidden");
          if (invalidMsg) invalidMsg.classList.remove("hidden");
          el.classList.remove("border-green-500");
          el.classList.add("border-red-500");
        }
      });

      if (!formIsValid) {
        e.preventDefault();
        e.stopPropagation();
      }
      // si es válido, el formulario se envía normalmente (POST)
    },
    false,
  );

  // Validación en tiempo real (mejora UX)
  form.addEventListener(
    "input",
    function (e) {
      const el = e.target;
      if (!el || !el.name) return;
      const validMsg = el.parentNode.querySelector(".valid-feedback");
      const invalidMsg = el.parentNode.querySelector(".invalid-feedback");

      if (el.checkValidity()) {
        if (validMsg) validMsg.classList.remove("hidden");
        if (invalidMsg) invalidMsg.classList.add("hidden");
        el.classList.remove("border-red-500");
        el.classList.add("border-green-500");
      } else {
        if (validMsg) validMsg.classList.add("hidden");
        if (invalidMsg) invalidMsg.classList.remove("hidden");
        el.classList.remove("border-green-500");
        el.classList.add("border-red-500");
      }
    },
    true,
  );
})();
