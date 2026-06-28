function fncFormatInputs() {
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
}

function fncSweetAlert(type, text, url) {
  switch (type) {
    case "success":
      if (url == "") {
        Swal.fire({
          icon: "success",
          title: "Correcto",
          text: text,
        });
      } else {
        Swal.fire({
          icon: "success",
          title: "Correcto",
          text: text,
        }).then((result) => {
          if (result.value) {
            window.location.href = url;
          }
        });
      }
      break;

    case "error":
      if (url == "") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: text,
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: text,
        }).then((result) => {
          if (result.value) {
            window.location.href = url;
          }
        });
      }
      break;

    case "loading":
      Swal.fire({
        allowOutsideClick: false,
        icon: "info",
        text: text,
      });
      Swal.showLoading();
      break;

    case "confirm":
      return new Promise((resolve) => {
        Swal.fire({
          text: text,
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "¡Si, continuar!",
          cancelButtonText: "No",
        }).then((result) => {
          resolve(result.value);
        });
      });
      break;

    case "close":
      Swal.close();
      break;
  }
}

function fncToastr(type, text) {
  var Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 4000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener("mouseenter", Swal.stopTimer);
      toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
  });

  Toast.fire({
    icon: type,
    title: text,
  });
}

function fncMatPreloader(type) {
  if (typeof Pace === "undefined") return;

  if (type == "on") {
    Pace.restart();
  }

  if (type == "off") {
    Pace.stop();
  }
}

function alertClick(text) {
  fncSweetAlert("loading", text, "");
}
