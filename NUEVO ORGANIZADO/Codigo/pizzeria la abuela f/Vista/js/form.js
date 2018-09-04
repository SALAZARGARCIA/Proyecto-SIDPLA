var inputs = document.getElementsByClassName('inputt');
for(var i =0; i < inputs.length; i++){
    inputs[i].addEventListener('keyup', function(){
        if(this.value.length>=1){
            this.nextElementSibling.classList.add('fijar');
        }else{
         this.nextElementSibling.classList.remove('fijar');
        }
    })
}

function evaluar() {
    var clave1 = document.getElementById("Pass").value; 
    var clave2 = document.getElementById("Pass2").value;
    if (clave1 != clave2) {
        alert("Las contraseñas no coinciden");
        return false;
    }
}