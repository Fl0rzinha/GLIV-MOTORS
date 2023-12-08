// Função que coleta a atual url do site, e depois apaga tudo o que estiver depois do "?" útil para a msg de "sucesso ao criar conta", já que an url ela aparece tudo depois do "?".

function resetUrl() {
    var url = window.location.href;
    var urlBase = url.split('?')[0];
    
    window.location.href = urlBase;
}

// função para exibir a senha do input
function togglePassword(icon, input) {
    var input = document.querySelector(input);
    var icon = document.getElementById(icon);

    if (input) {
        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove('bi-lock');
            icon.classList.add('bi-unlock');
        } else {
            input.type = "password";
            icon.classList.remove('bi-unlock');
            icon.classList.add('bi-lock');
        }
    } else {
        console.error("Elemento input não econtrado.")
    }
}