function editAccount(){
    let area = document.getElementsByClassName('profile-details');
    let popup = document.createElement('div');
    area[0].appendChild(popup);
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

function search(){
    // declare vars
    let input = document.getElementById('searchbar');
    let filter = input.value.toUpperCase();
    let divs = document.getElementsByClassName('blog-row');

    // loops through all items and hides those that dont match
    for (let i = 0; i < divs.length; i++) {
        let p = divs[i].getElementsByTagName('p')[0];
        let h2 = divs[i].getElementsByTagName('h2')[0];
        let textValue = h2.textContent || h2.innerText;
        let textValue2 =  p.textContent || p.innerText;
        if (textValue.toUpperCase().indexOf(filter) > -1 || textValue2.toUpperCase().indexOf(filter) > -1 ) {
            divs[i].style.display = "";
        }
        else {
            divs[i].style.display = "none";
        }
    }
}

function filter(){
    // declare vars
    let input = document.getElementById('filter-category');
    let filter = input.value;
    let divs = document.getElementsByClassName('blog-row');

    // loops through all items and hides those that dont match
    for (let i = 0; i < divs.length; i++) {
        let cat = divs[i].getElementsByTagName('input')[0];
        let textValue = cat.value;
        if (textValue.indexOf(filter) > -1) {
            divs[i].style.display = "";
        }
        else {
            divs[i].style.display = "none";
        }
    }
}
