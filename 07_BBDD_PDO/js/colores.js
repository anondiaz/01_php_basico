const formInsert = document.forms['formInsert'];

formInsert.addEventListener('submit', (e) => {
    e.preventDefault();
    alert('Hola')
    document.getElementById('errorUsuario').textContent = '';
    document.getElementById('errorColor').textContent = '';

    const color = formInsert['color'].value.trim();
    const usuario = formInsert['usuario'].value.trim();
    const web = formInsert['web'].value;
    const sessionToken = formInsert['session-token'].value;

    if (usuario === '') {
        document.getElementById('errorUsuario').textContent = 'No pongas solo espacios en blanco';
        return;
    }
    if (usuario === '') {
        document.getElementById('errorColor').textContent = 'No pongas solo espacios en blanco';
        return;
    }

    const regex = /[a-zA-ZÇáéíóúàèìòùÁÉÍÓÚñç\s]+/

    if (!regex.test(usuario)){
        document.getElementById('errorUsuario').textContent = 'Hay que poner un nombre valido';
        return;
    }

    if (!regex.test(color)){
        document.getElementById('errorColor').textContent = 'Hay que poner un color valido';
        return;
    }

    if (web != "") {
        alert("Bot detectado");
        return;
    }

        alert ("Hoy es viernes")


})