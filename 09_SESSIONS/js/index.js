// Este código se encarga de cargar las cookies del navegador
function getAllCookies() {
  return Object.fromEntries(
    document.cookie.split('; ').map(cookie => cookie.split('='))
  );
}
//Uso:
const cookies = getAllCookies();
console.log(cookies.language); // "en"


// Obtener el idioma del navegador
var idioma = cookies.language || navigator.language || navigator.userLanguage || "es"; // Si no hay idioma en las cookies o en el navegador, se establece el idioma por defecto

// Cargamos el fichero de idiomas con fetch
// jsonIdiomas es una variable que almacenará el contenido del fichero de idiomas
jsonIdiomas = "";
  fetch("../data/idiomas.json")
    .then((respuesta) => respuesta.json())
    .then((data) => {
      jsonIdiomas = data;
      cambiarIdioma(idioma, jsonIdiomas);
      // console.log(jsonIdiomas);
    })
    .catch((error) => {
      console.error("Error al cargar el archivo JSON:", error);
    }); 

// console.log(jsonIdiomas); 

// alert("ok")
// Obtener el formulario
const formIdioma = document.forms["form-idioma"];

// Crearemos el listener
formIdioma.addEventListener("change", () => {
  // obtener el idioma seleccionado
  idioma = formIdioma["idioma"].value;
  // alert("El idioma ha cambiado");
  // console.log(jsonIdiomas[idioma["title"]]);
  // Guardar cookie por 1 minuto
  document.cookie = `language=${idioma}; path=/; max-age=${60}`;
  // Llamar a la función que cargará el idioma
  cambiarIdioma(idioma);
});

function cambiarIdioma(idioma, jsonIdiomas) {
  // Cambiar el idioma del título
  document.querySelector("h1").textContent = jsonIdiomas[idioma]["title"];
  // Cambiar el idioma de la página
  document.querySelector("html[lang]").setAttribute("lang", idioma);
  
  document.querySelector("#init-session").textContent = jsonIdiomas[idioma]["init-session"];
}
