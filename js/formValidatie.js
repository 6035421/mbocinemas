for (i of document.body.getElementsByTagName('INPUT')) {
    i.addEventListener('input', function () {
        validate(this);
    });

    validate(i);
}

function validate (inpObj) {
    if (inpObj.value == "") {
        showError('Dit veld kan niet leeg zijn.', inpObj.parentNode, inpObj);
    } else {
        setSubmitVisibility(inpObj.parentNode, 1.0);
    }
}

function setSubmitVisibility(element, opacity) {
    let inputs = element.getElementsByTagName('button');
    let i;

    for (i of inputs) {
        if (i.type.toLowerCase() == 'submit') {
            i.style.opacity = opacity;
        }
    }
}

function showError(message, parent, inpObj) {
    let msg = document.createElement('label');
    msg.innerHTML = message;
    msg.style.color = 'white';
    msg.style.marginBottom = '8px';

    setSubmitVisibility(parent, 0.5);

    inpObj.after(msg);

    window.setTimeout(function () {
        msg.remove();
    }, 2500);
}