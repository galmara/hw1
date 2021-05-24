const mail = document.getElementById("mail");
const psw = document.getElementById("password");
const cell = document.getElementById("cell");
const psw_conf = document.getElementById("password_conf");
mail.addEventListener("blur", checkMail);
psw.addEventListener("blur", checkPsw);
psw_conf.addEventListener("keyup", checkPsw);
cell.addEventListener("blur", checkNumber);

function onResponse(response){
    return response.json();
}

function checkMail(){
    const input = mail.value; 
    const url = "clienti.php?q=" + input;
    fetch(url).then(onResponse).then(onJsonMail);
}

function onJsonMail(json){
    if(json["found"]){
        mail.classList.add("error_s");
    }
    else {
        mail.classList.remove("error_s");
    }
}


function checkPsw(){
    const password = psw.value; 
    const password_conf = psw_conf.value; 
    if(!/^[a-zA-Z0-9!£$%&@]{8,16}$/.test(password)){
        psw.classList.add("error_s");
    }
    else {
        psw.classList.remove("error_s");
    }

    if(password!==password_conf){
        psw.classList.add("error_s");
        psw_conf.classList.add("error_s");
    }
    else{
        psw.classList.remove("error_s");
        psw_conf.classList.remove("error_s");
    }
}

function checkNumber(){
    const cellulare = cell.value;
    if(!/^[0-9+]{10,}$/.test(cellulare)){
        cell.classList.add("error_s");
    }
    else{
        cell.classList.remove("error_s");
    }

}
