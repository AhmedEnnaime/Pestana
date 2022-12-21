(function ($) {
    // USE STRICT
    "use strict";

    $(".form-radio .radio-item").click(function(){
        //Spot switcher:
        $(this).parent().find(".radio-item").removeClass("active");
        $(this).addClass("active");
    });
  
    $('#time').parent().append('<ul class="list-item" id="newtime" name="time"></ul>');
    $('#time option').each(function(){
        $('#newtime').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
    });
    $('#time').remove();
    $('#newtime').attr('id', 'time');
    $('#time li').first().addClass('init');
    $("#time").on("click", ".init", function() {
        $(this).closest("#time").children('li:not(.init)').toggle();
    });

    $('#food').parent().append('<ul class="list-item" id="newfood" name="food"></ul>');
    $('#food option').each(function(){
        $('#newfood').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
    });
    $('#food').remove();
    $('#newfood').attr('id', 'food');
    $('#food li').first().addClass('init');
    $("#food").on("click", ".init", function() {
        $(this).closest("#food").children('li:not(.init)').toggle();
    });
    
    var allOptions = $("#time").children('li:not(.init)');
    $("#time").on("click", "li:not(.init)", function() {
        allOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#time").children('.init').html($(this).html());
        allOptions.toggle();
    });

    var FoodOptions = $("#food").children('li:not(.init)');
    $("#food").on("click", "li:not(.init)", function() {
        FoodOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#food").children('.init').html($(this).html());
        FoodOptions.toggle();
    });
})(jQuery);