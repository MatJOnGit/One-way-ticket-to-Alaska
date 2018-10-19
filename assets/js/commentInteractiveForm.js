const editCommentButtons = document.querySelectorAll('button.editCommentButton');

editCommentButtons.forEach((editCommentButton) => {
    editCommentButton.addEventListener('click', (e) => {
        let commentEditor = new CommentEditor();
        commentEditor.displayForm(e);
    });
});