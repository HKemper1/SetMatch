document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.spaPost-block').forEach(block => {
        const entryId = block.getAttribute('data-entry-id');
        const commentsList = block.querySelector('.comments-list');
        const newCommentTextarea = block.querySelector('.new-comment');
        const addCommentButton = block.querySelector('.add-comment');


        fetchComments(entryId, commentsList);


        addCommentButton.addEventListener('click', () => {
            const commentText = newCommentTextarea.value;
            if (commentText) {
                postComment(entryId, commentText, commentsList, newCommentTextarea);
            }
        });
    });

    function fetchComments(entryId, commentsList) {
        fetch(`php/controller/kommentar-laden.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `entry_id=${entryId}`
        })
            .then(response => response.json())
            .then(comments => {
                commentsList.innerHTML = '';
                comments.forEach(comment => {
                    const commentDiv = document.createElement('div');
                    commentDiv.classList.add('comment');
                    commentDiv.textContent = comment.comment_text;
                    commentsList.appendChild(commentDiv);
                });
            });
    }

    function postComment(entryId, commentText, commentsList, newCommentTextarea) {
        fetch('php/controller/kommentar-neu.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `entry_id=${entryId}&comment_text=${encodeURIComponent(commentText)}`
        })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    fetchComments(entryId, commentsList);
                    newCommentTextarea.value = '';
                } else {
                    alert('Kommentar konnte nicht hinzugefügt werden.');
                }
            });
    }
});
