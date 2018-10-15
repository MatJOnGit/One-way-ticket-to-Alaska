const editCommentButtons = document.querySelectorAll('button.edit-comment-button');

editCommentButtons.forEach((editCommentButton) => {
    editCommentButton.addEventListener('click', (e) => {
        let commentEditor = new CommentEditor();
        commentEditor.displayForm(e);
    });
});