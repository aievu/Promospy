document.addEventListener('DOMContentLoaded', function () {
    // Repopulating price input with 0.00 if has no value
    const price = document.querySelectorAll('.price-input');
    
    price.forEach(input => {
        const value = input.value.replace(/\D/g, '');

        if (!value) {
                e.target.value = '0.00';
                return;
            }

        const formatted = (parseFloat(value) / 100).toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        
        input.value = formatted;

        input.addEventListener('input', function (e) {
            const value = e.target.value.replace(/\D/g, '');

            if (!value) {
                e.target.value = '0.00';
                return;
            }

            const formatted = (parseFloat(value) / 100).toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            e.target.value = formatted;
        })
    })
});