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
            $('#daySelector').val(id.substr(3));
        });
    }

    $('#daySelector').change(function(){
        var day = $(this).val();
        for (var j = 0; j < 5; j++) {
            $('#day'+j).parent().removeClass('active');
            $('.day'+j).hide();
        }
        $('#day'+day).parent().addClass('active');
        $('.day'+day).show();
    });
});

$(document).ready(function(){
    function getURLParameter(name) {
        return decodeURI(
            (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
        );
    }

    function setFav() {
        icon.attr('src', 'star_on.png');
        icon.attr('title', 'Klicken um Favorit zu entfernen');
        icon.attr('alt', 'Favorit');
    }

    function unsetFav() {
        icon.attr('src', 'star_off.gif');
        icon.attr('title', 'Klicken um zum Favorit zu machen');
        icon.attr('alt', 'Favorit');
    }

    var id = getURLParameter('id');
    var icon = $('#fav');
    var favorite = icon.attr('src') === 'star_on.png';
    icon.click(function() {
        favorite = !favorite;
        if (favorite) {
            $.ajax({
                url: 'favorite.php',
                data: {id: id},
                success: setFav,
                dataType: 'html'
            });
        } else {
            $.ajax({
                url: 'favorite.php',
                data: {},
                success: unsetFav(),
                dataType: 'html'
            });
        }
    });
});

$(document).ready(function() {

    $.each($('.addition'), function() {
        var hover = $(this).find('.addition-hover');
        $(this).popover({
            title: 'Zusatzstoffe',
            content: hover
        });
    });

});