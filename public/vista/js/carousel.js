src = "https://code.jquery.com/jquery-3.6.0.min.js"
$(document).ready(function () {
    var currentPosition = 0;
    var items = $('.carousel .item');
    var totalItems = items.length;

    function showCurrent() {
        items.hide().eq(currentPosition).fadeIn();
    }

    $('.arrow-next').click(function () {
        if (currentPosition < totalItems - 1) {
            currentPosition++;
        } else {
            currentPosition = 0;
        }
        showCurrent();
    });

    $('.arrow-prev').click(function () {
        if (currentPosition > 0) {
            currentPosition--;
        } else {
            currentPosition = totalItems - 1;
        }
        showCurrent();
    });
});