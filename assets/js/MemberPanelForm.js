class MemberPanelEditor {
    
    createFormElements(containerId) {
        let editionForm = document.createElement('form');
        editionForm.setAttribute('method', 'post');
        editionForm.setAttribute('action', 'index.php?action=editMemberParam&updatedParam=' + containerId);
        
        let formInput = document.createElement('input');
        formInput.setAttribute('type', 'text');
        formInput.setAttribute('name', 'new' + containerId.charAt(0).toUpperCase() + containerId.slice(1));
        
        let buttonsContainer = document.createElement('div');
        buttonsContainer.style.display = 'flex';
        buttonsContainer.style.flexDirection = 'row';
        buttonsContainer.style.justifyContent = 'flex-end';
        buttonsContainer.style.marginTop = '10px';
        
        let cancelButton = document.createElement('a');
        cancelButton.href = '';
        cancelButton.classList.add('edit-info-link', 'blue-button');
        cancelButton.innerHTML = '<i class="fas fa-times white-item"></i>';
        
        let submitButton = document.createElement('button');
        submitButton.classList.add('edit-info-button', 'blue-button');
        submitButton.style.marginLeft = '10px';
        submitButton.setAttribute('type', 'submit');
        submitButton.innerHTML = '<i class="fas fa-check white-item"></i>';
        
        buttonsContainer.appendChild(cancelButton);
        buttonsContainer.appendChild(submitButton);
        editionForm.appendChild(formInput);
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
    }
}