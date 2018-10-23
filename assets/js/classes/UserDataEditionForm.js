class UserDataEditionForm extends Editor {

    constructor() {
        super();
        
        this._editableElements = document.querySelectorAll('.edit-info-button');
    }
    
    get editableElements () {
        return this._editableElements;
    }

    addFormDisplayTriggeringEvents() {        
        this.editableElements.forEach((editUserDataButton) => {
            editUserDataButton.addEventListener('click', (e) => {
                this.displayForm(e);
            })
        });
    }
    
    convertParamNameToCamelCase(userParam) {
        let userData;
        
        if (userParam.includes('-')) {
            userParam = userParam.split('-')[0] + userParam.split('-')[1].charAt(0).toUpperCase() + userParam.split('-')[1].slice(1);
        }
        
        return userParam;
    }
    
    displayForm(e) {
        const userDataContainer = this.getContainerElement(e.target);
        
        userDataContainer.innerHTML = '';
        const updatedParam = this.convertParamNameToCamelCase(userDataContainer.id);
        const formElement = this.createFormElements(userDataContainer.id, updatedParam);        
        
        formElement.setAttribute('action', 'index.php?action=editMemberParam&updatedParam=' + updatedParam + '&id=' + this.userId);
        userDataContainer.appendChild(formElement);
        
        formElement.firstChild.style.flexDirection = 'column';
        
        console.log(userDataContainer);
        
        switch (userDataContainer.id) {
            case 'user-email' :
                this.emailTesting(formElement);
                break;
            case 'user-password' :
                this.passwordTesting(formElement);
                break;
            case 'username' :
                this.usernameTesting(formElement);
                break;
        }
    }
    
    emailTesting(formElement) {
        formElement.querySelector('input').addEventListener('blur', () => {
            if (this.emailRegex.test(formElement.querySelector('input').value) && formElement.querySelector('p').textContent === 'email non valide') {
                formElement.querySelector('p').textContent = 'adresse valide';
                formElement.querySelector('p').style.color = 'green';
                formElement.querySelector('input').style.backgroundColor = 'white';
                let alertDuration = 3000;
                let alertTimer = setInterval(function() {
                    alertDuration = alertDuration - 1000;
                    if (alertDuration <= 0) {
                        formElement.querySelector('p').textContent = '';
                        clearInterval(alertTimer);
                    }
                }, 1000);
            }
            
            else if (!this.emailRegex.test(formElement.querySelector('input').value) && (formElement.querySelector('input').value.length != 0)) {
                formElement.querySelector('p').textContent = 'email non valide';
                formElement.querySelector('p').style.color = 'red';
                formElement.querySelector('input').style.backgroundColor = 'pink';
            }
        });
        
        formElement.addEventListener('submit', (e) => {
            if ((!this.formElement.parentNode.id.includes('Email')) || (!this.emailRegex.test(formElement.querySelector('input').value))) {
                e.preventDefault();
            }
        })
    }
    
    passwordTesting(formElement) {        
        formElement.querySelector('input').addEventListener('blur', () => {
            if (this.passwordRegex.test(formElement.querySelector('input').value) && formElement.querySelector('p').textContent === 'mot de passe non valide') {
                formElement.querySelector('p').textContent = 'mot de passe valide';
                formElement.querySelector('p').style.color = 'green';
                formElement.querySelector('input').style.backgroundColor = 'white';
                let alertDuration = 3000;
                let alertTimer = setInterval(function() {
                    alertDuration = alertDuration - 1000;
                    if (alertDuration <= 0) {
                        formElement.querySelector('p').textContent = '';
                        clearInterval(alertTimer);
                    }
                }, 1000);
            }
            
            else if (!this.passwordRegex.test(formElement.querySelector('input').value)) {
                formElement.querySelector('p').textContent = 'mot de passe non valide';
                formElement.querySelector('p').style.color = 'red';
                formElement.querySelector('input').style.backgroundColor = 'pink';
            }
        });
        
        formElement.addEventListener('submit', (e) => {
            if ((this.formElement.id.includes('Password')) && (!passwordRegex.test(container.querySelector('input').value))) {
                e.preventDefault();
            }
        })
    }
    
    usernameTesting(formElement) {        
        formElement.querySelector('input').addEventListener('blur', () => {
            if (this.usernameRegex.test(formElement.querySelector('input').value) && formElement.querySelector('p').textContent === 'pseudo non valide') {
                formElement.querySelector('p').textContent = 'pseudo valide';
                formElement.querySelector('p').style.color = 'green';
                formElement.querySelector('input').style.backgroundColor = 'white';
                let alertDuration = 3000;
                let alertTimer = setInterval(function() {
                    alertDuration = alertDuration - 1000;
                    if (alertDuration <= 0) {
                        formElement.querySelector('p').textContent = '';
                        clearInterval(alertTimer);
                    }
                }, 1000);
            }
            
            else if (!this.usernameRegex.test(formElement.querySelector('input').value)) {
                formElement.querySelector('p').textContent = 'pseudo non valide';
                formElement.querySelector('p').style.color = 'red';
                formElement.querySelector('input').style.backgroundColor = 'pink';
            }
        });
        
        formElement.addEventListener('submit', (e) => {
            if ((formElement.id.includes('username')) && (!this.usernameRegex.test(container.querySelector('input').value))) {
                e.preventDefault();
            }
        })
    }
}