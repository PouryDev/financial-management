const textFields = [].map.call(document.querySelectorAll('.mdc-text-field'), function(el) {
    el.setAttribute('data-mdc-auto-init', 'MDCTextField')
});
const allButtons = [].map.call(document.querySelectorAll('.mdc-button'), function(el) {
    el.setAttribute('data-mdc-auto-init', 'MDCRipple')
});
const navBars = [].map.call(document.querySelectorAll('.mdc-top-app-bar'), function(el) {
    el.setAttribute('data-mdc-auto-init', 'MDCTopAppBar')
});
