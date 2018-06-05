$(function () {
  $('button').click(function () {
    var _this = this;

    $(this).toggleClass('favorite');
    $(this).find('i').addClass('favoriting');
    setTimeout(function () {
      $(_this).find('i').removeClass('favoriting').toggleClass('fontawesome-heart fontawesome-heart-empty');
    }, 400);
  });
});
