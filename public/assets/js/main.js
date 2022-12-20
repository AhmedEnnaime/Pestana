const suite_type = document.querySelectorAll('.suite_type')
const room_type = document.getElementById('room_type')
const capacity = document.getElementById('capacity')


room_type.addEventListener('change',(e)=>{
    if(e.target.value === 'single'){
        capacity.value = 1;
        for(suite of suite_type){
            suite.style.display = 'none'
        }
    }else if(e.target.value === 'double'){
        capacity.value = 2;
        for(suite of suite_type){
            suite.style.display = 'none'
        }
    }else if(e.target.value == 'suite'){
        for(suite of suite_type){
            suite.style.display = 'block'
        }
        capacity.value = 6;
        
    }
})




