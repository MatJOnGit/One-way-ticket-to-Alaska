class UserDataEditor extends Editor {

    constructor() {
        super();
        this._usernameElement = document.getElementById('username');
        this._usernameEditButton = this._usernameElement.childNodes[3];
        
        this._userEmailElement = document.getElementById('user-email');
        this._userEmailEditButton = this._userEmailElement.childNodes[3];
        
        this._userPasswordElement = document.getElementById('user-password');
        this._userPasswordEditButton = this._userPasswordElement.childNodes[3];
        
        this._userId = document.getElementById('id-container').childNodes[1].textContent;
        
        this._alertDuration = 3000;
        
        this._editionElements = document.querySelectorAll('.edit-info-button');
        
        this._emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        this._passwordRegex = /^(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z]).{6,}$/;
        this._usernameRegex = /^(?=.{5,20}$)[a-zA-Z]+([_-]?[a-zA-Z0-9])*$/;
    }
    
    get alertDuration() {
        return this._alertDuration;
    }
    
    get emailRegex() {
        return this._emailRegex;
    }
    
    get passwordRegex() {
        return this._passwordRegex;
    }
    
    get usernameRegex() {
        return this._usernameRegex;
    }
    
    convertParamNameToCamelCase(userParam) {
        if (userParam.includes('-')) {
            userParam = userParam.split('-')[0] + userParam.split('-')[1].charAt(0).toUpperCase() + userParam.split('-')[1].slice(1);
        }
        
        return userParam;
    }
    
    delayedAlertRemover(formElement) {
        let alertCountdown = this.alertDuration;
        let alertTimer = setInterval(function() {
            alertCountdown = alertCountdown - 1000;
            if (alertCountdown <= 0) {
                formElement.querySelector('p').textContent = '';
                clearInterval(alertTimer);
            }
        }, 1000);
    }
    
    displayForm(e) {
        const userDataContainer = this.getContainerElement(e.target);
        
        userDataContainer.innerHTML = '';
        
        const updatedParam = this.convertParamNameToCamelCase(userDataContainer.id);
        
        const formElement = this.createFormElements(userDataContainer.id, updatedParam);        
        
        formElement.setAttribute('action', 'index.php?action=editMemberParam&updatedParam=' + updatedParam + '&id=' + this.userId);
        formElement.classList.add('vertical-form');
        userDataContainer.appendChild(formElement);
                        
        switch (userDataContainer.id) {
            case 'user-email' :
                this.verifyEmail(formElement, formElement.querySelector('p'));
                break;
            case 'user-password' :
                this.verifyPassword(formElement, formElement.querySelector('p'));
                break;
            case 'username' :
                this.verifyUsername(formElement, formElement.querySelector('p'));
                break;
        }
    }
    
    verifyEmail(formElement, alertElement) {
        formElement.querySelector('input').addEventListener('blur', () => {
            if (this.emailRegex.test(formElement.querySelector('input').value) && formElement.querySelector('p').textContent === 'email non valide') {
                alertElement.textContent = 'adresse valide';
                alertElement.className = '';
                alertElement.classList.add('correct-entry');
                this.delayedAlertRemover(formElement);
            }
            
            else if (!this.emailRegex.test(formElement.querySelector('input').value) && (formElement.querySelector('input').value.length != 0)) {
                alertElement.textContent = 'email non valide';
                alertElement.className = '';
                alertElement.classList.add('incorrect-entry');
            }
        });
        
        console.log(formElement.parentNode.id)
        
        formElement.addEventListener('submit', (e) => {
            if ((!formElement.parentNode.id.includes('email')) || (!this.emailRegex.test(formElement.querySelector('input').value))) {
                e.preventDefault();
            }
        })
    }
    
    verifyPassword(formElement, alertElement) {
        formElement.querySelector('input').addEventListener('blur', () => {
            if (this.passwordRegex.test(formElement.querySelector('input').value) && formElement.querySelector('p').textContent === 'mot de passe non valide') {
                alertElement.textContent = 'mot de passe valide';
                alertElement.className = '';
                alertElement.classList.add('correct-entry');
                this.delayedAlertRemover(formElement);
            }
            
            else if (!this.passwordRegex.test(formElement.querySelector('input').value)) {
                alertElement.textContent = 'mot de passe non valide';
                alertElement.className = '';
                alertElement.classList.add('incorrect-entry');
            }
        });
        
        formElement.addEventListener('submit', (e) => {
            if ((formElement.id.includes('password')) && (!passwordRegex.test(container.querySelector('input').value))) {
                e.preventDefault();
            }
        })
    }
    
    verifyUsername(formElement, alertElement) {
        formElement.querySelector('input').addEventListener('blur', () => {
            if (this.usernameRegex.test(formElement.querySelector('input').value) && formElement.querySelector('p').textContent === 'pseudo non valide') {
                alertElement.textContent = 'pseudo valide';
                alertElement.className = '';
                alertElement.classList.add('correct-entry');
                this.delayedAlertRemover(formElement);
            }
            
            else if (!this.usernameRegex.test(formElement.querySelector('input').value)) {
                alertElement.textContent = 'pseudo non valide';
                alertElement.className = '';
                alertElement.classList.add('incorrect-entry');
            }
        });
        
        formElement.addEventListener('submit', (e) => {
            if ((formElement.id.includes('username')) && (!this.usernameRegex.test(container.querySelector('input').value))) {
                e.preventDefault();
            }
        })
    }
}