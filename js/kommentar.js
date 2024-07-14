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
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(comments => {
                commentsList.innerHTML = '';
                if (comments.length === 0) {
                    commentsList.innerHTML = '<p>Keine Kommentare vorhanden.</p>';
                } else {
                    comments.forEach(comment => {
                        const commentDiv = document.createElement('div');
                        commentDiv.classList.add('comment');
                        commentDiv.textContent = comment.comment_text;
                        commentsList.appendChild(commentDiv);
                    });
                }
            })
            .catch(error => {
                console.error('Error fetching comments:', error);
                commentsList.innerHTML = '<p>Es ist ein Fehler aufgetreten. Bitte versuchen Sie es später erneut.</p>';
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