class SignInHelper extends IdentificationHelper {
    constructor() {
        super();
    }
    
    addSignInSubmitTest() {
        this.formElement.addEventListener('submit', (e) => {
            if (!this.passwordRegex.test(this.passwordInputElement.value)) {
                e.preventDefault();
            }
        })
    }
}