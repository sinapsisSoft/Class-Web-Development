function sedDataStorage(){
        if(typeof(Storage)!=="undefined"){

            localStorage.setItem('email','diego@gmail.com');
            localStorage.setItem('password','111222344');
        }

}

function getDataStorage(){

    if(typeof(Storage)!=="undefined"){

        console.log(localStorage.getItem('email'));
    }
}