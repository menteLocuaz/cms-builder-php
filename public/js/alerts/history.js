function fncFormatInputs() {
  if (history.replaceState) {
    history.replaceState(null, "", location.href);
  }
}
