<!-- Exemplo de Input no seu arquivo .blade.php -->
<input type="date" id="data_nascimento" class="form-control">
<button onclick="verificarIdade()">Verificar Idade</button>
<div id="resultado"></div>

<br><br>
<button onclick="iniciarContador()">Iniciar Contagem</button>
<div id="contando"></div>

<script>
    function verificarIdade() {
        const inputData = document.getElementById('data_nascimento').value;
        const resultadoDiv = document.getElementById('resultado');

        if (!inputData) {
            resultadoDiv.innerText = "Por favor, selecione uma data.";
            return;
        }

        const hoje = new Date();
        const nascimento = new Date(inputData);
        
        // Cálculo básico da idade
        let idade = hoje.getFullYear() - nascimento.getFullYear();
        const mes = hoje.getMonth() - nascimento.getMonth();

        // Ajusta se o aniversário ainda não ocorreu no ano corrente
        if (mes < 0 || (mes === 0 && hoje.getDate() < nascimento.getDate())) {
            idade--;
        }

        // Lógica de verificação
        if (idade >= 18) {
            resultadoDiv.innerHTML = `<span style="color: green;">Maior de 18 anos (${idade} anos). Acesso liberado.</span>`;
        } else {
            resultadoDiv.innerHTML = `<span style="color: red;">Menor de 18 anos (${idade} anos). Acesso restrito.</span>`;
        }
    }
//Função de contagem:
    function iniciarContador(){
        let contador = 25;
        const tela= document.getElementById("contando");

        tela.innerHTML= "";

        while(contador>0){
            tela.innerHTML+="Contando..."+ contador + "<br>";
            contador--;
        }
        innerHTML+= "<strong>Contou...</strong>";
    }
</script>
