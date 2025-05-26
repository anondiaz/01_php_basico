const formInsert = document.forms['formInsert'];

formInsert.addEventListener('submit', (e) => {
    e.preventDefault();
    // alert('Hola')
    document.getElementById('errorUsuario').textContent = "";
    document.getElementById('errorColor').textContent = "";

    const color = formInsert["color"].value.trim();
    const usuario = formInsert["usuario"].value.trim();
    const web = formInsert["web"].value;
    const sessionToken = formInsert["session-token"].value;
    const id_usuario = formInsert["id_usuario"].value;

    if (usuario === "" && color === "") {
        document.getElementById("errorUsuario").textContent = "Hay que poner un nombre valido";
        document.getElementById("errorColor").textContent = "Hay que poner un color valido";
        return;
    }
    if (usuario === "") {
        document.getElementById('errorUsuario').textContent = "Hay que poner un nombre valido";
        return;
    }
    if (color === "") {
        document.getElementById('errorColor').textContent = "Hay que poner un color valido";
        return;
    }

    const regex = /[a-zA-ZÇáéíóúàèìòùÁÉÍÓÚñç\s]+/

    if (!regex.test(usuario)){
        document.getElementById('errorUsuario').textContent = "Hay que poner un nombre valido";
        return;
    }

    if (!regex.test(color)){
        document.getElementById('errorColor').textContent = "Hay que poner un color valido";
        return;
    }

    if (web != "") {
        alert("Bot detectado");
        return;
    }

        // alert ("Hoy es viernes");

    const datos = new URLSearchParams();
    datos.append("color", color);
    datos.append("usuario", usuario);
    datos.append("session-token", sessionToken);
    datos.append("web", web);
    datos.append("id_usuario", id_usuario);
    fetch("insert.php", {
          method: "POST",
  body: datos.toString(),
  headers: {
    "Content-Type": "application/x-www-form-urlencoded",
  },
})
  .then((response) => response.text())
  .then((data) => {
    // console.log(data);
    location.reload()
  })
  .catch((error) => {
    alert("Error en la petición");
    console.error("Error:", error);
  });

    })
  
const tiempoInactividad = 6000000; // 60000ms = 1 minuto, se mide en milisegundos (minutos x 60 x 1000)

let temporizador ;

function redirigir(){
  window.location.href = "../logout.php";
}

function resetearTemporizador () {
  clearTimeout(temporizador); //limpia el temporizador anterior
  temporizador = setTimeout(redirigir, tiempoInactividad); // Reinicia el temporizador
}

// Detectar actividad del usuario
window.addEventListener("keydown", resetearTemporizador);
window.addEventListener("mousemove", resetearTemporizador);
window.addEventListener("scroll", resetearTemporizador);
window.addEventListener("click", resetearTemporizador);
window.addEventListener("touchstart", resetearTemporizador);

resetearTemporizador(); // Iniciar el temporizador al iniciar la carga de la página
