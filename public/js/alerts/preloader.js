function fncMatPreloader(enabled = true, style = "minimal-flash") {
  if (typeof NProgress === "undefined") return;

  var styles = [
    "minimal-flash",
    "loading-bar",
    "bounce",
    "center-circle",
    "big-counter",
    "center-simple",
  ];

  if (styles.indexOf(style) === -1) style = "minimal-flash";

  var $nprogress = document.getElementById("nprogress");
  if ($nprogress) {
    styles.forEach(function (s) {
      $nprogress.classList.remove(s);
    });
    $nprogress.classList.add(style);
    if (style === "big-counter" && enabled) {
      $nprogress.setAttribute("data-progress", "0%");
      $nprogress.classList.add("busy");
    } else if (style === "big-counter") {
      $nprogress.classList.remove("busy");
    }
  }

  enabled ? NProgress.start() : NProgress.done();
}

