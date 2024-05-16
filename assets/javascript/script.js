/*=======================================================
Copyright (c) 2024. Alejandro Alberto Jiménez Brundin
=======================================================*/
let temporizador;
let segundos = 0;
let intentosFallidos = 0;

function validarJuego() {
  let num = document.getElementById("numero").value;
  let res = document.getElementById("resultado");
  fetch("comprobar.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify({'numeroEnviado': num})
  }) // Llamar al archivo PHP para comprobar y luego el JSON
  .then(response => response.json())
  .then(data => {
      res.innerText = data.mensaje;
      if (data.acertado) {
        detenerContador();
      } else {
        intentosFallidos++;
        document.getElementById("intentosFallidos").innerText = `Intentos fallidos: ${intentosFallidos}`
      }
  });
}

function iniciar() {
    document.getElementById("numero").disabled = false;
    document.getElementById("enviar").disabled = false;
    document.getElementById("iniciar").disabled = true;
    document.getElementById("intentosFallidos").innerText = "Intentos fallidos: 0";
    temporizador = setInterval(() => {
        segundos++;
        document.getElementById("contador").innerText = `Tiempo: ${segundos} segundos`;
    }, 1000);
}

function detenerContador() {
    clearInterval(temporizador);
}
/*=======================================================
Copyright (c) 2024. Alejandro Alberto Jiménez Brundin
=======================================================*/
