function validateUsername(event) {
    const control = event.currentTarget.parentElement;
    let value = event.currentTarget.value;
    let message;
    const regex = '^[a-zA-Z]+$';

    if (value.length < 1) {
        message = 'Benutzername darf nicht leer sein.';
        setInvalid(control, message);
    } else if (value.length < 5) {
        message = 'Benutzername muss min. 5 Zeichen lang sein.';
        setInvalid(control, message);
    } else if (!value.match(regex)) {
        message = 'Benutzername darf nur Buchstaben enthalten.';
        setInvalid(control, message);
    } else {
        setValid(control);
    }
    updateSubmit(control.parentElement);
}

function validatePassword(event) {
    const control = event.currentTarget.parentElement;
    let value = event.currentTarget.value;

    if (value.length < 1) {
        message = 'Passwort darf nicht leer sein.';
        setInvalid(control, message);
    } else if (value.length < 6) {
        message = 'Password muss min. 6 Zeichen lang sein.';
        setInvalid(control, message);
    } else {
        setValid(control);
    }
    updateSubmit(control.parentElement);
}

function validateConfirmedPassword(event) {
    const control = event.currentTarget.parentElement;
    let value = event.currentTarget.value;
    const password = document.getElementById('password');

    if (value.length < 1) {
        message = 'Bestätigtes Passwort darf nicht leer sein.';
        setInvalid(control, message);
    } else if (password !== null && value !== password.value) {
        message = 'Passwort stimmt nicht überein.';
        setInvalid(control, message);
    } else {
        setValid(control);
    }
    updateSubmit(control.parentElement);
}

function validateEmail(event) {
    const control = event.currentTarget.parentElement;
    let value = event.currentTarget.value;
    const emailRegex = '^[a-z0-9._%+-]+@[a-z0-9.-]+\\.[a-z]{2,4}$';

    if (value.length < 1) {
        message = 'Email darf nicht leer sein.';
        setInvalid(control, message);
    } else if (!value.match(emailRegex)) {
        message = 'Email ist ungültig.';
        setInvalid(control, message);
    } else {
        setValid(control);
    }
    updateSubmit(control.parentElement.parentElement.parentElement);
}

function validateLink(event) {
    const control = event.currentTarget.parentElement;
    let value = event.currentTarget.value;
    const linkRegex = '^(http:\\/\\/www\\.|https:\\/\\/www\\.|http:\\/\\/|https:\\/\\/)?[a-z0-9]+([\\-\\.]{1}[a-z0-9]+)*\\.[a-z]{2,5}(:[0-9]{1,5})?(\\/.*)?$';

    if (value.length < 1) {
        message = 'Link darf nicht leer sein.';
        setInvalid(control, message);
    } else if (!value.match(linkRegex)) {
        message = 'Link ist ungültig.';
        setInvalid(control, message);
    } else {
        setValid(control);
    }
    updateSubmit(control.parentElement);
}

function validateDescription(event) {
    const control = event.currentTarget.parentElement;
    let value = event.currentTarget.value;

    if (value.length < 1) {
        message = 'Beschreibung darf nicht leer sein.';
        setInvalid(control, message);
    } else {
        setValid(control);
    }
    updateSubmit(control.parentElement);
}
function updateSubmit(form) {
    if (form !== null) {
        const fields = form.querySelectorAll('.form-field');
        let update = false;

        fields.forEach(field => {
            if (field.classList.contains('valid')) {
                update = true;
            } else {
                update = false;
            }
        });

        if (update) {
            form.querySelector('.form-submit').removeAttribute('disabled');
        } else {
            form.querySelector('.form-submit').setAttribute('disabled', '');
        }
    }
}

function setValid(control) {
    control.classList.add('valid');
    control.classList.remove('invalid')
}

function setInvalid(control, message) {
    control.classList.remove('valid');
    control.classList.add('invalid');

    control.querySelector('.tooltip-message').innerText = message;
}