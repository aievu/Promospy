//Previews change
document.getElementById('name').addEventListener('input', function(e) {
    document.getElementById('preview-name').innerText = e.target.value || 'Product name';
});

document.getElementById('image-url').addEventListener('input', function(e) {
    const imageUrl = e.target.value.trim();
    const previewImage = document.getElementById('preview-image');

    if(imageUrl) {
        previewImage.src = imageUrl;
    } else {
        previewImage.src = 'https://img.freepik.com/vetores-gratis/adesivo-caixa-vazia-aberta-em-fundo-branco_1308-68243.jpg?semt=ais_hybrid&w=740';
    }
});

document.getElementById('price').addEventListener('input', function(e) {
    const value = e.target.value.replace(/\D/g, '');

    if(!value || value === '') {
        document.getElementById('preview-price').innerText = '$ 0.00';
        document.getElementById('price').value = '0.00';
        return;
    } else {
        const formatted = (parseFloat(value) / 100).toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        const price = formatted;
        const previewPrice = '$ ' + formatted;

        document.getElementById('preview-price').innerText = previewPrice;
        document.getElementById('price').value = price;
    }
});

document.addEventListener('DOMContentLoaded', function () {    
    // Repopulating previews in errors case
    const name = document.getElementById('name').value;
        document.getElementById('preview-name').innerText = name || 'Product name';
    const image = document.getElementById('image-url').value;
        document.getElementById('preview-image').src = image || 'https://img.freepik.com/vetores-gratis/adesivo-caixa-vazia-aberta-em-fundo-branco_1308-68243.jpg?semt=ais_hybrid&w=740';
    const price = document.getElementById('price').value;
        document.getElementById('preview-price').innerText = price || '$ 0.00';

    // Repopulating price input with 0.00 if has no value
    const value = document.getElementById('price').value;
        if(!value) {
            document.getElementById('price').value = '0.00';
        }
});