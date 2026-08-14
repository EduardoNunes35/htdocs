<!-- resources/views/components/teste-banco.blade.php -->
<div x-data="verificaBanco()" x-init="testar()" class="mb-4 text-center">
    <template x-if="!carregando && !sucesso">
        <div class="text-red-600 text-sm">
            ❌ <span x-text="mensagem"></span>
            <p class="text-xs text-gray-500 mt-1" x-text="detalhes"></p>
        </div>
    </template>
</div>

<script>
    function verificaBanco() {
        return {
            carregando: true,
            sucesso: false,
            mensagem: '',
            detalhes: '',
            testar() {
                this.carregando = true;
                this.mensagem = '';
                this.detalhes = '';

                fetch('status_banco')
                    .then(response => response.json())
                    .then(data => {
                        this.carregando = false;
                        this.sucesso = data.success;
                        this.mensagem = data.success ? '' : data.erro;
                        this.detalhes = data.detalhes || '';
                    })
                    .catch(error => {
                        this.carregando = false;
                        this.sucesso = false;
                        this.mensagem = 'Erro inesperado ao tentar conectar.';
                        this.detalhes = error.message;
                    });
            }
        }
    }
</script>