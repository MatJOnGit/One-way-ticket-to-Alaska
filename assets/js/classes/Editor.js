class Editor {
    
    constructor() {
        this._usernameElement = document.getElementById('username');
        this._usernameEditButton = this._usernameElement.childNodes[3];
        
        this._userEmailElement = document.getElementById('user-email');
        this._userEmailEditButton = this._userEmailElement.childNodes[3];
        
        this._userPasswordElement = document.getElementById('user-password');
        this._userPasswordEditButton = this._userPasswordElement.childNodes[3];
        
        this._userId = document.getElementById('id-container').childNodes[1].textContent;
        
        this._emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        this._usernameRegex = /^(?=.{5,20}$)[a-zA-Z]+([_-]?[a-zA-Z0-9])*$/;
        this._passwordRegex = /^(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z]).{6,}$/;;
    }
    
    get userId() {
        return this._userId;
    }
    
    get emailRegex() {
        return this._emailRegex;
    }
    
    get usernameRegex() {
        return this._usernameRegex;
    }
    
    get passwordRegex() {
        return this._passwordRegex;
    }
    
    createFormElements(containerId, updatedParam) {
        const editionForm = document.createElement('form');
        editionForm.setAttribute('method', 'post');
        
        const inputData = document.createElement('div');
        inputData.classList.add('edition-container');
        
        const formInput = document.createElement('input');
        formInput.setAttribute('required', 'true');
        formInput.setAttribute('name', 'new' + updatedParam.charAt(0).toUpperCase() + updatedParam.slice(1));
        
        const formAlert = document.createElement('p');
        formAlert.textContent = '';
        
        const buttonsContainer = document.createElement('div');
        
        const cancelButton = document.createElement('a');
        cancelButton.href = '';
        cancelButton.classList.add('edit-info-link', 'blue-button');
        cancelButton.innerHTML = '<i class="fas fa-times white-item"></i>';
        
        const submitButton = document.createElement('button');
        submitButton.classList.add('edit-info-button', 'blue-button');
        submitButton.setAttribute('type', 'submit');
        submitButton.innerHTML = '<i class="fas fa-check white-item"></i>';
        
        if (containerId.includes('Email')) {
            formInput.setAttribute('type', 'text')
        } else if (containerId.includes('Pwd')) {
            formInput.setAttribute('type', 'password')
        } else {
            formInput.setAttribute('type', 'text')
        }
        
        buttonsContainer.appendChild(cancelButton);
        buttonsContainer.appendChild(submitButton);
        inputData.appendChild(formInput);
        inputData.appendChild(formAlert);
        editionForm.appendChild(inputData);
        editionForm.appendChild(buttonsContainer);
        
        return editionForm;
    }
    
    getContainerElement(clickedElement) {
        let dataContainer;
        
        if (clickedElement.tagName.toLowerCase() === 'i') {
            dataContainer = clickedElement.parentNode.parentNode;
        } else {
            dataContainer = clickedElement.parentNode;
        }
        
        return dataContainer;
    }
}