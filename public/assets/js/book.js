const booking_date = document.querySelectorAll('.booking-date');
const people_num = document.querySelectorAll('.people_num');
const guests1 = document.querySelector('.guests1');
const guests2 = document.querySelector('.guests2');
const guests3 = document.querySelector('.guests3');
const guests4 = document.querySelector('.guests4');
const guests5 = document.querySelector('.guests5');
const guests6 = document.querySelector('.guests6');

let today = new Date().toISOString().split('T')[0];
for(let date of booking_date){
    date.setAttribute('min',today)
}

for(let nbr_people of people_num){
    nbr_people.addEventListener('change',(e)=>{
        if(e.target.value == 3){
            guests1.style.display = 'block';
            guests2.style.display = 'block';
            guests3.style.display = 'block';
            guests4.style.display = 'none';
            guests5.style.display = 'none';
            guests6.style.display = 'none';
        }else if(e.target.value == 4){
            guests1.style.display = 'block';
            guests2.style.display = 'block';
            guests3.style.display = 'block';
            guests4.style.display = 'block';
            guests5.style.display = 'none';
            guests6.style.display = 'none';
        }else if(e.target.value == 5){
            guests1.style.display = 'block';
            guests2.style.display = 'block';
            guests3.style.display = 'block';
            guests4.style.display = 'block';
            guests5.style.display = 'block';
            guests6.style.display = 'none';
        }else if(e.target.value == 6){
            guests1.style.display = 'block';
            guests2.style.display = 'block';
            guests3.style.display = 'block';
            guests4.style.display = 'block';
            guests5.style.display = 'block';
            guests6.style.display = 'block';
        }
    })
}


(function ($) {
    // USE STRICT
    "use strict";

    $(".form-radio .radio-item").click(function(){
        //Spot switcher:
        $(this).parent().find(".radio-item").removeClass("active");
        $(this).addClass("active");
    });

})(jQuery);