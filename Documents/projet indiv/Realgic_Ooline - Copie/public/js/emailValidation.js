//Valider les donnees
let formValid = document.getElementById('boutonEnvoi'); 
let email = document.getElementById('email'); 
let emailValid =/^[a - z0-9._ - ] + @[a - z0-9._ - ] + \.[a - z] {2, 6}$/; 
let motpasse = document.getElementById('motpasse'); 
let nickname = document.getElementById('nickname'); 
let missEmail = document.getElementById('missEmail'); 
let missMotpasse = document.getElementById('missMotpasse'); 
let missNickname = document.getElementById('missNickname'); 


function validation(event) {
    if (email.validity.valueMissing) {
        event.preventDefault(); 
        missEmail.textContent = 'Email manquant'; 
        missEmail.style.color = '#ec00b7'; 
    }
    else if (emailValid.test(email.value) == false) {
        event.preventDefault(); 
        missEmail.textContent = 'Format incorrect'; 
        missEmail.style.color = '#ec00b7'; 
    }
   if (motpasse.validity.valueMissing) {
        event.preventDefault(); 
        missMotpasse.textContent = 'mot de passe manquant'; 
        missMotpasse.style.color = '#ec00b7'; 
    }
    if (nickname.validity.valueMissing) {
        event.preventDefault(); 
        missNickname.textContent = 'Pseudo manquant'; 
        missNickname.style.color = '#ec00b7'; 
    }
    
}

formValid.addEventListener('click', validation); 


