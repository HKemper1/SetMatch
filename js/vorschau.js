function previewSpielerBild(event, index) {
    const input = event.target;
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewSpielerBild_' + index).src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

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
            previewSpielerBild(e, index);
        }
    });
});