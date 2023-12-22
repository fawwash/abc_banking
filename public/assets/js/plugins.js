var host = location.hostname;
var path = window.location.origin
if(host=='localhost')
 var path = window.location.origin+'/banking_app/public';
(document.querySelectorAll("[toast-list]")||document.querySelectorAll("[data-choices]")||document.querySelectorAll("[data-provider]"))&&(document.writeln("<script type='text/javascript' src='"+path+"/assets/libs/toastify-js.js'><\/script>"),document.writeln("<script type='text/javascript' src='"+path+"/assets/libs/choices.js/public/assets/scripts/choices.min.js'><\/script>"),document.writeln("<script type='text/javascript' src='"+path+"/assets/libs/flatpickr/flatpickr.min.js'><\/script>"));