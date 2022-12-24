const room_filter = document.getElementById('room-type')
const suite_filter = document.querySelector('.suite_type')
const dates = document.querySelectorAll('.check-in')
const search_form = document.getElementById('search_form')
// Disabling dates before today date
let today = new Date().toISOString().split('T')[0];
for(let date of dates){
    date.setAttribute('min',today)
}

// Suite type showing after being selected
room_filter.addEventListener('change',(e)=>{
    if(e.target.value === 'suite'){
        suite_filter.style.display = 'block'
    }else{
        suite_filter.style.display = 'none'
    }
})