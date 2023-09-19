window.onload = function () {
document.forms.formCadastrof.onsubmit = validaFormCadastrof;
}

function validaFormCadastrof(e) {
    let form = e.target;
    let formValidar = true;

    const spanNome = form.nome.nextElementSibling;
    const spanEmail = form.email.nextElementSibling;
    const spanSenhahash = form.senhahash.nextElementSibling;
    const spanEstadocivil = form.estadocivil.nextElementSibling;
    const spanDatanascimento = form.datanascimento.nextElementSibling;
    const spanFuncao = form.funcao.nextElementSibling;

    spanNome.textContent = "";
    spanEmail.textContent = "";
    spanSenhahash.textContent = "";
    spanEstadocivil.textContent = "";
    spanDatanascimento.textContent = "";
    spanFuncao.textContent = "";

    if (form.nome.value === "") {
        spanNome.textContent = "O nome deve ser preenchido!!";
        formValidar = false;
    }
    if (form.email.value === "") {
        spanEmail.textContent = "O email deve ser preenchido!!";
        formValidar = false;
    }
    if (form.senhahash.value === "") {
        spanSenhahash.textContent = "A senha deve ser preenchida!!";
        formValidar = false;
    }
    if (form.estadocivil.value === "") {
        spanEstadocivil.textContent = "O estado civil deve ser escolhido!!";
        formValidar = false;
    }
    if (form.datanascimento.value === "") {
        spanDatanascimento.textContent = "A data de nascimento deve ser preenchida!!";
        formValidar = false;
    }
    if (form.funcao.value === "") {
        spanFuncao.textContent = "A função deve ser preenchida!!";
        formValidar = false;
    }

    if (!formValidar)
        e.preventDefault();
}
