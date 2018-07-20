export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    jQuery(document).on('click', '.toggle-nav', function() {
      jQuery('body').toggleClass('menu-open')
    })
  },
};
