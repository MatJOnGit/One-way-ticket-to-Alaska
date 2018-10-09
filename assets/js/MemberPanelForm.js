class MemberPanelEditor {
    
    createFormElements(containerId) {
        let editionForm = document.createElement('form');
        let formInput = document.createElement('input');
        
        let buttonsContainer = document.createElement('div');
        buttonsContainer.style.display = 'flex';
        buttonsContainer.style.flexDirection = 'row';
        buttonsContainer.style.justifyContent = 'flex-end';
        buttonsContainer.style.marginTop = '10px';
        
        let cancelButton = document.createElement('a');
        cancelButton.href = '';
        cancelButton.classList.add('edit-info-link','blue-button');
        cancelButton.innerHTML = '<i class="fas fa-times white-item"></i>';
        
        let submitButton = document.createElement('a');
        submitButton.href = 'index.php?action=editMemberParam&updatedParam=' + containerId;
        submitButton.classList.add('edit-info-link','blue-button');
        submitButton.style.marginLeft = '10px';
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