/* =========================================================================
   responsive.js — Deveon Inc
   -------------------------------------------------------------------------
   Mobile-only behaviour that CSS cannot express. Deliberately tiny, and it
   never touches desktop: every handler returns immediately at >= 1200px.

   It adds the two things people expect from a slide-out menu and that the
   theme does not provide:
     1. tapping the dimmed page behind the open drawer closes it;
     2. pressing Escape closes it.

   Both work by triggering the theme's own close control, so the theme keeps
   full ownership of the open/close state — nothing here duplicates it.
   ========================================================================= */
(function () {
  'use strict';

  var MOBILE_MAX = 1199.98;

  function isOpen() {
    return document.documentElement.getAttribute('toggled') === 'open';
  }

  function isMobile() {
    return window.matchMedia('(max-width: ' + MOBILE_MAX + 'px)').matches;
  }

  function closeDrawer() {
    var closer =
      document.querySelector('.app-toggle-header .sidemenu-toggle') ||
      document.querySelector('.sidemenu-toggle');

    if (closer) {
      closer.click();
    } else {
      document.documentElement.setAttribute('toggled', 'close');
    }
  }

  /* Tap anywhere outside the drawer (i.e. on the dimmed page) to close it.
     Capture phase, so a link under the backdrop cannot fire first. */
  document.addEventListener(
    'click',
    function (event) {
      if (!isMobile() || !isOpen()) return;

      var target = event.target;
      if (!(target instanceof Element)) return;

      // Inside the drawer, or on either toggle button — leave it alone.
      if (
        target.closest('.app-sidebar') ||
        target.closest('.sidemenu-toggle1') ||
        target.closest('.sidemenu-toggle')
      ) {
        return;
      }

      event.preventDefault();
      event.stopPropagation();
      closeDrawer();
    },
    true
  );

  /* Escape closes the drawer, matching every other overlay on the site. */
  document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape' && isMobile() && isOpen()) {
      closeDrawer();
    }
  });

  /* Rotating a phone to landscape can cross the breakpoint while the drawer
     is open, which would otherwise leave the page scroll-locked. */
  window.addEventListener('resize', function () {
    if (isOpen() && !isMobile()) closeDrawer();
  });
})();
