(function ($) {
  $(document).ready(function () {
    $(document).on('click', '.category-filter__item > a', function (e) {
      e.preventDefault();
      var data = $(this).data('category');

      // Toggle Current Active class
      $('.category-filter__item > a').removeClass('current-active-category');

      $(this).addClass('current-active-category');

      $('.article__wrapper').each(() => {
        $('.article__wrapper').fadeOut();
      });

      setTimeout(() => {
        $.ajax({
          url: wpAjax.ajaxUrl,
          data: { action: 'filter', category: data },
          type: 'POST',
          success: function (result) {
            $('.filtered-articles').html(result);
          },
          error: function (result) {
            $('.filtered-articles').html(result);
          },
        });
      }, 5000);
    });
  });
})(jQuery);
