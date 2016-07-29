var notice;
var options = {
    text: "Aguarde, Enviando..."
};
function dyn_notice() {
     notice = new PNotify({
        text: "Please Wait",
        type: 'info',
        icon: 'fa fa-spinner fa-spin',
        hide: false,
        buttons: {
            closer: false,
            sticker: false
        },
        opacity: 0.75,
        shadow: false,
        width: "170px"
    });
}
