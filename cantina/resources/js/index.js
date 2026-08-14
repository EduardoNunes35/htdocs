import $ from 'jquery';
global.$ = global.jQuery = $;

import puppeteer from 'puppeteer';

    (async () => {
        try {
        const browser = await puppeteer.launch({ headless: false });
        const page = await browser.newPage();
        await page.goto('https://example.com'); // Substitua pela URL desejada
        await page.screenshot({ path: '../../public/imgs/dados.recebidos/example.png' });
        console.log('Bem vindo ...baixou imagem!');
        await browser.close();
        } catch (error) {
            console.error(`Erro encontrado: ${error}`);
        }
    }) ();
