document.addEventListener('DOMContentLoaded', function () {

    const maskInput = (selector, maskFunction) => {
        document.querySelectorAll(selector).forEach(el => {
            el.addEventListener('input', e => {
                e.target.value = maskFunction(e.target.value);
            });
        });
    };

    const cpfMask = value => {
        return value
            .replace(/\D/g, '')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    };

    const cnpjMask = value => {
        return value
            .replace(/\D/g, '')
            .replace(/(\d{2})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d)/, '$1/$2')
            .replace(/(\d{4})(\d{1,2})$/, '$1-$2');
    };

    const maskRg = value => {
        return value
            .replace(/\D/g, '')
            .replace(/(\d{2})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d{1})$/, '$1-$2');
    };

    const maskNis = value => {
        return value
            .replace(/\D/g, '')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d{2})$/, '$1-$2');
    };

    // Aplicar as máscaras nos inputs
    maskInput('.mask-cpf', cpfMask);
    maskInput('.mask-cnpj', cnpjMask);
    maskInput('.mask-rg', maskRg);
    maskInput('.mask-nis', maskNis);

});
