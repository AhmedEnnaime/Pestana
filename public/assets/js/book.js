const booking_date_from = document.querySelector('.booking-date-from');
const booking_date_to = document.querySelector('.booking-date-to');
const people_num = document.querySelectorAll('.people_num');
const people_input = document.querySelector('.guests');


let today = new Date().toISOString().split('T')[0];
booking_date_from.setAttribute('min',today)
booking_date_from.addEventListener('change',(e)=>{
    let min_date = e.target.value
    booking_date_to.setAttribute('min',min_date)
})

for(let nbr_people of people_num){
    nbr_people.addEventListener('change',(e)=>{
        people_input.innerHTML = ``;
        let people = e.target.value;
        let i = 0;
        while(i < people){
            people_input.innerHTML += `
                <div class="guests_content">
                    <div class="form-group form-input">
                        <label style="color: white;" for="phone">Name of guest ${i+1}</label>
                        <input type="text" placeholder="Enter guest name" name="name[]" value="" />
                    </div>
                    <div style="margin-bottom: 50px;" class="form-group form-input">
                        <label style="color: white;" for="phone">Birthday of guest ${i+1}</label>
                        <input type="date" name="birthday[]" value="" />

                    </div>
                </div>
          
            `
            i++;
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