window.onload = function () {
    document.forms.formcontato.onsubmit = validaFormcontato;

}

function validaFormcontato(e) {
    let form = e.target;
    let formValidar = true;

    const spanNome = form.nome.nextElementSibling;
    const spanEmail = form.email.nextElementSibling;
    const spanTelefone = form.telefone.nextElementSibling;
        

    spanNome.textContent = "";
    spanEmail.textContent = "";
    spanTelefone.textContent = "";
    
        

    if (form.nome.value === "") {
        spanNome.textContent = "O nome deve ser preenchido!!";
        formValidar = false;
    }
    if (form.email.value === "") {
        spanEmail.textContent = "O email deve ser preenchido!!";
        formValidar = false;
    }
    if (form.telefone.value === "") {
        spanTelefone.textContent = "O telefone deve ser preenchido!!";
        formValidar = false;
    }
    if (!formValidar)
        e.preventDefault();
}