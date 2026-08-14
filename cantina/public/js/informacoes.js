import http from 'http';

http.createServer( function(req, res){
    res.end('<html><body>Portal de Informações</body></html>');
}).listen(3000);
