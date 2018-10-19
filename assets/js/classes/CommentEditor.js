class CommentEditor extends Editor {
    
    commentTesting(formElement) {
        formElement.addEventListener('submit', (e) => {
            if ((!formElement.parentNode.className.includes('comment')) || (formElement.querySelector('input').value.trim() == 0)) {
                e.preventDefault();
            }
        })
    }
    
    displayForm(e) {
        const commandsContainer = this.getContainerElement(e.target);
        const commentWrapper = commandsContainer.parentNode.parentNode;
        const commentId = commentWrapper.id.replace('comment-','');
        const commentContainer = commentWrapper.querySelector('div.commentSpeech');
        
        commandsContainer.parentNode.removeChild(commandsContainer);
        commentContainer.innerHTML = '';
        
        const formElement = this.createFormElements(commentContainer.parentNode.className);
        
        let chapterId = document.getElementsByTagName('h3')[0].textContent.split(':')[0].split(' ')[1];
        
        formElement.setAttribute('action', 'index.php?action=editComment&commentId=' + commentId + '&id=' + chapterId); 
        commentContainer.appendChild(formElement);
        formElement.style.flexDirection = 'row';
        formElement.style.justifyContent = 'space-between';
        
        formElement.querySelector('a.editInfoLink').parentNode.classList.add('smallButtonsContainer');
        
        formElement.querySelector('a.editInfoLink').classList.add('small');
        formElement.querySelector('button.editInfoButton').classList.add('small');
        
        this.commentTesting(formElement);
    }
}