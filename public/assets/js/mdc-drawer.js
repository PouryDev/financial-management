const listEl = document.querySelector('.mdc-drawer .mdc-list');
const mainContentEl = document.querySelector('.main-content');
const appBarDrawerIcon = document.querySelector('.mdc-top-app-bar__navigation-icon');


appBarDrawerIcon.addEventListener('click', () => {
    drawer.open = true;
    console.log('hello');
});


listEl.addEventListener('click', (event) => {
    mainContentEl.querySelector('input, button').focus();
});

document.body.addEventListener('MDCDrawer:closed', () => {
    mainContentEl.querySelector('input, button').focus();
});

listEl.addEventListener('click', (event) => {
    drawer.open = false;
});

document.body.addEventListener('MDCDrawer:closed', () => {
    mainContentEl.querySelector('input, button').focus();
});
