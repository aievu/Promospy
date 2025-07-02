//Previews change
document.getElementById('name').addEventListener('input', function(e) {
    document.getElementById('preview-name').innerText = e.target.value || 'Product name';
});

document.addEventListener('DOMContentLoaded', function () {    
    // Repopulating previews in errors case
    const name = document.getElementById('name').value;
        document.getElementById('preview-name').innerText = name || 'Product name';
    const image = document.getElementById('image-url').value;
        document.getElementById('preview-image').innerText = name || 'https://img.freepik.com/vetores-gratis/adesivo-caixa-vazia-aberta-em-fundo-branco_1308-68243.jpg?semt=ais_hybrid&w=740';
    const price = document.getElementById('price').value;
        document.getElementById('preview-price').innerText = price || '$ 0.00';
});