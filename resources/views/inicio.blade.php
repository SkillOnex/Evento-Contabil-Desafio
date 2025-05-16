@extends('layouts.app') {{-- Se tiver um layout base --}}


@section('content')
    <div class="flex-1 min-h-screen ">




        <div class="p-4 sm:ml-64">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 sm:mt-14">

                <!-- Gráfico de Chamados por Prioridade -->
                <div class="col-span-2 lg:col-span-5 bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <h2 class="text-3xl font-mono text-gray-900 dark:text-white mb-3">
                        Bem-vindo ao FastTicket
                    </h2>

                    <p class="text-gray-600 dark:text-gray-300 mb-2">
                        Seu novo sistema para registrar, acompanhar e resolver chamados com agilidade.
                        Tudo em um só lugar, de forma rápida, clara e eficiente.
                    </p>

                    <p class="text-gray-600 dark:text-gray-400 mb-4 italic">
                        Porque cada minuto conta — e problemas precisam de soluções, não de burocracia.
                    </p>


                    <button type="button"
                        class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-5 h-5 text-white me-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Novo Chamado
                    </button>

                </div>

                <!-- Últimos Chamados -->
                <div class="col-span-1 lg:col-span-2 bg-white rounded-lg shadow dark:bg-gray-800 p-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Últimos Chamados</h3>
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        <li class="py-3">
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">#1432 - Impressora sem conexão
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Setor: Administrativo | Prioridade: Alta |
                                12/05/2025</p>
                        </li>
                        <li class="py-3">
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">#1429 - Computador não liga</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Setor: TI | Prioridade: Crítica | 11/05/2025
                            </p>
                        </li>
                        <li class="py-3">
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">#1426 - E-mail fora do ar</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Setor: Financeiro | Prioridade: Média |
                                10/05/2025</p>
                        </li>
                    </ul>
                </div>



               @include('partials.bar-audience-chart', [
                    'chartId' => 'bar-audience-chart',
                    'title' => 'Setores Mais Requisitados',
                    'data' => [18, 15, 60, 30],
                    'categories' => ['50+', '40+', '30+', '20+']
                ])


            </div>

        </div>


    </div>
@endsection

