const API = "http://localhost/nominaRest/public/index.php?url="


async function cargarEmpleados(){

const res = await fetch(API + "empleados")

const data = await res.json()

let html = ""

data.forEach(emp => {

html += `
<tr>
<td>${emp.nombre}</td>
<td>${emp.documento}</td>

<td>

<button class="btn-editar" onclick="editarEmpleado(${emp.id})">
Editar
</button>

<button class="btn-eliminar" onclick="eliminarEmpleado(${emp.id})">
Eliminar
</button>

</td>

</tr>
`

})

document.getElementById("tabla").innerHTML = html

}


async function eliminarEmpleado(id){

if(!confirm("Eliminar empleado?")) return

await fetch(API + "empleados/"+id,{
method:"DELETE"
})

cargarEmpleados()

}


window.onload = cargarEmpleados