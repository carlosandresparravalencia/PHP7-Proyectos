var myInput = document.getElementById("cambiar-clave1");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// Cuando el usuario hace clic en el campo de contraseña, muestra el cuadro de mensaje
myInput.onfocus = function() {
document.getElementById("message").style.display = "block";
}

// Cuando el usuario hace clic fuera del campo de contraseña, oculta el cuadro de mensaje
myInput.onblur = function() {
document.getElementById("message").style.display = "none";
}

// Cuando el usuario comienza a escribir algo dentro del campo de contraseña
myInput.onkeyup = function() {
// Validar letras minúsculas
var lowerCaseLetters = /[a-z]/g;
if(myInput.value.match(lowerCaseLetters)) {  
letter.classList.remove("invalid");
letter.classList.add("valid");
} else {
letter.classList.remove("valid");
letter.classList.add("invalid");
}

// Validar letras mayúsculas
var upperCaseLetters = /[A-Z]/g;
if(myInput.value.match(upperCaseLetters)) {  
capital.classList.remove("invalid");
capital.classList.add("valid");
} else {
capital.classList.remove("valid");
capital.classList.add("invalid");
}

// Validar números
var numbers = /[0-9]/g;
if(myInput.value.match(numbers)) {  
number.classList.remove("invalid");
number.classList.add("valid");
} else {
number.classList.remove("valid");
number.classList.add("invalid");
}

// Validar longitud
if(myInput.value.length >= 8) {
length.classList.remove("invalid");
length.classList.add("valid");
} else {
length.classList.remove("valid");
length.classList.add("invalid");
}
}