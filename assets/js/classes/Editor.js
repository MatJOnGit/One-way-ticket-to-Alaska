class Editor {    
    
    createFormElements(containerId) {
        const editionForm = document.createElement('form');
        editionForm.setAttribute('method', 'post');
        
        const formInput = document.createElement('input');
        formInput.setAttribute('required', 'true');
        formInput.setAttribute('name', 'new' + containerId.charAt(0).toUpperCase() + containerId.slice(1));
        
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
        editionForm.appendChild(formInput);
        editionForm.appendChild(formAlert);
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