import http from 'http';

http.createServer( function(req, res){
    var rota = req.url;
    if ( rota=='/estados' ){
        res.end('<html><body>Estados - Informações</body></html>');
    } else if ( rota=='/municipios' ) {
        res.end('<html><body>Municipios - Informações</body></html>');
    } else {
        res.end('<html><body>Rota Principal</body></html>');
    }
}).listen(3000);
