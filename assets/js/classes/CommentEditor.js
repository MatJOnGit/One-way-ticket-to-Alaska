class CommentEditor extends Editor {
    
    constructor() {
        super();
        this._editionElements = document.querySelectorAll('.edit-comment-button');
    }
    
    verifyComment(formElement) {                      
        formElement.addEventListener('submit', (e) => {
            if (!formElement.parentNode.className.includes('comment')) {
                e.preventDefault();
            }
        })
    }
    
    displayForm(e) {
        const commandsContainer = this.getContainerElement(e.target);
        
        const commentWrapper = commandsContainer.parentNode.parentNode;
        const commentId = commentWrapper.id.replace('comment-','');
        const commentContainer = commentWrapper.querySelector('div.comment-speech');
        commandsContainer.parentNode.removeChild(commandsContainer);
        commentContainer.innerHTML = '';
        
        const formElement = this.createFormElements(commentContainer.parentNode.className, "comment");
        
        let chapterId = document.getElementsByTagName('h3')[0].textContent.split(':')[0].split(' ')[1];
        
        formElement.setAttribute('action', 'index.php?action=editComment&commentId=' + commentId + '&id=' + chapterId);
        
        commentContainer.appendChild(formElement);
        
        formElement.classList.add('horizontal-form');
        formElement.querySelector('.edit-info-link').classList.add('small-button');
        formElement.querySelector('.edit-info-button').classList.add('small-button');
        
        this.verifyComment(formElement);
    }
}