<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Dashboard Cantina</title>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100 p-6">

<h1 class="text-3xl font-bold mb-6">Dashboard</h1>

<div class="grid grid-cols-3 gap-4">

    <div class="bg-white p-4 rounded shadow">
        <h2>Total Hoje</h2>
        <p class="text-2xl font-bold text-green-600">
            R$ {{ number_format($totalHoje,2,',','.') }}
        </p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h2>Vendas Hoje</h2>
        <p class="text-2xl font-bold">
            {{ $qtdVendas }}
        </p>
    </div>

</div>

<div class="bg-white p-4 mt-6 rounded shadow">
    <h2 class="mb-4 font-bold">Produtos Mais Vendidos</h2>
    <canvas id="grafico"></canvas>
</div>

<script>
let labels = @json($produtosMaisVendidos->pluck('nome'));
let dados = @json($produtosMaisVendidos->pluck('total'));

new Chart(document.getElementById('grafico'), {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Quantidade vendida',
            data: dados
        }]
    }
});
</script>

</body>
</html>