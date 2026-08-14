<?php
// Configurações de Conexão (Mantendo seu padrão)
$host = '127.0.0.1';
$db   = 'cantinaidh3b';
$user = 'root';
$pass = 'Pk2k3@noslimde'; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmtProd = $pdo->query("SELECT id, nome, preco, estoque FROM produtos WHERE ativo = 1");
    $produtos = $stmtProd->fetchAll(PDO::FETCH_ASSOC);

    $stmtCli = $pdo->query("SELECT id, nome, desconto FROM clientes");
    $clientes = $stmtCli->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cantina PDV - Sistema de Vendas</title>
    <script src="https://tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        /* Scrollbar personalizada para manter o estilo moderno */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        .product-grid { grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); }
    </style>
</head>
<body class="bg-slate-100 h-screen flex flex-col font-sans text-slate-900 overflow-hidden">

    <header class="bg-white border-b border-slate-200 px-6 py-3 flex justify-between items-center shadow-sm">
        <div class="flex items-center gap-3">
            <div class="bg-blue-600 p-2 rounded-lg">
                <i data-lucide="shopping-cart" class="text-white w-6 h-6"></i>
            </div>
            <div>
                <h1 class="text-lg font-bold leading-none">Cantina Digital</h1>
                <span class="text-xs text-slate-500 font-medium uppercase tracking-wider">Terminal de Vendas</span>
            </div>
        </div>
        
        <div class="flex items-center gap-6">
            <div class="text-right hidden sm:block">
                <p class="text-xs text-slate-400 uppercase font-bold">Data de Operação</p>
                <p class="text-sm font-semibold text-slate-700"><?php echo date('d/m/Y'); ?></p>
            </div>
            <div class="h-10 w-px bg-slate-200"></div>
            <button class="bg-slate-50 p-2 rounded-full hover:bg-slate-100 text-slate-600 transition">
                <i data-lucide="user" class="w-5 h-5"></i>
            </button>
        </div>
    </header>

    <main class="flex-1 flex overflow-hidden">
        <section class="w-full lg:w-2/3 p-6 overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                    <i data-lucide="layout-grid" class="w-5 h-5 text-blue-500"></i> 
                    Produtos Disponíveis
                </h2>
                <div class="relative w-64">
                    <input type="text" placeholder="Buscar produto..." class="w-full pl-10 pr-4 py-2 border border-slate-200 rounded-full text-sm focus:ring-2 focus:ring-blue-500 outline-none transition">
                    <i data-lucide="search" class="absolute left-3 top-2.5 w-4 h-4 text-slate-400"></i>
                </div>
            </div>

            <div class="grid product-grid gap-4">
                <?php foreach ($produtos as $p): ?>
                <button onclick="adicionarAoCarrinho(<?php echo $p['id']; ?>, '<?php echo $p['nome']; ?>', <?php echo $p['preco']; ?>)" 
                        class="group bg-white border border-slate-200 rounded-2xl p-4 flex flex-col items-center text-center transition-all hover:border-blue-400 hover:shadow-xl hover:-translate-y-1 active:scale-95">
                    <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mb-3 group-hover:bg-blue-100 transition">
                        <i data-lucide="package" class="w-8 h-8 text-blue-600"></i>
                    </div>
                    <span class="font-bold text-slate-700 text-sm mb-1"><?php echo $p['nome']; ?></span>
                    <span class="text-[10px] bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full mb-3 uppercase font-bold tracking-tighter">
                        Estoque: <?php echo $p['estoque']; ?>
                    </span>
                    <div class="text-blue-700 font-black text-lg">
                        R$ <?php echo number_format($p['preco'], 2, ',', '.'); ?>
                    </div>
                </button>
                <?php endforeach; ?>
            </div>
        </section>

        <aside class="hidden lg:flex w-1/3 bg-white border-l border-slate-200 flex-col shadow-2xl">
            <div class="p-5 border-b border-slate-100">
                <div class="bg-slate-50 p-4 rounded-xl border border-slate-200">
                    <label class="text-[10px] font-black text-slate-400 uppercase mb-2 block">Identificar Cliente</label>
                    <div class="flex gap-2">
                        <select id="cliente_id" onchange="atualizarDesconto()" class="flex-1 bg-transparent border-none text-slate-700 font-bold focus:ring-0 cursor-pointer">
                            <?php foreach($clientes as $c): ?>
                                <option value="<?php echo $c['id']; ?>" data-desconto="<?php echo $c['desconto']; ?>">
                                    <?php echo $c['nome']; ?> (<?php echo (int)$c['desconto']; ?>% OFF)
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400"></i>
                    </div>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto px-5 py-4">
                <div class="flex items-center gap-2 mb-4">
                    <i data-lucide="list" class="w-4 h-4 text-slate-400"></i>
                    <h3 class="font-bold text-slate-600 uppercase text-xs tracking-widest">Itens da Venda</h3>
                </div>
                <div id="carrinho-itens" class="space-y-4">
                    <div id="carrinho-vazio" class="flex flex-col items-center justify-center py-20 text-slate-300">
                        <i data-lucide="shopping-bag" class="w-12 h-12 mb-2 opacity-20"></i>
                        <p class="text-sm font-medium">Nenhum item selecionado</p>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-slate-50 border-t border-slate-200">
                <div class="space-y-2 mb-6">
                    <div class="flex justify-between text-slate-500 text-sm">
                        <span>Subtotal</span>
                        <span id="subtotal" class="font-semibold">R$ 0,00</span>
                    </div>
                    <div class="flex justify-between text-emerald-600 text-sm bg-emerald-50 px-2 py-1 rounded">
                        <span>Desconto Fidelidade</span>
                        <span id="txt-desconto" class="font-bold">- R$ 0,00</span>
                    </div>
                    <div class="pt-2 mt-2 border-t border-slate-200 flex justify-between items-end">
                        <span class="text-slate-800 font-bold text-lg">Total</span>
                        <span id="total-venda" class="text-blue-700 font-black text-3xl tracking-tighter">R$ 0,00</span>
                    </div>
                </div>

                <div class="grid grid-cols-5 gap-2">
                    <button onclick="limparCarrinho()" class="col-span-1 bg-white border border-slate-200 text-slate-400 p-3 rounded-xl hover:bg-red-50 hover:text-red-500 transition">
                        <i data-lucide="trash-2" class="w-6 h-6 mx-auto"></i>
                    </button>
                    <button onclick="finalizarVenda()" class="col-span-4 bg-blue-600 text-white py-4 rounded-xl font-black text-lg shadow-lg shadow-blue-200 hover:bg-blue-700 active:scale-[0.98] transition-all flex justify-center items-center gap-2">
                        FINALIZAR (F10)
                        <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>
        </aside>
    </main>

    <script>
        lucide.createIcons();
        let carrinho = [];
        let percDesconto = 0;

        function atualizarDesconto() {
            const select = document.getElementById('cliente_id');
            percDesconto = parseFloat(select.options[select.selectedIndex].getAttribute('data-desconto')) || 0;
            renderizarCarrinho();
        }

        function adicionarAoCarrinho(id, nome, preco) {
            const item = carrinho.find(i => i.id === id);
            if (item) {
                item.quantidade++;
            } else {
                carrinho.push({ id, nome, preco, quantidade: 1 });
            }
            renderizarCarrinho();
        }

        function alterarQuantidade(id, delta) {
            const index = carrinho.findIndex(i => i.id === id);
            if (index !== -1) {
                carrinho[index].quantidade += delta;
                if (carrinho[index].quantidade <= 0) carrinho.splice(index, 1);
            }
            renderizarCarrinho();
        }

        function renderizarCarrinho() {
            const container = document.getElementById('carrinho-itens');
            container.innerHTML = '';
            
            if (carrinho.length === 0) {
                container.innerHTML = `
                    <div class="flex flex-col items-center justify-center py-20 text-slate-300">
                        <i data-lucide="shopping-bag" class="w-12 h-12 mb-2 opacity-20"></i>
                        <p class="text-sm font-medium">Nenhum item selecionado</p>
                    </div>`;
                document.getElementById('subtotal').innerText = 'R$ 0,00';
                document.getElementById('txt-desconto').innerText = '- R$ 0,00';
                document.getElementById('total-venda').innerText = 'R$ 0,00';
                lucide.createIcons();
                return;
            }

            let bruto = 0;
            carrinho.forEach(item => {
                const totalItem = item.preco * item.quantidade;
                bruto += totalItem;
                container.innerHTML += `
                    <div class="bg-white border border-slate-100 p-3 rounded-xl shadow-sm flex justify-between items-center animate-in fade-in slide-in-from-right-4 duration-200">
                        <div class="flex-1">
                            <p class="font-bold text-slate-800 text-sm">${item.nome}</p>
                            <p class="text-xs text-slate-400 font-medium">R$ ${item.preco.toFixed(2)} / un</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="flex items-center bg-slate-100 rounded-lg p-1">
                                <button onclick="alterarQuantidade(${item.id}, -1)" class="w-6 h-6 flex items-center justify-center hover:bg-white rounded transition text-slate-500">-</button>
                                <span class="w-8 text-center font-bold text-sm">${item.quantidade}</span>
                                <button onclick="alterarQuantidade(${item.id}, 1)" class="w-6 h-6 flex items-center justify-center hover:bg-white rounded transition text-slate-500">+</button>
                            </div>
                            <span class="font-black text-slate-700 text-sm min-w-[70px] text-right">R$ ${totalItem.toFixed(2)}</span>
                        </div>
                    </div>`;
            });

            const desconto = bruto * (percDesconto / 100);
            const liquido = bruto - desconto;

            document.getElementById('subtotal').innerText = `R$ ${bruto.toLocaleString('pt-BR', {minimumFractionDigits: 2})}`;
            document.getElementById('txt-desconto').innerText = `- R$ ${desconto.toLocaleString('pt-BR', {minimumFractionDigits: 2})}`;
            document.getElementById('total-venda').innerText = `R$ ${liquido.toLocaleString('pt-BR', {minimumFractionDigits: 2})}`;
        }

        function limparCarrinho() {
            if(confirm("Deseja cancelar esta venda?")) {
                carrinho = [];
                renderizarCarrinho();
            }
        }

        function finalizarVenda() {
            if (carrinho.length === 0) return alert("Adicione pelo menos um produto para vender!");
            
            // Aqui entraria sua chamada AJAX/Fetch para o Controller PHP
            const payload = {
                cliente_id: document.getElementById('cliente_id').value,
                total: document.getElementById('total-venda').innerText,
                itens: carrinho
            };

            console.log("Processando Venda...", payload);
            alert("Venda Finalizada! O Banco de dados foi atualizado via Trigger.");
            carrinho = [];
            renderizarCarrinho();
        }

        // Atalhos de Teclado
        window.addEventListener('keydown', (e) => {
            if (e.key === 'F10') {
                e.preventDefault();
                finalizarVenda();
            }
        });

        window.onload = atualizarDesconto;
    </script>
</body>
</html>