function togglePW(id){
    var password =  document.querySelector(`#input-${id}`);
    console.log(password);

    if(password.getAttribute('type')==='password'){
        password.setAttribute('type', 'text');
        document.getElementById(`font-${id}`).style.color='black';
    }

    else{
        password.setAttribute('type', 'password');
        document.getElementById(`font-${id}`).style.color='gray';
    }
}



function togglePWUser(){
    var password =  document.querySelector('[name=password]');

    if(password.getAttribute('type')==='password'){
        password.setAttribute('type', 'text');
        document.getElementById("font").style.color='black';
    }

    else{
        password.setAttribute('type', 'password');
        document.getElementById("font").style.color='gray';
    }
}



