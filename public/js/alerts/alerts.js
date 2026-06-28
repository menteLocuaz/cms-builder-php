const UI = {
  async alert(type, text, url = "") {
    switch (type) {

      case "success":
      case "error": {
        const result = await Swal.fire({
          icon: type,
          title: type === "success" ? "Correcto" : "Error",
          text,
        });
        if (url && result.isConfirmed) location.href = url;
        break;
      }

      case "confirm": {
        const result = await Swal.fire({
          icon: "warning",
          text,
          showCancelButton: true,
          confirmButtonText: "Sí, continuar",
          cancelButtonText: "Cancelar",
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
        });
        return result.isConfirmed;
      }
    }
  },

  loading(text) {
    Swal.fire({
      icon: "info",
      text,
      allowOutsideClick: false,
      didOpen: () => Swal.showLoading(),
    });
  },

  close() {
    Swal.close();
  },
};
