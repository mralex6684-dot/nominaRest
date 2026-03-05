const API = "http://localhost/nominaRest/public/index.php?url=";


async function login() {
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    const res = await fetch(API + "login", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ email, password })
    });

    const data = await res.json();

    if (data.usuario) {
        localStorage.setItem("usuario", JSON.stringify(data.usuario));
        window.location.href = "dashboard.html";
    } else {
        alert(data.error);
    }
}

async function cargarEmpleados(){

    const res = await fetch("http://localhost/nominaRest/public/index.php?url=empleados");
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