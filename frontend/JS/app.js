const API = "http://localhost/nominaRest/backend/index.php?url=";

async function cargarEmpleados(){

const res = await fetch(API + "empleados");
const data = await res.json();

let html = "";

data.forEach(emp => {

html += `
<tr>
<td>${emp.nombre}</td>
<td>${emp.documento}</td>
</tr>
`;

});

document.getElementById("tabla").innerHTML = html;

}

cargarEmpleados();

async function login(){

const email = document.getElementById("email").value;
const password = document.getElementById("password").value;

const res = await fetch(API + "login", {

method:"POST",

headers:{
"Content-Type":"application/json"
},

body:JSON.stringify({
email,
password
})

});

const data = await res.json();

if(data.usuario){

localStorage.setItem("usuario",JSON.stringify(data.usuario));

window.location.href = "dashboard.html";

}else{

alert("Usuario o contraseña incorrectos");

}

}

async function generarNomina(){

const id = document.getElementById("empleadoSelect").value

const res = await fetch(API + "nomina&id_empleado="+id)

const data = await res.json()

document.getElementById("resultadoNomina").innerHTML = `

<h3>Total Devengado: $${data.devengado}</h3>

<h3>Deducciones: $${data.deducciones}</h3>

<h2>Total a pagar: $${data.total}</h2>

`

}


cargarEmpleados()
