class MemberPanelEditor {    
    
    createFormElements(containerId) {
        let userId = document.getElementById('idContainer').childNodes[1].textContent;
        
        let editionForm = document.createElement('form');
        editionForm.setAttribute('method', 'post');
        editionForm.setAttribute('action', 'index.php?action=editMemberParam&updatedParam=' + containerId + '&id=' + userId);
        
        let formInput = document.createElement('input');
        formInput.setAttribute('required', 'true');
        formInput.setAttribute('name', 'new' + containerId.charAt(0).toUpperCase() + containerId.slice(1));
        
        let formAlert = document.createElement('p');
        formAlert.textContent = '';
        formAlert.style.marginBottom = '5px';
        formAlert.style.color = 'red';
        formAlert.style.textAlign = 'right';
        
        let buttonsContainer = document.createElement('div');
        buttonsContainer.style.display = 'flex';
        buttonsContainer.style.flexDirection = 'row';
        buttonsContainer.style.justifyContent = 'flex-end';
        
        let cancelButton = document.createElement('a');
        cancelButton.href = '';
        cancelButton.classList.add('edit-info-link', 'blue-button');
        cancelButton.innerHTML = '<i class="fas fa-times white-item"></i>';
        
        let submitButton = document.createElement('button');
        submitButton.classList.add('edit-info-button', 'blue-button');
        submitButton.style.marginLeft = '10px';
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
        editionForm.appendChild(formInput);
        editionForm.appendChild(formAlert);
        editionForm.appendChild(buttonsContainer);
        
        return editionForm;
    }
    
    displayForm(e) {
        let container;
        
        if (e.target.tagName.toLowerCase() === 'i') {
            container = e.target.parentNode.parentNode;
        } else {
            container = e.target.parentNode;
        }
        container.innerHTML = '';
        let formElement = this.createFormElements(container.id);
        container.appendChild(formElement);
        
        this.implementEventListeners(formElement);
    }
    
    implementEventListeners(formElement) {
        const emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        
        formElement.querySelector('input').addEventListener('blur', () => {
            if (emailRegex.test(formElement.querySelector('input').value) && formElement.querySelector('p').textContent === 'email non valide') {
                formElement.querySelector('p').textContent = 'adresse valide';
                formElement.querySelector('p').style.color = 'green';
                formElement.querySelector('input').style.backgroundColor = 'lightsteelblue';
                let alertDuration = 3000;
                let alertTimer = setInterval(function() {
                    alertDuration = alertDuration - 1000;
                    if (alertDuration <= 0) {
                        formElement.querySelector('p').textContent = '';
                        clearInterval(alertTimer);
                    }
                }, 1000);
            }
            
            else if (!emailRegex.test(formElement.querySelector('input').value)) {
                formElement.querySelector('p').textContent = 'email non valide';
                formElement.querySelector('p').style.color = 'red';
                formElement.querySelector('input').style.backgroundColor = 'pink';
            }
        });
        
        formElement.addEventListener('submit', (e) => {
            if ((formElement.id.includes('Email')) && (!emailRegex.test(container.querySelector('input').value))) {
                e.preventDefault();
            }
        })
    }
}