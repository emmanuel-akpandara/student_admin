import './bootstrap';
import {delegate} from 'tippy.js';
import 'tippy.js/dist/tippy.css';
import 'tippy.js/animations/shift-toward-subtle.css';
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

// Default configuration for Tippy with event delegation (https://atomiks.github.io/tippyjs/v6/addons/#event-delegation
delegate('body', {
    interactive: true,
    allowHTML: true,
    animation: 'shift-toward-subtle',
    target: '[data-tippy-content]',
});

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
