$(document).ready(function(){
    var oldPosition;
    var easingStyle;
    var floatTarget = $("a.go-to-top");
    var floatSpeed = 1000;

    $(window).load(function(){
        oldPosition = floatTarget.position().top;
        floating();
    });

    $(window).scroll(function(){
      if($(this).scrollTop() > 250) { // 250 넘으면 버튼이 보여집니다.
        $('#toTop').fadeIn();
        $('#toTop').css('right', $('#container').offset().right);
      } else {
        $('#toTop').fadeOut();
      }
        floating();
    });

    function floating(){
        var newPosition = oldPosition+$(document).scrollTop();
        floatTarget.stop().animate({top:newPosition},floatSpeed);
    }

    floatTarget.click(function(){
        $("html, body").animate({scrollTop:0},1000);
        return false;
    });

});
