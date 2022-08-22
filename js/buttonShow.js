let usrn = document.getElementById('usernameB');
let buttonD = document.getElementById('displayButton');

buttonD.onclick = function () {
    buttonD.addEventListener('click', (buttonD) => {
        usrn.id = 'usernameA';
        buttonD.id = 'hideButton';
        setTimeout(() => {
            usrn.id = 'usernameB';
            buttonD.id = 'displayButton';
        }, 2000);
    });
}