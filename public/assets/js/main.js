const suite_type = document.querySelectorAll('.suite_type')
const room_type = document.getElementById('room_type')
const capacity = document.getElementById('capacity')

console.log(capacity.parentElement.childNodes[1]);
// capacity.addEventListener('change',(e)=>{
//     console.log(e.target.value);
// })
let capacity_input = capacity.parentElement.childNodes[1]
room_type.addEventListener('change',(e)=>{
    if(e.target.value === 'single'){
        capacity.value = 1;
        
    }else if(e.target.value === 'double'){
        capacity.value = 2;
    }else if(e.target.value == 'suite'){
        for(suite of suite_type){
            suite.style.display = 'block'
        }
        capacity.value = 6;
        
    }else{
        for(suite of suite_type){
            suite.style.display = 'none'
        }
    }
})
