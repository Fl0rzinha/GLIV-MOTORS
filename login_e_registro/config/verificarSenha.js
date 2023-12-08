function verificPassword() {
    let inputPassword = document.querySelector(".passwordInput");
    let confirmPassword = document.querySelector(".passwordInput2");
    let campoMsg = document.getElementById("confirmSenha");
    let registerButton = document.getElementById("register-button");

    if(inputPassword.value === confirmPassword.value) {
        campoMsg.innerHTML = 'As senhas coincidem';
        campoMsg.style.color = "#0300FF";
        registerButton.disabled = false;
    } else {
        campoMsg.innerHTML = 'As senhas não coincidem';
        campoMsg.style.color = "red";
        registerButton.disabled = true;
    }
}