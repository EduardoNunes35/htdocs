<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cantina - Terminal de Vendas</title>
    <!-- Usaremos Tailwind CSS via CDN para estilizar rápido e com visual moderno -->
    <script src="https://tailwindcss.com"></script>
    <!-- Ícones Lucide para os botões -->
    <script src="https://unpkg.com"></script>
</head>
<body class="bg-gray-100 h-screen flex flex-col overflow-hidden">

    <!-- CABEÇALHO DO TERMINAL -->
    <header class="bg-blue-600 text-white p-4 shadow-md flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <i data-lucide="store" class="w-6 h-6"></i>
            <h1 class="text-xl font-bold">Cantina - Caixa Aberto</h1>
        </div>
        <div class="text-sm">
            <span>Operador: Root</span> | <span>Data: <?php echo date('d/m/Y'); ?></span>
        </div>
    </header>

    <!-- ÁREA PRINCIPAL DO PDV -->
    <main class="flex-1 flex overflow-hidden">
        
        <!-- LADO ESQUERDO: GRADE DE PRODUTOS -->
        <section class="w-2/3 p-4 overflow-y-auto grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 bg-gray-50">
            
            <!-- Simulando a inserção de produtos vindos do banco de dados com PHP -->
            <?php
            // Exemplo de array simulando o que viria do seu Model de Produto
            $produtos = [
                ['id' => 1, 'nome' => 'Coxinha', 'preco' => 5.00, 'estoque' => 15, 'cor' => 'bg-orange-100 text-orange-700 border-orange-300'],
                ['id' => 2, 'nome' => 'Empada de Frango', 'preco' => 6.50, 'estoque' => 10, 'cor' => 'bg-yellow-100 text-yellow-700 border-yellow-300'],
                ['id' => 3, 'nome' => 'Refrigerante Lata', 'preco' => 5.50, 'estoque' => 30, 'cor' => 'bg-red-100 text-red-700 border-red-300'],
                ['id' => 4, 'nome' => 'Suco Natural', 'preco' => 7.00, 'estoque' => 20, 'cor' => 'bg-green-100 text-green-700 border-green-300'],
                ['id' => 5, 'nome' => 'Bolo de Pote', 'preco' => 8.50, 'estoque' => 8, 'cor' => 'bg-pink-100 text-pink-700 border-pink-300'],
                ['id' => 6, 'nome' => 'Pão de Queijo', 'preco' => 3.50, 'estoque' => 25, 'cor' => 'bg-yellow-50 text-yellow-800 border-yellow-200']
            ];

            foreach ($produtos as $p):
            ?>
                <!-- Card de Produto Estilo PDV -->
                <button onclick="adicionarAoCarrinho(<?php echo $p['id']; ?>, '<?php echo $p['nome']; ?>', <?php echo $p['preco']; ?>)" 
                        class="border rounded-xl p-4 flex flex-col items-center justify-between text-center transition-all shadow-sm hover:shadow-md hover:scale-105 active:scale-95 h-36 <?php echo $p['cor']; ?>">
                    <div>
                        <span class="font-bold text-lg block"><?php echo $p['nome']; ?></span>
                        <span class="text-xs opacity-75">Estoque: <?php echo $p['estoque']; ?></span>
                    </div>
                    <span class="font-bold text-xl mt-2">R$ <?php echo number_format($p['preco'], 2, ',', '.'); ?></span>
                </button>
            <?php endforeach; ?>

        </section>

        <!-- LADO DIREITO: CARRINHO E TOTALIZADOR -->
        <section class="w-1/3 bg-white border-l border-gray-200 flex flex-col justify-between">
            
            <!-- LISTA DE ITENS NO CARRINHO -->
            <div class="p-4 flex-1 overflow-y-auto">
                <div class="flex items-center space-x-2 border-b pb-2 mb-4">
                    <i data-lucide="shopping-cart" class="text-gray-500"></i>
                    <h2 class="text-lg font-semibold text-gray-700">Comanda Atual</h2>
                </div>
                
                <!-- Div onde o JavaScript vai renderizar os itens -->
                <div id="carrinho-itens" class="space-y-3">
                    <!-- Mensagem quando vazio -->
                    <p id="carrinho-vazio" class="text-gray-400 text-center py-10">Nenhum item selecionado</p>
                </div>
            </div>

            <!-- PAINEL DE TOTAIS E FINALIZAÇÃO -->
            <div class="border-t border-gray-200 p-4 bg-gray-50">
                <div class="flex justify-between items-center text-gray-600 mb-1">
                    <span>Subtotal:</span>
                    <span id="subtotal">R$ 0,00</span>
                </div>
                <div class="flex justify-between items-center text-gray-600 mb-2">
                    <span>Desconto:</span>
                    <span class="text-green-600">- R$ 0,00</span>
                </div>
                <div class="flex justify-between items-center text-2xl font-bold text-gray-800 mb-4">
                    <span>Total:</span>
                    <span id="total-venda" class="text-blue-600">R$ 0,00</span>
                </div>

                <!-- BOTÕES DE AÇÃO -->
                <div class="grid grid-cols-2 gap-2">
                    <button onclick="limparCarrinho()" class="bg-gray-500 hover:bg-gray-600 text-white py-3 rounded-lg font-semibold flex justify-center items-center space-x-1">
                        <i data-lucide="trash-2" class="w-5 h-5"></i>
                        <span>Cancelar</span>
                    </button>
                    <button onclick="finalizarVenda()" class="bg-green-600 hover:bg-green-700 text-white py-3 rounded-lg font-semibold flex justify-center items-center space-x-1">
                        <i data-lucide="check-circle" class="w-5 h-5"></i>
                        <span>Pagar (F10)</span>
                    </button>
                </div>
            </div>
        </section>
    </main>

    <!-- JAVASCRIPT DO TERMINAL -->
    <script>
        // Inicializa os ícones do Lucide
        lucide.createIcons();

        // Variável de estado do carrinho
        let carrinho = [];

        function adicionarAoCarrinho(id, nome, preco) {
            // Verifica se o item já está no carrinho
            const itemExistente = carrinho.find(item => item.id === id);

            if (itemExistente) {
                itemExistente.quantidade++;
            } else {
                carrinho.push({ id, nome, preco, quantidade: 1 });
            }
            renderizarCarrinho();
        }

        function alterarQuantidade(id, operacao) {
            const item = carrinho.find(item => item.id === id);
            if (item) {
                if (operacao === 'somar') item.quantidade++;
                if (operacao === 'subtrair') item.quantidade--;
                
                // Se a quantidade zerar, remove do carrinho
                if (item.quantidade <= 0) {
                    carrinho = carrinho.filter(item => item.id !== id);
                }
            }
            renderizarCarrinho();
        }

        function limparCarrinho() {
            if(confirm("Deseja realmente cancelar esta comanda?")) {
                carrinho = [];
                renderizarCarrinho();
            }
        }

        function renderizarCarrinho() {
            const container = document.getElementById('carrinho-itens');
            const txtVazio = document.getElementById('carrinho-vazio');
            
            container.innerHTML = '';
            
            if (carrinho.length === 0) {
                container.appendChild(txtVazio);
                document.getElementById('subtotal').innerText = 'R$ 0,00';
                document.getElementById('total-venda').innerText = 'R$ 0,00';
                return;
            }

            let total = 0;

            carrinho.forEach(item => {
                const subTotalItem = item.preco * item.quantidade;
                total += subTotalItem;

                const div = document.createElement('div');
                div.className = "flex justify-between items-center bg-white p-3 rounded-lg shadow-sm border";
                div.innerHTML = `
                    <div class="flex-1">
                        <h4 class="font-semibold text-gray-700">${item.nome}</h4>
                        <span class="text-sm text-gray-500">R$ ${item.preco.toFixed(2).replace('.', ',')} un.</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="flex items-center border rounded-lg">
                            <button onclick="alterarQuantidade(${item.id}, 'subtrair')" class="px-2 py-1 bg-gray-100 hover:bg-gray-200 font-bold">-</button>
                            <span class="px-3 py-1 font-semibold">${item.quantidade}</span>
                            <button onclick="alterarQuantidade(${item.id}, 'somar')" class="px-2 py-1 bg-gray-100 hover:bg-gray-200 font-bold">+</button>
                        </div>
                        <span class="font-bold text-gray-700 w-16 text-right">R$ ${subTotalItem.toFixed(2).replace('.', ',')}</span>
                    </div>
                `;
                container.appendChild(div);
            });

            document.getElementById('subtotal').innerText = `R$ ${total.toFixed(2).replace('.', ',')}`;
            document.getElementById('total-venda').innerText = `R$ ${total.toFixed(2).replace('.', ',')}`;
        }

        function finalizarVenda() {
            if(carrinho.length === 0) {
                alert("Adicione pelo menos um item para finalizar a venda!");
                return;
            }
            alert("Venda registrada com sucesso! (Aqui você integraria com o Back-end para atualizar o estoque e salvar a venda)");
            carrinho = [];
            renderizarCarrinho();
        }

        // Atalho de teclado opcional
        document.addEventListener('keydown', function(e) {
            if(e.key === 'F10') {
                e.preventDefault();
                finalizarVenda();
            }
        });
    </script>
</body>
</html>