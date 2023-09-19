
window.onload = function () {
    document.forms.formCadastrom.onsubmit = validaFormCadastrom;
}

function validaFormCadastrom(e) {
    let form = e.target;
    let formValidar = true;

    const spanNome = form.nome.nextElementSibling;
    const spanEspecialidade = form.especialidade.nextElementSibling;
    const spanCrm = form.crm.nextElementSibling;
        
    spanNome.textContent = "";
    spanEspecialidade.textContent = "";
    spanCrm.textContent = "";
        
    if (form.nome.value === "") {
        spanNome.textContent = "O nome deve ser preenchido!!";
        formValidar = false;
    }
    if (form.especialidade.value === "") {
        spanEspecialidade.textContent = "A especialidade deve ser preenchida!!";
        formValidar = false;
    }
    if (form.crm.value === "") {
        spanCrm.textContent = "O CRM deve ser preenchido!!";
        formValidar = false;
    }
    if (!formValidar)
        e.preventDefault();
}