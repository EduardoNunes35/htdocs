<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Caixa Cantina</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex h-screen">

    <!-- PRODUTOS -->
    <div class="w-2/3 p-4">
        <h1 class="text-2xl font-bold mb-4">Produtos</h1>

        <input type="text" id="busca" placeholder="Buscar produto..."
            class="w-full p-2 border rounded mb-4">

        <div id="produtos" class="grid grid-cols-3 gap-4"></div>
    </div>

    <!-- CAIXA -->
    <div class="w-1/3 bg-white p-4 shadow-lg">

        <h2 class="text-xl font-bold mb-4">Caixa</h2>

        <!-- CLIENTE -->
        <select id="cliente" class="w-full p-2 border rounded mb-4"></select>

        <!-- ITENS -->
        <div id="carrinho" class="mb-4 h-64 overflow-auto"></div>

        <!-- TOTAL -->
        <div class="border-t pt-4">
            <p>Total: R$ <span id="total">0.00</span></p>
            <p>Desconto: R$ <span id="desconto">0.00</span></p>
            <p class="font-bold text-lg">Final: R$ <span id="final">0.00</span></p>
        </div>

        <button onclick="finalizarVenda()"
            class="w-full mt-4 bg-green-500 text-white p-3 rounded">
            Finalizar Venda
        </button>

    </div>

</div>

<script>
let carrinho = [];
let produtos = [];
let clientes = [];

async function carregarDados() {
    produtos = await fetch('/api/produtos').then(r => r.json());
    clientes = await fetch('/api/clientes').then(r => r.json());

    renderProdutos(produtos);
    renderClientes();
}

function renderProdutos(lista) {
    let html = '';
    lista.forEach(p => {
        html += `
        <div class="bg-white p-3 rounded shadow cursor-pointer"
            onclick="addCarrinho(${p.id})">
            <h3>${p.nome}</h3>
            <p>R$ ${p.preco}</p>
        </div>`;
    });
    document.getElementById('produtos').innerHTML = html;
}

function renderClientes() {
    let select = document.getElementById('cliente');
    clientes.forEach(c => {
        select.innerHTML += `<option value="${c.id}">${c.nome} (${c.tipo})</option>`;
    });
}

function addCarrinho(id) {
    let produto = produtos.find(p => p.id == id);

    let item = carrinho.find(i => i.id == id);

    if(item){
        item.qtd++;
    } else {
        carrinho.push({...produto, qtd:1});
    }

    atualizarCarrinho();
}

function atualizarCarrinho() {
    let html = '';
    let total = 0;

    carrinho.forEach(i => {
        let sub = i.preco * i.qtd;
        total += sub;

        html += `
        <div class="flex justify-between border-b py-1">
            <span>${i.nome} x${i.qtd}</span>
            <span>R$ ${sub.toFixed(2)}</span>
        </div>`;
    });

    document.getElementById('carrinho').innerHTML = html;

    calcular(total);
}

function calcular(total) {
    let clienteId = document.getElementById('cliente').value;
    let cliente = clientes.find(c => c.id == clienteId);

    let desconto = 0;

    if(cliente.tipo == 'professor'){
        desconto = total * 0.05;
    } else if(cliente.tipo == 'aluno'){
        desconto = total * 0.10;
    }

    let final = total - desconto;

    document.getElementById('total').innerText = total.toFixed(2);
    document.getElementById('desconto').innerText = desconto.toFixed(2);
    document.getElementById('final').innerText = final.toFixed(2);
}

async function finalizarVenda() {

    let cliente_id = document.getElementById('cliente').value;

    let itens = carrinho.map(i => ({
        produto_id: i.id,
        quantidade: i.qtd
    }));

    let res = await fetch('/api/venda', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({cliente_id, itens})
    });

    let data = await res.json();

    alert("Venda realizada!");

    carrinho = [];
    atualizarCarrinho();
}

carregarDados();
</script>

</body>
</html>