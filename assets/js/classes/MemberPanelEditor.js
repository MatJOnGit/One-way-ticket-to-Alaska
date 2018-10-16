class MemberPanelEditor extends Editor {    

    emailTesting(formElement) {
        const emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        
        formElement.querySelector('input').addEventListener('blur', () => {
            if (emailRegex.test(formElement.querySelector('input').value) && formElement.querySelector('p').textContent === 'email non valide') {
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
            
            else if (!emailRegex.test(formElement.querySelector('input').value) && (formElement.querySelector('input').value.length != 0)) {
                formElement.querySelector('p').textContent = 'email non valide';
                formElement.querySelector('p').style.color = 'red';
                formElement.querySelector('input').style.backgroundColor = 'pink';
            }
        });
        
        formElement.addEventListener('submit', (e) => {
            if ((!formElement.parentNode.id.includes('Email')) || (!emailRegex.test(formElement.querySelector('input').value))) {
                e.preventDefault();
            }
        })
    }
    
    displayForm(e, userId) {
        const userDataContainer = this.getContainerElement(e.target);

        userDataContainer.innerHTML = '';
        const formElement = this.createFormElements(userDataContainer.id);

        formElement.setAttribute('action', 'index.php?action=editMemberParam&updatedParam=' + userDataContainer.id + '&id=' + userId);
        userDataContainer.appendChild(formElement);
        
        formElement.firstChild.style.flexDirection = 'column';
        
        switch (userDataContainer.id) {
            case 'userEmail' :
                this.emailTesting(formElement);
                break;
            case 'userPwd' :
                this.passwordTesting(formElement);
                break;
            case 'userName' :
                this.usernameTesting(formElement);
                break;
        }
    }
    
    passwordTesting(formElement) {
//        const passwordRegex = ;
//        
//        formElement.querySelector('input').addEventListener('blur', () => {
//            if (passwordRegex.test(formElement.querySelector('input').value) && formElement.querySelector('p').textContent === 'email non valide') {
//                formElement.querySelector('p').textContent = 'mot de passe valide';
//                formElement.querySelector('p').style.color = 'green';
//                formElement.querySelector('input').style.backgroundColor = 'white';
//                const alertDuration = 3000;
//                let alertTimer = setInterval(function() {
//                    alertDuration = alertDuration - 1000;
//                    if (alertDuration <= 0) {
//                        formElement.querySelector('p').textContent = '';
//                        clearInterval(alertTimer);
//                    }
//                }, 1000);
//            }
//            
//            else if (!passwordRegex.test(formElement.querySelector('input').value)) {
//                formElement.querySelector('p').textContent = 'mot de passe non valide';
//                formElement.querySelector('p').style.color = 'red';
//                formElement.querySelector('input').style.backgroundColor = 'pink';
//            }
//        });
//        
//        formElement.addEventListener('submit', (e) => {
//            if ((formElement.id.includes('Pwd')) && (!passwordRegex.test(container.querySelector('input').value))) {
//                e.preventDefault();
//            }
//        })
    }
    
    usernameTesting(formElement) {
//        const usernameRegex = ;
//        
//        formElement.querySelector('input').addEventListener('blur', () => {
//            if (usernameRegex.test(formElement.querySelector('input').value) && formElement.querySelector('p').textContent === 'pseudo non valide') {
//                formElement.querySelector('p').textContent = 'pseudo valide';
//                formElement.querySelector('p').style.color = 'green';
//                formElement.querySelector('input').style.backgroundColor = 'white';
//                const alertDuration = 3000;
//                let alertTimer = setInterval(function() {
//                    alertDuration = alertDuration - 1000;
//                    if (alertDuration <= 0) {
//                        formElement.querySelector('p').textContent = '';
//                        clearInterval(alertTimer);
//                    }
//                }, 1000);
//            }
//            
//            else if (!usernameRegex.test(formElement.querySelector('input').value)) {
//                formElement.querySelector('p').textContent = 'pseudo non valide';
//                formElement.querySelector('p').style.color = 'red';
//                formElement.querySelector('input').style.backgroundColor = 'pink';
//            }
//        });
//        
//        formElement.addEventListener('submit', (e) => {
//            if ((formElement.id.includes('Username')) && (!usernameRegex.test(container.querySelector('input').value))) {
//                e.preventDefault();
//            }
//        })
    }
}