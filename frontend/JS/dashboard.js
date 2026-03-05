async function totalEmpleados(){

const res = await fetch(API + "empleados");

const data = await res.json();

document.getElementById("totalEmpleados").innerText = data.length;

}


async function totalNominas(){

const res = await fetch(API + "nomina");

const data = await res.json();

document.getElementById("totalNominas").innerText = data.length;

}

async function pagosPendientes(){

const res = await fetch(API + "nomina");

const data = await res.json();

let pendientes = data.filter(n => n.estado === "pendiente");

document.getElementById("pagosPendientes").innerText = pendientes.length;

}


totalEmpleados();
totalNominas();
pagosPendientes();