$(document).ready(function() {
    $('.day1').hide();
    $('.day2').hide();
    $('.day3').hide();
    $('.day4').hide();
    $('.day5').hide();
    $('.price2').hide();
    $('.price3').hide();

    $('#price').change(function() {
        $('.price1').hide();
        $('.price2').hide();
        $('.price3').hide();
        $('.price' + $('#price').val()).show();
    });

    for (var i = 0; i < 5; i++) {
        $('#day'+i).click(function() {
            for (var j = 0; j < 5; j++) {
                $('#day'+j).parent().removeClass('active');
                $('.day'+j).hide();
            }
            $(this).parent().addClass('active');
            var id = $(this).attr('id');
            $('.'+id).show();
        });
    }
});