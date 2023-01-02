function visualizePassword(event) {
    const bx = event.currentTarget;
    const input = bx.parentElement.querySelector('.form-input');
    if (input.type === 'password') {
        input.type = 'text';
        bx.classList = 'bx bx-show bxf bxp';
    } else if (input.type === 'text') {
        input.type = 'password';
        bx.classList = 'bx bx-hide bxf bxp';
    }
}

function cancelComment(event) {
    event.currentTarget.parentElement.parentElement.querySelector('.comment-textarea').value = '';
    enableCommentButton(event);
}

function enableCommentButton(event) {
    const commentButtons = event.currentTarget.parentElement.querySelectorAll('.comment-button');
    const commentText = event.currentTarget.value;

    commentButtons.forEach(commentButton => {
        if (commentText.length > 0) {
            commentButton.removeAttribute('disabled');
        } else {
            commentButton.setAttribute('disabled', '');
        }
    });
}

function closeToast() {
    document.getElementById("toast").remove();
}