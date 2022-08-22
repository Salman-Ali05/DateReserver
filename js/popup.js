function openPopupR() {
    document.getElementById('myPopupR').style.display = 'block';
    document.querySelector(`[data-popup="${popup.replace('#', '')}" ]`).setAttribute('ariaHidden', false);
    document.getElementById('closePopup').focus();
}

function closePopupR() {
    document.getElementById('myPopupR').style.display = 'none';
    document.querySelector(`[data-popup="${popup.replace('#', '')}" ]`).setAttribute('ariaHidden', true);
    document.getElementById('openMyPopup').focus();
}

function openPopupU() {
    document.getElementById('myPopupU').style.display = 'block';
    document.querySelector(`[data-popup="${popup.replace('#', '')}" ]`).setAttribute('ariaHidden', false);
    document.getElementById('closePopup').focus();
}

function closePopupU() {
    document.getElementById('myPopupU').style.display = 'none';
    document.querySelector(`[data-popup="${popup.replace('#', '')}" ]`).setAttribute('ariaHidden', true);
    document.getElementById('openMyPopup').focus();
}

function getPopupValuesReserv(id) {
    let ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let values = JSON.parse(this.responseText)[0];
            let id = values['id'];
            let nom = values['libelleReservation'];
            let desc = values['description'];
            document.getElementById('popIdReserv').innerHTML = "ID : " + id;
            document.getElementById('popNameReserv').innerHTML = "Libelle : " + nom;
            document.getElementById('popDescReserv').innerHTML = "Description : " + desc;
        }
    }
    let data = '{"id": "' + id + '"}';
    ajax.open('POST', 'index.php?uc=admin&action=popupReserv', true);
    ajax.send(data);
}

function getPopupValuesUser(id) {
    let ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let values = JSON.parse(this.responseText)[0];
            let id = values['id'];
            let login = values['login'];
            let mdp = values['mdp'];
            let pseudo = values['pseudo'];
            let statut = values['statut'];
            document.getElementById('popIdUser').innerHTML = "ID : " + id;
            document.getElementById('popLoginUser').innerHTML = "Login : " + login;
            document.getElementById('popMdpUser').innerHTML = "Mot de passe : " + mdp;
            document.getElementById('popPseudoUser').innerHTML = "Pseudo : " + pseudo;
            document.getElementById('popStatutUser').innerHTML = "Statut : " + statut;
        }
    }
    let data = '{"id": "' + id + '"}';
    ajax.open('POST', 'index.php?uc=admin&action=popupUser', true);
    ajax.send(data);
}