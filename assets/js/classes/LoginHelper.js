class LoginHelper {
    constructor() {
        this._usernameInputElement = document.getElementById('usr_name');
        this._usernameContainer = this._usernameInputElement.parentNode;
        this._usernameAlert = this._usernameContainer.querySelector('p');
                
        this._passwordInputElement = document.getElementById('usr-pwd');
        this._passwordContainer = this._passwordInputElement.parentNode;
        console.log(this._passwordContainer);
        this._passwordAlert = this._passwordContainer.querySelector('p');
        console.log(this._passwordAlert);
        
        this._formElement = this._usernameContainer.parentNode;
    }
    
    get usernameInputElement() {
        return this._usernameInputElement;
    }
    
    get usernameContainer() {
        return this._usernameContainer;
    }
    
    get passwordInputElement() {
        return this._passwordInputElement;
    }
    
    get passwordContainer() {
        return this._passwordContainer;
    }
    
    get passwordAlert() {
        return this._passwordAlert;
    }
    
    get formElement() {
        return this._formElement;
    }

    addDataTesting(formElement) {
        const passwordRegex = /^(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z]).{6,}$/;

        this.passwordInputElement.addEventListener('blur', () => {
            if (!passwordRegex.test(this.passwordInputElement.value)) {
                console.log(this.passwordAlert);
                this.passwordAlert.textContent = 'mot de passe invalide';
                this.passwordAlert.style.color = 'red';
                this.passwordAlert.style.marginTop = '5px';
            }
        })

        
//        formElement.querySelector('input').addEventListener('blur', () => {
//            if (emailRegex.test(formElement.querySelector('input').value) && formElement.querySelector('p').textContent === 'email non valide') {
//                formElement.querySelector('p').textContent = 'adresse valide';
//                formElement.querySelector('p').style.color = 'green';
//                formElement.querySelector('input').style.backgroundColor = 'white';
//                let alertDuration = 3000;
//                let alertTimer = setInterval(function() {
//                    alertDuration = alertDuration - 1000;
//                    if (alertDuration <= 0) {
//                        formElement.querySelector('p').textContent = '';
//                        clearInterval(alertTimer);
//                    }
//                }, 1000);
//            }
//            
//            else if (!emailRegex.test(formElement.querySelector('input').value) && (formElement.querySelector('input').value.length != 0)) {
//                formElement.querySelector('p').textContent = 'email non valide';
//                formElement.querySelector('p').style.color = 'red';
//                formElement.querySelector('input').style.backgroundColor = 'pink';
//            }
//        });
//        
//        formElement.addEventListener('submit', (e) => {
//            if ((!formElement.parentNode.id.includes('Email')) || (!emailRegex.test(formElement.querySelector('input').value))) {
//                e.preventDefault();
//            }
//        })        
    }
}