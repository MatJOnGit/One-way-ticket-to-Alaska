class IdentificationHelper {
    constructor() {
        this._usernameInputElement = document.getElementById('userNameLogginInput');
        this._usernameAlert = this._usernameInputElement.parentNode.querySelector('p');
                
        this._passwordInputElement = document.getElementById('userPasswordLogginInput');
        this._passwordAlert = this._passwordInputElement.parentNode.querySelector('p');
        
        this._formElement = this._passwordInputElement.parentNode.parentNode;
        
        this._passwordRegex = /^(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z]).{6,}$/;
        this._usernameRegex = /^(?=.{5,20}$)[a-zA-Z]+([_-]?[a-zA-Z0-9])*$/;
    }
    
    get usernameInputElement() {
        return this._usernameInputElement;
    }
        
    get usernameAlert() {
        return this._usernameAlert;
    }
    
    get passwordInputElement() {
        return this._passwordInputElement;
    }
        
    get passwordAlert() {
        return this._passwordAlert;
    }
    
    get formElement() {
        return this._formElement;
    }
    
    get passwordRegex() {
        return this._passwordRegex;
    }
    
    get usernameRegex() {
        return this._usernameRegex;
    }
    
    addPasswordTests() {
        this.passwordInputElement.addEventListener('blur', () => {
            if (this.passwordRegex.test(this.passwordInputElement.value) && this.passwordAlert.textContent === 'mot de passe invalide') {
                this.passwordAlert.textContent = 'mot de passe valide';
                this.passwordAlert.style.color = 'green';
                let alertDuration = 3000;
                let alertTimer = setInterval(() => {
                    alertDuration = alertDuration - 1000;
                    if (alertDuration <= 0) {
                        this.passwordAlert.textContent = '';
                        clearInterval(alertTimer);
                    }
                }, 1000);
            }
        })
        
        this.passwordInputElement.addEventListener('blur', () => {
            if ((!this.passwordRegex.test(this.passwordInputElement.value)) && (this.passwordInputElement.value != '')) {
                this.passwordAlert.textContent = 'mot de passe invalide';
                this.passwordAlert.style.color = 'red';
                this.passwordAlert.style.marginTop = '10px';
            }
        })
    }
    
    addUsernameTests() {        
        this.usernameInputElement.addEventListener('blur', () => {
            if (this.usernameRegex.test(this.usernameInputElement.value) && this.usernameAlert.textContent === 'pseudo incorrect') {
                this.usernameAlert.textContent = 'pseudo valide';
                this.usernameAlert.style.color = 'green';
                let alertDuration = 3000;
                let alertTimer = setInterval(() => {
                    alertDuration = alertDuration - 1000;
                    if (alertDuration <= 0) {
                        this.usernameAlert.textContent = '';
                        clearInterval(alertTimer);
                    }
                }, 1000);
            }
        })
        
        this.usernameInputElement.addEventListener('blur', () => {
            if ((!this.usernameRegex.test(this.usernameInputElement.value)) && (this.usernameInputElement.value != '')) {
                this.usernameAlert.textContent = 'pseudo incorrect';
                this.usernameAlert.style.color = 'red';
                this.usernameAlert.style.marginTop = '10px';
            }
        })
    }
}