<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<h1>Relatório de Vendas</h1>

<canvas id="grafico"></canvas>

<script>
let labels = @json($dados->pluck('data'));
let dados = @json($dados->pluck('total'));

new Chart(document.getElementById('grafico'), {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Faturamento',
            data: dados
        }]
    }
});
</script>

</body>
</html>