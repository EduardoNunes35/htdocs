export default
    function busca_municipios() {
        var estado = $('#estado').val();  /* codigo do estado escolhido se encontrou o estado */
        if(estado){
           alert('Dados carregando...')
          var url = 'municipios/buscar_cidades.php?estado='+estado;  /* caminho do arquivo php que ir� buscar o municipios no BD */
          $.get(url, function(retorno) {
            $('#municipio').removeAttr('disabled');
            $('#municipio').html(retorno);  //coloca o retorno da requisicao
          });
        }
    }
    function busca_estados() {
        var estado = $('#estado').val();
        alert(estado);
    }
