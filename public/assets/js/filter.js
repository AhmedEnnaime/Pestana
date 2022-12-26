const room_filter = document.getElementById('room-type')
const suite_filter = document.querySelector('.suite_type')
const date_from = document.querySelector('.check-in')
const date_to = document.querySelector('.check-out')
const search_form = document.getElementById('search_form')
// Disabling dates before today date
let today = new Date().toISOString().split('T')[0];
date_from.setAttribute('min',today)
date_from.addEventListener('change',(e)=>{
    let min_date = e.target.value
    date_to.setAttribute('min',min_date)
})


// Suite type showing after being selected
room_filter.addEventListener('change',(e)=>{
    if(e.target.value === 'suite'){
        suite_filter.style.display = 'block'
    }else{
        suite_filter.style.display = 'none'
    }
})