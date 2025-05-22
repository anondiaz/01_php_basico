


// Obtener el idioma del navegador
var idioma = navigator.language || navigator.userLanguage || "es";

// alert("ok")
// Obtener el formulario
const formIdioma = document.forms["form-idioma"];

// Crearemos el listener
formIdioma.addEventListener("change", () => {
  // obtener el idioma seleccionado
  idioma = formIdioma["idioma"].value;
  // alert("El idioma ha cambiado");
  //   console.log(jsonIdiomas[idioma["title"]]);
  // Llamar a la función que cargará el idioma
  document.cookie = `language=${idioma}; path=/; max-age=${60}`;
  cambiarIdioma(idioma);
});

// Crearemos la función que cargará el idioma
function cambiarIdioma(idioma) {
  // Establecer el idioma vacio
  jsonIdiomas = "";
  // con el fetch cargamos el fichero de idiomas
  fetch("../data/idiomas.json")
    .then((respuesta) => respuesta.json())
    // llenar el jsonIdiomas con el idioma seleccionado
    .then((data) => {
      jsonIdiomas = data;
      // Cambiar el idioma de los elementos
      document.querySelector("h1").textContent = jsonIdiomas[idioma]["title"];
      document.querySelector("html[lang]").setAttribute("lang", idioma);
    })
    .catch((error) => {
      // Si hay un error lo mostramos por consola
      console.log("Hay un error al cargar el fichero de idiomas", error);
    });
}
