function editAccount(){
    let area = document.getElementsByClassName('profile-details');
    let popup = document.createElement('div');
    area[0].appendChild(popup);
    popup.classList.add('popup-edit-form');
    popup.style.position = 'absolute';
    popup.style.zIndex = '2';


    let form = document.createElement('form');
    let labelName = document.createElement('label');
    let labelEmail = document.createElement('label');
    let inputName = document.createElement('input');
    let inputEmail = document.createElement('input');
    let inputButton = document.createElement('button');
    let inputToken = document.createElement('input');

    let backButton = document.createElement('button');

    popup.appendChild(form);
    form.appendChild(inputToken);
    form.appendChild(labelName);
    form.appendChild(inputName);
    form.appendChild(labelEmail);
    form.appendChild(inputEmail);
    form.appendChild(inputButton);
    popup.appendChild(backButton);


    inputToken.type = 'hidden';
    inputToken.name = '_token';
    inputToken.value = token;
    inputToken.id = 'token';

    form.method = 'post';
    form.action = loc;
    form.id = 'form';

    labelName.innerHTML = 'Name:';
    labelName.id = 'labelname';
    labelEmail.innerHTML = 'Email:';
    labelEmail.id = 'labelemail';
    inputButton.innerHTML = 'update';
    inputName.type = 'text';
    inputEmail.type = 'text';
    inputButton.type = 'submit';
    inputButton.id = 'inputbutton';

    inputEmail.id = 'email';
    inputEmail.name = 'email';
    inputName.id = 'name';
    inputName.name = 'name';

    backButton.innerHTML = 'X';



    backButton.addEventListener("click", function(){
        popup.remove();
        backButton.remove();
    });
}

function search(){
    // declare vars
    let input = document.getElementById('searchbar');
    let filter = input.value.toUpperCase();
    let divs = document.getElementsByClassName('blog-row');

    let inputFilter = document.getElementById('filter-category');
    let filterFilter = inputFilter.value;

    // loops through all items and hides those that dont match
    for (let i = 0; i < divs.length; i++) {
        let p = divs[i].getElementsByTagName('p')[0];
        let h2 = divs[i].getElementsByTagName('h2')[0];
        let cat = divs[i].getElementsByTagName('input')[0];
        let textValueFilter = cat.value;
        let textValue = h2.textContent || h2.innerText;
        let textValue2 =  p.textContent || p.innerText;
        if ((textValue.toUpperCase().indexOf(filter) > -1 || textValue2.toUpperCase().indexOf(filter) > -1) && textValueFilter.indexOf(filterFilter) > -1) {
            divs[i].style.display = "";
        }
        else {
            divs[i].style.display = "none";
        }
    }
}

function editComment(id){
    let formId = "com-edit" + id;
    let form = document.getElementById(formId);
    let title = document.createElement("input");
    let comment = document.createElement("textarea");
    let confirm = document.createElement("button");

    let commentsGroup = document.getElementById(id);

    let titleValue = commentsGroup.getElementsByClassName('comment-show')[0].innerText;
    let commentValue = commentsGroup.getElementsByClassName('comment-show-full')[0].innerText;

    let titleCheck = document.getElementById("title" + id);
    let commentCheck = document.getElementById("comment" + id);
    let confirmCheck = document.getElementById("button" + id);

    if (titleCheck && commentCheck) {
        form.removeChild(titleCheck);
        form.removeChild(commentCheck);
        form.removeChild(confirmCheck);
    }
    else{
        form.appendChild(title);
        form.appendChild(comment);
        form.appendChild(confirm);

        title.type = "text";
        confirm.type = "submit";

        title.name = "headline";
        comment.name = "comment";

        title.id = "title" + id;
        comment.id = "comment" + id;
        confirm.id = "button" + id;

        title.value = titleValue;
        comment.value = commentValue;
        confirm.innerText = "update";
    }

}

