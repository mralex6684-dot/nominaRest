const API = "http://localhost/nominaRest/backend/index.php?url=";


/* =========================
CARGAR EMPLEADOS
========================= */

async function cargarEmpleados(){

const res = await fetch(API + "empleados");

const data = await res.json();

let select = document.getElementById("empleadoSelect");

data.forEach(emp => {

select.innerHTML += `
<option value="${emp.id}">
${emp.nombre}
</option>
`;

});

}


/* =========================
GENERAR NOMINA
========================= */

async function generarNomina(){

const id = document.getElementById("empleadoSelect").value;

if(id === ""){
alert("Selecciona un empleado");
return;
}

const res = await fetch(API + "nomina&id_empleado=" + id);

const data = await res.json();


document.getElementById("resultadoNomina").innerHTML = `

<div class="card">

<h3>Total Devengado: $${data.devengado}</h3>

<h3>Deducciones: $${data.deducciones}</h3>

<h2>Total a pagar: $${data.total}</h2>

</div>

`;

}


cargarEmpleados();