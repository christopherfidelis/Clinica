function mostrarAgendamento () {
    const email =  document.getElementById("email");
    let valor = email.value;

    let xhr = new XMLHttpRequest();
    xhr.open("GET", "selectAgendamento.php?email=" + valor, true);

    xhr.onload = function () {
        document.getElementById("resultadoconsulta").innerHTML = xhr.responseText;
    };

    xhr.onerror = function () {
    console.log("Erro de rede - requisição não finalizada");
    };

    xhr.send();
}

window.onload = function () {
    const button =  document.getElementById("botao");
    button.addEventListener("click", mostrarAgendamento);
};