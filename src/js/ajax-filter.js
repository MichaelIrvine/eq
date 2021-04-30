(function ($) {
  $(document).ready(function () {
    $(document).on('click', '.category-filter__item > a', function (e) {
      e.preventDefault();
      var data = $(this).data('category');
      console.log(data);

      // Toggle Current Active class
      $('.category-filter__item > a').removeClass('current-active-category');

      $(this).addClass('current-active-category');

      $('.article__container').fadeOut();

      $.ajax({
        url: wpAjax.ajaxUrl,
        data: { action: 'filter', category: data },
        type: 'POST',
        success: function (result) {
          $('.filtered-articles').html(result);
          $('.article__container').fadeIn();
        },
        error: function (result) {
          $('.filtered-articles').html(result);
        },
      });
    });
  });
})(jQuery);
