$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(".numbersOnly").on('keypress paste', function (e) {
  if (e.type === 'paste') {
      var clipboardData = e.originalEvent.clipboardData || window.clipboardData;
      var pastedText = clipboardData.getData('text');

      if (!isNumeric(pastedText)) {
          $("#errmsg").html("Digits Only").show().fadeOut("slow");
          return false;
      }
  }
  if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
      $("#errmsg").html("Digits Only").show().fadeOut("slow");
      return false;
  }
});
function isNumeric(value) {
  return /^\d+$/.test(value);
}
function showLoader(status) {
    var loader = document.getElementById("preloader1");
    if (!loader) {
        loader = document.createElement("div");
        loader.id = "preloader1";
        loader.innerHTML = `
            <div id="status">
                <div class="spinner-border text-primary avatar-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        `;
        loader.style.display = "none";
        loader.style.position = "fixed";
        loader.style.top = "0";
        loader.style.left = "0";
        loader.style.right = "0";
        loader.style.bottom = "0";
        loader.style.backgroundColor = "rgba(255, 255, 255, 0.7)";
        loader.style.zIndex = "99999";
        document.body.appendChild(loader);
    }
    if (status === 1) {
        loader.style.display = "block";
    } else if (status === 0) {
        loader.style.display = "none";
    } else {
        console.error("Invalid status parameter. Use 0 to hide or 1 to show the loader.");
    }
}
