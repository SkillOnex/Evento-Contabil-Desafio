// public/js/charts.js
window.getBarAudienceChartOptions = (chartId, data, categories) => {
    if (!Array.isArray(data)) {
        console.error('Data deve ser um array:', data);
        data = [0, 0, 0, 0];
    }
    if (!Array.isArray(categories)) {
        console.error('Categories deve ser um array:', categories);
        categories = [];
    }
    const darkMode = document.documentElement.classList.contains('dark');
    return {
        series: [{ data }],
        chart: {
            type: 'bar',
            height: 250,
            toolbar: { show: false },
            fontFamily: 'Inter, sans-serif'
        },
        plotOptions: {
            bar: {
                horizontal: true,
                borderRadius: 6,
                barHeight: '23%',
                backgroundBarColors: ['#E5E7EB'],
                backgroundBarOpacity: 1,
                backgroundBarRadius: 100
            }
        },
        colors: ['#2563EB'],
        dataLabels: {
            enabled: false,
            style: { colors: ['#fff'] },
            background: { enabled: false },
            offsetX: 0
        },
        xaxis: {
            categories,
            labels: { show: false },
            axisBorder: { show: false },
            axisTicks: { show: false }
        },
        yaxis: {
            labels: {
                style: {
                    colors: darkMode ? '#CBD5E1' : '#1E293B',
                    fontSize: '14px'
                }
            }
        },
        grid: { show: false },
        tooltip: { enabled: false }
    };
};

window.renderChart = (chartId, data, categories) => {
    if (!chartId || typeof chartId !== 'string') {
        console.error('chartId inválido:', chartId);
        return;
    }
    if (!Array.isArray(data)) {
        console.error('Data deve ser um array:', data);
        data = [0, 0, 0, 0];
    }
    if (!Array.isArray(categories)) {
        console.error('Categories deve ser um array:', categories);
        categories = [];
    }
    const chartElement = document.getElementById(chartId);
    if (!chartElement) {
        console.warn(`Elemento com ID ${chartId} não encontrado.`);
        return;
    }

    // Verifica se já existe um gráfico com o mesmo chartId
    window.apexChartsInstances = window.apexChartsInstances || [];
    let existingChartIndex = window.apexChartsInstances.findIndex(chart => chart.opts.chart.id === chartId);
    if (existingChartIndex !== -1) {
        const existingChart = window.apexChartsInstances[existingChartIndex];
        // Verifica se o elemento associado ao gráfico ainda existe no DOM
        const existingChartElement = existingChart.el;
        if (!document.body.contains(existingChartElement)) {
            console.log(`Gráfico ${chartId} encontrado, mas elemento não está mais no DOM. Destruindo e recriando.`);
            try {
                existingChart.destroy();
            } catch (err) {
                console.error('Erro ao destruir gráfico existente:', err);
            }
            // Remove o gráfico destruído do array
            window.apexChartsInstances.splice(existingChartIndex, 1);
        } else {
            console.log(`Gráfico com ID ${chartId} já existe e elemento está no DOM. Atualizando.`);
            existingChart.updateOptions(window.getBarAudienceChartOptions(chartId, data, categories));
            return;
        }
    }

    // Cria um novo gráfico
    let chart = new ApexCharts(
        chartElement,
        window.getBarAudienceChartOptions(chartId, data, categories)
    );
    chart.render();
    chart.opts.chart.id = chartId; // Define o ID para rastreamento
    window.apexChartsInstances.push(chart);
    console.log('Gráfico adicionado a apexChartsInstances:', chartId);

    document.addEventListener('dark-mode', () => {
        chart.updateOptions(window.getBarAudienceChartOptions(chartId, data, categories));
    });
};