let req = new XMLHttpRequest();

req.onload = function() {
   
    if(this.readyState == 4 && this.status == 200){
        const myObj = JSON.parse(this.responseText);
        console.log(myObj);
    }else{
        console.log("Error");
    }
   
};

req.open("GET","../app/views/book.php",true);
req.send();