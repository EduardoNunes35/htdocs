export default function teste() {
    if (typeof $ === 'function') {
        console.log('jQuery está carregado! Versão:', $().jquery);
    } else {
        console.log(' Falha...jQuery não está carregado.');
    }
}
