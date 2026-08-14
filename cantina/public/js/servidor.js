/*Importação do Express e das Rotas:
No entanto, a importação das rotas está incorreta. Você usou import routes from 'routes';
, mas é necessário especificar o caminho relativo para o arquivo de rotas. Por exemplo,
se o arquivo de rotas estiver na mesma pasta, você pode usar import routes from './routes';.
Configuração das Rotas:
O uso de app.use('/', routes); indica que todas as rotas definidas no arquivo de rotas serão
acessíveis a partir da raiz do seu aplicativo (por exemplo, http://localhost:3000/alguma-rota).
Iniciar o Servidor:
Você definiu a porta como 3000 ou a porta especificada no ambiente (process.env.PORT).
 ------------------------ rotas NodeJS ------------------------ */
import express from 'express';
import routes from 'routes';
const app    = express();       //rotas definidas no arquivo de rotas serão acessíveis a partir da raiz do seu aplicativo (por exemplo, http://localhost:3000/alguma-rota).

//const routes = require('./routes'); // Caminho para o arquivo de rotas

app.use('/', routes);

/* ---------------- Inicie o servidor */
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Servidor NodeJS rodando na porta ${PORT}`);
});
