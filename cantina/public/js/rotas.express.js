import express from 'express';
const app    = express();       //rotas definidas no arquivo de rotas serão acessíveis a partir da raiz do seu aplicativo (por exemplo, http://localhost:3000/alguma-rota).
const PORT = process.env.PORT || 3000;
//app.use('/', routes);
app.set('view engine', 'ejs');

app.get('/', function(req, res){
    //res.send('<html><body>Portal Servidor com Express</body></html>');
    res.send('<html><body>Portal Servidor com Express - Raiz</body></html>');
});
app.get('/estados', function(req, res){
    res.send('estados/estados');
});
app.get('/municipios', function(req, res){
    res.send('municipios/municipios');
});
app.get('/cep', function(req, res){
    res.send('cep/cep');
});
/* ---------------- Inicie o servidor */
app.listen(PORT, function(){
    console.log('servidor Rodando com Express na porta '+PORT);
});
