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
            <label for="spieler_bild_${index}">Bild:</label>
            <input type="file" id="spieler_bild_${index}" name="spieler_bild_${index}">
            <button type="button" class="deleteSpielerButton">Löschen</button>
        `;
        container.appendChild(div);
    }

    handleSpielerDelete(event) {
        if (event.target.classList.contains('deleteSpielerButton')) {
            const div = event.target.parentNode;
            div.classList.add('deleted');
            this.saveData();
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
