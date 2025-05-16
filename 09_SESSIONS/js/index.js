var idioma = navigator.language || navigator.userLanguage || "es";

// alert("ok")
// Obtener el formulario
const formIdioma = document.forms["form-idioma"];

// Crearemos el listener
formIdioma.addEventListener("change", () => {
  const idioma = formIdioma["idioma"].value;
  // alert("El idioma ha cambiado");
//   console.log(jsonIdiomas[idioma["title"]]);
  cambiarIdioma(idioma)
});

function cambiarIdioma (idioma) {
    jsonIdiomas = "";
fetch("../data/idiomas.json")
  .then((respuesta) => respuesta.json())
  .then((data) => {
    jsonIdiomas = data;
    document.querySelector("h1").textContent = jsonIdiomas[idioma]["title"];
document.querySelector("html[lang]").setAttribute("lang", idioma);
  })
  .catch((error) => {
    console.log("Hay un error al cargar el fichero de idiomas", error);
  });
}


