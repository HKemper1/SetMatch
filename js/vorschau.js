const uploadLabels = document.querySelectorAll('.uploadLabel');
uploadLabels.forEach(function(uploadLabel) {
    const spielerDiv = uploadLabel.parentNode;
    spielerDiv.addEventListener('dragover', function(e) {
        e.preventDefault();
        uploadLabel.classList.add('dragover');
    });
    spielerDiv.addEventListener('dragleave', function() {
        uploadLabel.classList.remove('dragover');
    });
    spielerDiv.addEventListener('drop', function(e) {
        e.preventDefault();
        uploadLabel.classList.remove('dragover');
        const file = e.dataTransfer.files[0];
        if (file.type.match('image.*')) {
            const index = this.id.split('_').pop();
            document.getElementById('spieler_bild_' + index).files = e.dataTransfer.files;
        }
    });
});
