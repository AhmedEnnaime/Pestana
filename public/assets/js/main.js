const suite_type = document.querySelectorAll('.suite_type')
const room_type = document.getElementById('room_type')

room_type.addEventListener('change',(e)=>{
    if(e.target.value == 'suite'){
        for(suite of suite_type){
            suite.style.display = 'block'
        }
        
    }else{
        for(suite of suite_type){
            suite.style.display = 'none'
        }
    }
})
