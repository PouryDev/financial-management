import './bootstrap';

import Swal from "sweetalert2";
window.Swal = Swal;

import * as mdc from 'material-components-web';
window.mdc = mdc.autoInit();

import {MDCDrawer} from "@material/drawer";
window.drawer = MDCDrawer.attachTo(document.querySelector('.mdc-drawer'));
