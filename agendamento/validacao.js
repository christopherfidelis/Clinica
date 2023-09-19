function validaCadastroagenda(e) {
    let form = e.target;
    let formValidar = true;

 
    const spanDatetime = form.datetime.nextElementSibling;
    const spanNome = form.nome.nextElementSibling;
    const spanEmail = form.email.nextElementSibling;
    const spanSexo = form.sexo.nextElementSibling;
    const spanTelefone = form.telefone.nextElementSibling;

    
    
    spanDatetime.textContent = "";
    spanNome.textContent = "";
    spanEmail.textContent = "";
    spanSexo.textContent = "";
    spanTelefone.textContent = "";


    if (form.datetime.value === "") {
        spanDatetime.textContent = "A data e o horário deve ser preenchido!!";
        formValidar = false;
    }
    if (form.nome.value === "") {
        spanNome.textContent = "O nome deve ser preenchido!!";
        formValidar = false;
    }
    if (form.email.value === "") {
        spanEmail.textContent = "O email deve ser preenchido!!";
        formValidar = false;
    }
    if (form.sexo.value === "") {
        spanSexo.textContent = "O sexo deve ser escolhido!!";
        formValidar = false;
    }
    if (form.telefone.value === "") {
        spanTelefone.textContent = "O telefone deve ser preenchido!!";
        formValidar = false;
    }   
    if (!formValidar)
        e.preventDefault();
}

window.onload = function () {
    document.forms.cadastroagenda.onsubmit = validaCadastroagenda;
    const selectEspecialidade = document.getElementById("especialidade");
    selectEspecialidade.addEventListener("change", () => {
        let selectMedico = document.getElementById("medico");
        let valor = selectEspecialidade.value;

    fetch("selectMedico.php?especialidade=" + valor)
        .then(response => {
            return response.text();
        })
        .then(texto => {
            selectMedico.innerHTML = texto;
        });
    });
}
