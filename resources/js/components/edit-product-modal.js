document.getElementById('openModalBtn').addEventListener('click', function() {
    document.getElementById('editProductModal').classList.remove('hidden');
})

document.getElementById('closeModalBtn').addEventListener('click', function() {
    document.getElementById('editProductModal').classList.add('hidden');
})