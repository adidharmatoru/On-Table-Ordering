(function ($) {
    "use strict";

    function getTimeRemaining(endtime) { 
      var t = Date.parse(endtime) - Date.parse(new Date());
      var seconds = Math.floor((t / 1000) % 60);
      var minutes = Math.floor((t / 1000 / 60) % 60);
      var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
      return {
        'total': t,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
      };
    }

    function initializeClock(id, endtime) {
      var hoursSpan = $('.hours');
      var minutesSpan = $('.minutes');
      var secondsSpan = $('.seconds');

      function updateClock() { 
        var t = getTimeRemaining(endtime);
        hoursSpan.html(('0' + t.hours).slice(-2));
        minutesSpan.html(('0' + t.minutes).slice(-2));
        secondsSpan.html(('0' + t.seconds).slice(-2))

        if (t.total <= 0) {
          clearInterval(timeinterval);
        }
      }

      updateClock();
      var timeinterval = setInterval(updateClock, 1000);
    }

    var today = new Date();
    var hour = today.getHours();
    var minute = today.getMinutes();
    var second = today.getSeconds();
    var deadline = (24*60*60) - (hour*60*60) - (minute*60) - second;
    initializeClock('clockdiv', deadline);

})(jQuery);
