class Editor {
    
    get userId() {
        return this._userId;
    }
    
    get editionElements() {
        return this._editionElements;
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
    
    addFormDisplayTriggeringEvents() {        
        this.editionElements.forEach((dataEditionButton) => {
            dataEditionButton.addEventListener('click', (e) => {
                this.displayForm(e);
            })
        });
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
                
        if (containerId.includes('email')) {
            formInput.setAttribute('type', 'email')
        } else if (containerId.includes('password')) {
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