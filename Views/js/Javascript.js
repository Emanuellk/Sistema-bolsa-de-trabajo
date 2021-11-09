function togglePW(){
    var password =  document.querySelectorAll('[name=password]');
    var div_array = [...password];

    div_array.forEach(password => {
    if(password.getAttribute('type')==='password'){
        password.setAttribute('type', 'text');
        document.getElementById("font").style.color='black';
    }

    else{
        password.setAttribute('type', 'password');
        document.getElementById("font").style.color='gray';
    }
});
}

/*
function togglePW(){
    var password =  document.querySelector('[name=password]');

    if(password.getAttribute('type')==='password'){
        password.setAttribute('type', 'text');
        document.getElementById("font").style.color='black';
    }

    else{
        password.setAttribute('type', 'password');
        document.getElementById("font").style.color='gray';
    }
}*/