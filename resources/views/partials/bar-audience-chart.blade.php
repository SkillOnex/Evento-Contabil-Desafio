@php
    $chartId = isset($chartId) ? $chartId : 'default-chart-' . uniqid();
    $data = isset($data) && is_array($data) ? $data : [0, 0, 0, 0];
    $categories = isset($categories) && is_array($categories) ? $categories : [];
    $title = isset($title) ? $title : 'Gráfico de Barras Horizontal';

    Log::info('Incluindo bar-audience-chart:', [
        'chartId' => $chartId,
        'data' => $data,
        'categories' => $categories,
        'title' => $title,
        'timestamp' => now()
    ]);
@endphp

<div class="col-span-1 lg:col-span-1 p-6 bg-white rounded-lg shadow dark:bg-gray-800">
    <div class="w-full">
        <h3 class="mb-2 text-base font-normal text-gray-500 dark:text-gray-400">
            {{ $title }}
        </h3>
    </div>
    <div id="{{ $chartId }}"></div>
</div>

<script>
    // Usa uma variável global para rastrear se o gráfico foi renderizado
    window.renderedCharts = window.renderedCharts || {};
    if (!window.renderedCharts['{{ $chartId }}']) {
        try {
            window.renderChart(
                '{{ $chartId }}',
                @json($data),
                @json($categories)
            );
            window.renderedCharts['{{ $chartId }}'] = true;
            console.log('Gráfico renderizado:', '{{ $chartId }}');
        } catch (e) {
            console.error('Erro ao renderizar o gráfico:', e);
        }
    } else {
        console.log('Gráfico {{ $chartId }} já foi renderizado nesta carga, ignorando.');
    }
</script>