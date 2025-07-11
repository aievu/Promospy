//Previews change
document.getElementById('name').addEventListener('input', function(e) {
    document.getElementById('preview-name').innerText = e.target.value || 'Product name';
});

document.getElementById('image-url').addEventListener('input', function(e) {
    const imageUrl = e.target.value.trim();

    document.getElementById('preview-image').src = imageUrl || 'https://img.freepik.com/vetores-gratis/adesivo-caixa-vazia-aberta-em-fundo-branco_1308-68243.jpg?semt=ais_hybrid&w=740';
});

document.getElementById('price').addEventListener('input', function(e) {
    const value = e.target.value.replace(/\D/g, '');

    if(!value) {
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

const categoryMap = {
    '1': '<p class="label-category"><i class="fa-solid fa-mobile-screen"></i>Eletronic</p>',
    '2': '<p class="label-category"><i class="fa-solid fa-shirt"></i>Fashion</p>',
    '3': '<p class="label-category"><i class="fa-solid fa-house"></i>Home and Decoration</p>',
    '4': '<p class="label-category"><i class="fa-solid fa-face-smile-beam"></i>Beauty and Self Care</p>',
    '5': '<p class="label-category"><i class="fa-solid fa-gift"></i>Gift Card</p>',
    'default': '<p class="label-category"><i class="fa-regular fa-circle-question"></i>Category</p>'
    }

const categoryColorMap = {
    '1': 'background-color: rgba(0, 185, 209, 0.5);',
    '2': 'background-color: rgba(209, 0, 63, 0.5);',
    '3': 'background-color: rgba(0, 209, 87, 0.5);',
    '4': 'background-color: rgba(73, 0, 209, 0.5);',
    '5': 'background-color: rgba(209, 0, 0, 0.5);',
    'default': 'background-color: rgba(128, 128, 128, 0.5);'
}

document.getElementById('category').addEventListener('change', function(e) {
    const value = e.target.value;

    document.getElementById('preview-category').innerHTML = categoryMap[value] || categoryMap['default'];
    document.getElementById('preview-category').style = categoryColorMap[value] || categoryColorMap['default'];
});

document.addEventListener('DOMContentLoaded', function () {    
    // Repopulating previews in errors case
    const name = document.getElementById('name').value;
        document.getElementById('preview-name').innerText = name || 'Product name';
    const image = document.getElementById('image-url').value;
        document.getElementById('preview-image').src = image || 'https://img.freepik.com/vetores-gratis/adesivo-caixa-vazia-aberta-em-fundo-branco_1308-68243.jpg?semt=ais_hybrid&w=740';
    const previewPrice = document.getElementById('price').value;
        if(!previewPrice || previewPrice === '0.00'){
            document.getElementById('preview-price').innerText = '$ 0.00';
        } else {
            document.getElementById('preview-price').innerText = '$ ' + previewPrice;
        }
    const category = document.getElementById('category').value;
        document.getElementById('preview-category').innerHTML = categoryMap[category] || categoryMap['default'];
        document.getElementById('preview-category').style = categoryColorMap[category] || categoryColorMap['default'];

    // Repopulating price input with 0.00 if has no value
    const price = document.getElementById('price').value;
            document.getElementById('price').value = price || '0.00';
});