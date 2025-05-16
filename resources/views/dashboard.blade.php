
    <div class="flex-1 min-h-screen ">




        <div class="p-4 sm:ml-64">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 sm:mt-14">
                <!-- Gráfico 1: ocupa 2 colunas -->
                <div class="lg:col-span-3 bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">
                    <h5 class="text-3xl font-bold text-gray-900 dark:text-white pb-2">749</h5>
                    <p class="text-base text-gray-500 dark:text-gray-400">Chamados Concluídos</p>
                    <div id="area-chart" class="mt-4 h-64"></div>
                </div>

                <!-- Gráfico 2: ocupa 1 coluna -->
                <div class="bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <div
                                class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center me-3">
                                <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                                    <path
                                        d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                                    <path
                                        d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
                                </svg>
                            </div>
                            <div>
                                <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">231</h5>
                                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Chamados nessa semana</p>
                            </div>
                        </div>
                        <div>
                            <span
                                class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1  rounded-md dark:bg-green-900 dark:text-green-300">
                                <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                                </svg>
                                42.5%
                            </span>
                        </div>
                    </div>
                    <div id="column-chart" class="mt-1 h-64"></div>
                </div>

                <!-- Gráfico 3: nova linha (ocupa as 3 colunas) -->
                <div class="lg:col-span-1 bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">
                    <h5 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Chamados</h5>

                    <!-- Cards internos -->
                    <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg mb-3">
                        <div class="grid grid-cols-3 gap-3">
                            <dl
                                class="bg-blue-200 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                                <dt class="text-blue-600 dark:text-orange-300 text-sm font-medium">12</dt>
                                <dd class="text-sm">Abertos</dd>
                            </dl>
                            <dl
                                class="bg-orange-200 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                                <dt class="text-orange-600 dark:text-teal-300 text-sm font-medium">23</dt>
                                <dd class="text-sm">Andamento</dd>
                            </dl>
                            <dl
                                class="bg-green-200 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                                <dt class="text-green-600 dark:text-blue-300 text-sm font-medium">64</dt>
                                <dd class="text-sm">Concluidos</dd>
                            </dl>
                        </div>
                    </div>

                    <div id="radial-chart" class="w-full h-64"></div>
                </div>


                <div class="lg:col-span-2 bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between mb-5">
                        <div class="grid gap-4 grid-cols-2">
                            <div>
                                <h5
                                    class="inline-flex items-center text-gray-500 dark:text-gray-400 leading-none font-normal mb-2">
                                    Chamados dentro do prazo

                                </h5>
                                <p class="text-gray-900 dark:text-white text-2xl leading-none font-bold">675</p>
                            </div>
                            <div>
                                <h5
                                    class="inline-flex items-center text-gray-500 dark:text-gray-400 leading-none font-normal mb-2">
                                    Index

                                </h5>
                                <div class="flex">
                                    <p class="text-[#C33E3E] dark:text-white text-lg leading-none font-bold me-2">Critico
                                    </p>
                                    <p class="text-[#3F68DE] dark:text-white text-lg leading-none font-bold me-2">Alto</p>
                                    <p class="text-[#D29B29] dark:text-white text-lg leading-none font-bold me-2">Medio</p>
                                    <p class="text-[#38935A] dark:text-white text-lg leading-none font-bold me-2">Baixo</p>
                                </div>


                            </div>

                        </div>
                        <div>
                            <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                                data-dropdown-placement="bottom" type="button"
                                class="px-3 py-2 inline-flex items-center text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Ultimo
                                mês<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg></button>
                            <div id="lastDaysdropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                            7 days</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                            30 days</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                            90 days</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="line-chart"></div>

                </div>



                <div class="lg:col-span-1 bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">

                    <div class="flex justify-between mb-3">
                        <div class="flex justify-center items-center">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">Chamados por Setor
                            </h5>

                        </div>
                        <div>
                            <button type="button" data-tooltip-target="data-tooltip" data-tooltip-placement="bottom"
                                class="hidden sm:inline-flex items-center justify-center text-gray-500 w-8 h-8 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm"><svg
                                    class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 16 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 1v11m0 0 4-4m-4 4L4 8m11 4v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3" />
                                </svg><span class="sr-only">Download data</span>
                            </button>
                            <div id="data-tooltip" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                                Download CSV
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="flex" id="devices">
                            <div class="flex items-center me-4">
                                <input id="desktop" type="checkbox" value="desktop"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="desktop"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">RH</label>
                            </div>
                            <div class="flex items-center me-4">
                                <input id="tablet" type="checkbox" value="tablet"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="tablet"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">CCHI</label>
                            </div>
                            <div class="flex items-center me-4">
                                <input id="mobile" type="checkbox" value="mobile"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="mobile"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">UTI</label>
                            </div>
                            <div class="flex items-center me-4">
                                <input id="mobile" type="checkbox" value="mobile"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="mobile"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">CTI</label>
                            </div>
                            <div class="flex items-center me-4">
                                <input id="mobile" type="checkbox" value="mobile"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="mobile"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Manutenção</label>
                            </div>
                        </div>
                    </div>

                    <!-- Donut Chart -->
                    <div class="py-6" id="donut-chart"></div>


                </div>


            </div>


        </div>


    </div>



<script>



    function renderChartsIfNeeded() {
        // Função para destruir todos os gráficos
        function destroyCharts() {
            apexChartsInstances.forEach((chart) => {
                chart.destroy();
            });
            apexChartsInstances.length = 0; // Limpa o array
        }

        // Destrói os gráficos existentes ao trocar de página, se necessário
        destroyCharts();

        // Gráfico de área
        if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
            const areaChartOptions = {
                chart: {
                    height: "100%",
                    maxWidth: "100%",
                    type: "area",
                    fontFamily: "Inter, sans-serif",
                    dropShadow: {
                        enabled: false,
                    },
                    toolbar: {
                        show: false,
                    },
                },
                tooltip: {
                    enabled: true,
                    x: {
                        show: false,
                    },
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        opacityFrom: 0.55,
                        opacityTo: 0,
                        shade: "#1cf275",
                        gradientToColors: ["#1cf275"],
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    width: 6,
                },
                grid: {
                    show: false,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: 0
                    },
                },
                series: [
                    {
                        name: "Chamados Concluidos",
                        data: [233, 300, 485, 332, 289, 380, 223, 132, 345, 532, 342, 321], // valores fictícios para cada mês
                        color: "#1cf275",
                    },
                ],
                xaxis: {
                    categories: [
                        'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
                        'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
                    ],
                    labels: {
                        show: true,
                        style: {
                            colors: "#6B7280", // cinza escuro (opcional)
                            fontSize: '12px',
                        }
                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    show: true,
                },
            };

            const areaChart = new ApexCharts(document.getElementById("area-chart"), areaChartOptions);
            areaChart.render();
            apexChartsInstances.push(areaChart);
        }

        // Gráfico de coluna
        if (document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
            const columnChartOptions = {
                colors: ["#1A56DB", "#FDBA8C"],
                series: [
                    {
                        name: "Organic",
                        color: "#1A56DB",
                        data: [
                            { x: "Segunda", y: 231 },
                            { x: "Terça", y: 122 },
                            { x: "Quarta", y: 63 },
                            { x: "Quinta", y: 421 },
                            { x: "Sexta", y: 122 },
                            { x: "Sabado", y: 323 },
                            { x: "Domingo", y: 111 },
                        ],
                    }
                ],
                chart: {
                    type: "bar",
                    height: "320px",
                    fontFamily: "Inter, sans-serif",
                    toolbar: {
                        show: false,
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "70%",
                        borderRadiusApplication: "end",
                        borderRadius: 8,
                    },
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    style: {
                        fontFamily: "Inter, sans-serif",
                    },
                },
                states: {
                    hover: {
                        filter: {
                            type: "darken",
                            value: 1,
                        },
                    },
                },
                stroke: {
                    show: true,
                    width: 0,
                    colors: ["transparent"],
                },
                grid: {
                    show: false,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: -14
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                legend: {
                    show: false,
                },
                xaxis: {
                    floating: false,
                    labels: {
                        show: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        }
                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    show: false,
                },
                fill: {
                    opacity: 1,
                },
            }

            const columnChart = new ApexCharts(document.getElementById("column-chart"), columnChartOptions);
            columnChart.render();
            apexChartsInstances.push(columnChart);
        }

        // Gráfico radial
        if (document.getElementById("radial-chart") && typeof ApexCharts !== 'undefined') {
            const getChartOptions = () => {
                return {
                    series: [90, 85, 70],
                    colors: ["#BEDBFF", "#FFD7A8", "#B9F8CF"],
                    chart: {
                        height: "350px",
                        width: "100%",
                        type: "radialBar",
                        sparkline: {
                            enabled: true,
                        },
                    },
                    plotOptions: {
                        radialBar: {
                            track: {
                                background: '#E5E7EB',
                            },
                            dataLabels: {
                                show: false,
                            },
                            hollow: {
                                margin: 0,
                                size: "32%",
                            }
                        },
                    },
                    grid: {
                        show: false,
                        strokeDashArray: 4,
                        padding: {
                            left: 2,
                            right: 2,
                            top: -23,
                            bottom: -20,
                        },
                    },
                    labels: ["Abertos", "Andamento", "Concluidos"],
                    legend: {
                        show: true,
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                    },
                    tooltip: {
                        enabled: true,
                        x: {
                            show: false,
                        },
                    },
                    yaxis: {
                        show: false,
                        labels: {
                            formatter: function (value) {
                                return value + '%';
                            }
                        }
                    }
                }
            }

            const radialChart = new ApexCharts(document.querySelector("#radial-chart"), getChartOptions());
            radialChart.render();
            apexChartsInstances.push(radialChart);
        }

        // Gráfico de linha
        if (document.getElementById("line-chart") && typeof ApexCharts !== 'undefined') {
            const lineChartOptions = {
                chart: {
                    height: "100%",
                    maxWidth: "100%",
                    type: "line",
                    fontFamily: "Inter, sans-serif",
                    dropShadow: {
                        enabled: false,
                    },
                    toolbar: {
                        show: false,
                    },
                },
                tooltip: {
                    enabled: true,
                    x: {
                        show: false,
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    width: 6,
                },
                grid: {
                    show: true,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: -26
                    },
                },
                series: [
                    {
                        name: "Crítico",
                        data: [782, 645, 719, 623, 508, 755, 689, 740, 693, 610, 560, 778],
                        color: "#B91C1C",
                    },
                    {
                        name: "Alto",
                        data: [610, 728, 599, 685, 732, 501, 647, 710, 540, 598, 703, 745],
                        color: "#CA8A04",
                    },
                    {
                        name: "Médio",
                        data: [480, 525, 410, 560, 375, 630, 390, 440, 498, 520, 475, 405],
                        color: "#1D4ED8",
                    },
                    {
                        name: "Baixo",
                        data: [210, 180, 160, 195, 220, 250, 205, 190, 170, 230, 245, 215],
                        color: "#15803D",
                    }
                ],
                legend: {
                    show: false
                },
                stroke: {
                    curve: 'smooth'
                },
                xaxis: {
                    categories: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
                        'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                    labels: {
                        show: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        }
                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    show: false,
                },
            }

            const lineChart = new ApexCharts(document.getElementById("line-chart"), lineChartOptions);
            lineChart.render();
            apexChartsInstances.push(lineChart);
        }

        // Gráfico donut
        if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
            const getChartOptions2 = () => {
                return {
                    series: [35, 23, 24, 54],
                    colors: ["#1C64F2", "#16BDCA", "#FDBA8C", "#E74694"],
                    chart: {
                        height: 320,
                        width: "100%",
                        type: "donut",
                    },
                    stroke: {
                        colors: ["transparent"],
                        lineCap: "",
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                labels: {
                                    show: true,
                                    name: {
                                        show: true,
                                        fontFamily: "Inter, sans-serif",
                                        offsetY: 20,
                                    },
                                    total: {
                                        showAlways: true,
                                        show: true,
                                        label: "Chamados",
                                        fontFamily: "Inter, sans-serif",

                                    },
                                    value: {
                                        show: true,
                                        fontFamily: "Inter, sans-serif",
                                        offsetY: -20,

                                    },
                                },
                                size: "80%",
                            },
                        },
                    },
                    grid: {
                        padding: {
                            top: -2,
                        },
                    },
                    labels: ["UTI", "RH", "CTI", "UTI"],
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                    },
                    yaxis: {
                        labels: {
                            formatter: function (value) {
                                return value + "k"
                            },
                        },
                    },
                    xaxis: {
                        labels: {
                            formatter: function (value) {
                                return value + "k"
                            },
                        },
                        axisTicks: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                    },
                }
            }

            const donutChart = new ApexCharts(document.getElementById("donut-chart"), getChartOptions2());
            donutChart.render();
            apexChartsInstances.push(donutChart);
        }
    }

</script>