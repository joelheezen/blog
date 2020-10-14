function editAccount(){
    let area = document.getElementsByClassName('profile-details');
    let popup = document.createElement('div');
    area[0].appendChild(popup);
    popup.innerHTML = 'test';
    popup.classList.add('popup-edit-form');

    let form = document.createElement('form');
    let labelName = document.createElement('label');
    let labelEmail = document.createElement('label');
    let inputName = document.createElement('input');
    let inputEmail = document.createElement('input');
    let inputButton = document.createElement('button');
    let inputToken = document.createElement('input');

    popup.appendChild(form);
    form.appendChild(inputToken);
    form.appendChild(labelName);
    form.appendChild(inputName);
    form.appendChild(labelEmail);
    form.appendChild(inputEmail);
    form.appendChild(inputButton);


    inputToken.type = 'hidden';
    inputToken.name = '_token';
    inputToken.value = token;

    form.method = 'post';
    form.action = loc;

    labelName.innerHTML = 'Naam:';
    labelEmail.innerHTML = 'Email:';
    inputButton.innerHTML = 'update';
    inputName.type = 'text';
    inputEmail.type = 'text';
    inputButton.type = 'submit';

    inputEmail.id = 'email';
    inputEmail.name = 'email';
    inputName.id = 'name';
    inputName.name = 'name';

}
