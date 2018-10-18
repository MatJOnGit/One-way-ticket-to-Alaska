class RegisterHelper extends IdentificationHelper {
    constructor() {
        super();
        this._emailInputElement = document.getElementById('usr-email');
        this._emailAlert = this._emailInputElement.parentNode.querySelector('p');
        
        this._copiedPasswordInputElement = document.getElementById('usr-copied-pwd');
        this._copiedPasswordAlert = this._copiedPasswordInputElement.parentNode.querySelector('p');
        
        this._emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    }
    
    get emailInputElement() {
        return this._emailInputElement;
    }
    
    get emailAlert() {
        return this._emailAlert;
    }
    
    get copiedPasswordInputElement() {
        return this._copiedPasswordInputElement;
    }
    
    get copiedPasswordAlert() {
        return this._copiedPasswordAlert;
    }
    
    get emailRegex() {
        return this._emailRegex;
    }
    
    addEmailTests() {
        this.emailInputElement.addEventListener('blur', () => {
            if (this.emailRegex.test(this.emailInputElement.value) && this.emailAlert.textContent === 'adresse mail incorrecte') {
                this.emailAlert.textContent = 'adresse mail valide';
                this.emailAlert.style.color = 'green';
                let alertDuration = 3000;
                let alertTimer = setInterval(() => {
                    alertDuration = alertDuration - 1000;
                    if (alertDuration <= 0) {
                        this.emailAlert.textContent = '';
                        clearInterval(alertTimer);
                    }
                }, 1000);
            }
        })
        
        this.emailInputElement.addEventListener('blur', () => {
            if ((!this.emailRegex.test(this.emailInputElement.value)) && (this.emailInputElement.value != '')) {
                this.emailAlert.textContent = 'adresse mail incorrecte';
                this.emailAlert.style.color = 'red';
                this.emailAlert.style.marginTop = '10px';
            }
        })
    }
    
    addCopiedPasswordTests() {
        this.copiedPasswordInputElement.addEventListener('blur', () => {
            if (this.passwordRegex.test(this.copiedPasswordInputElement.value) && this.copiedPasswordAlert.textContent === 'mot de passe invalide') {
                this.copiedPasswordAlert.textContent = 'mot de passe valide';
                this.copiedPasswordAlert.style.color = 'green';
                let alertDuration = 3000;
                let alertTimer = setInterval(() => {
                    alertDuration = alertDuration - 1000;
                    if (alertDuration <= 0) {
                        this.copiedPasswordAlert.textContent = '';
                        clearInterval(alertTimer);
                    }
                }, 1000);
            }
        })
        
        this.copiedPasswordInputElement.addEventListener('blur', () => {
            if ((!this.passwordRegex.test(this.copiedPasswordInputElement.value)) && (this.copiedPasswordInputElement.value != '')) {
                this.copiedPasswordAlert.textContent = 'mot de passe invalide';
                this.copiedPasswordAlert.style.color = 'red';
                this.copiedPasswordAlert.style.marginTop = '10px';
            }
        })
    }
    
    addRegisterSubmitTest() {
        this.formElement.addEventListener('submit', (e) => {
            if ((!this.usernameRegex.test(this.usernameInputElement.value)) || (!this.emailRegex.test(this.emailInputElement.value)) || (!this.passwordRegex.test(this.passwordInputElement.value)) || (!this.passwordRegex.test(this.copiedPasswordInputElement.value)) || (this.passwordInputElement.value != this.copiedPasswordInputElement.value)) {
                e.preventDefault();
            }
        })
    }
}