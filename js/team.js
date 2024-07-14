class Spieler {
    constructor() {
        this.init();
    }

    init() {
        document.getElementById('addSpielerButton').addEventListener('click', this.addSpieler.bind(this));
        document.getElementById('spielerContainer').addEventListener('click', this.handleSpielerDelete.bind(this));
        document.querySelectorAll('input[type="text"], textarea').forEach(input => {
            input.addEventListener('input', this.handleInput.bind(this));
        });
    }

    addSpieler() {
        const container = document.getElementById('spielerContainer');
        const index = container.children.length;

        const div = document.createElement('div');
        div.className = 'spieler';

        div.innerHTML = `
                <label for="spieler_name_${index}">Name:</label>
                <input type="text" id="spieler_name_${index}" name="spieler[${index}][name]">

                <label for="spieler_bild_${index}">Bild hochladen:</label>
                <input type="file" id="spieler_bild_${index}" name="spieler_bild_${index}" accept="image/*" onchange="previewSpielerBild(event, ${index})">

                <img id="previewSpielerBild_${index}" src="" alt="Vorschau" style="max-width: 150px; display: block; margin-top: 10px;">

                <button type="button" class="deleteSpielerButton">Löschen</button>
            `;

        container.appendChild(div);
    }

    handleSpielerDelete(event) {
        if (event.target.classList.contains('deleteSpielerButton')) {
            const div = event.target.closest('.spieler');
            if (div) {
                div.remove(); // DOM-Element aus dem Container entfernen
                this.saveData();
            }
        }
    }

    handleInput(event) {
        this.saveData();
    }

    saveData() {
        console.log('Daten gespeichert!');
    }
}

new Spieler();


function previewImage(event) {
    const preview = document.getElementById('previewImage');
    preview.src = URL.createObjectURL(event.target.files[0]);
    preview.onload = function() {
        URL.revokeObjectURL(preview.src);  };
}

function previewSpielerBild(event, index) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        const previewImg = document.getElementById(`previewSpielerBild_${index}`);
        if (previewImg) {
            previewImg.src = e.target.result;
        }
    };

    if (file) {
        reader.readAsDataURL(file);
    }
}