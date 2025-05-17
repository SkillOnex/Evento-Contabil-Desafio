@extends('layouts.app')

@section('title', 'Sistema Evento')

@section('content')

<div class="flex-col">
    <!-- Tabs -->
    <div class="mb-4  border-b border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
            data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="pessoa-tab" data-tabs-target="#pessoa"
                    type="button" role="tab" aria-controls="pessoa" aria-selected="false">Pessoa</button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg " id="salas-tab" data-tabs-target="#salas"
                    type="button" role="tab" aria-controls="salas" aria-selected="false">Cadastro de Salas</button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg " id="cafes-tab" data-tabs-target="#cafes"
                    type="button" role="tab" aria-controls="cafes" aria-selected="false">Cadastro de Espaços de
                    Café</button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg " id="consultas-tab"
                    data-tabs-target="#consultas" type="button" role="tab" aria-controls="consultas"
                    aria-selected="false">Consultas</button>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div id="default-tab-content">
        <!-- Pessoa -->
        <div class="hidden p-4 rounded-lg bg-white " id="pessoa" role="tabpanel" aria-labelledby="pessoa-tab">

            <button type="button" data-modal-target="crud-modal-pessoas" data-modal-toggle="crud-modal-pessoas"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Cadastrar</button>
            <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
            <table id="search-table">
                <thead>
                    <tr>
                        <th>
                            <span class="flex items-center">
                                Nome
                            </span>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <!-- ForEach para Exibir pessoas -->
                    @foreach($pessoas as $pessoa)
                    <tr>
                        <td>
                            <a href="#" class="btn-show-modal" data-nome="{{ $pessoa->nome }}"
                                data-sobrenome="{{ $pessoa->sobrenome }}" data-salas='@json($pessoa->alocacoes_salas)'
                                data-cafes='@json($pessoa->alocacoes_cafes)'>
                                {{ $pessoa->nome }} {{ $pessoa->sobrenome }}
                            </a>
                        </td>
                    </tr>
                    @endforeach



                </tbody>
            </table>


        </div>

        <!-- Salas -->
        <div class="hidden p-4 rounded-lg bg-gray-50 " id="salas" role="tabpanel" aria-labelledby="salas-tab">
            <form class="max-w-md mx-auto space-y-4">
                <div>
                    <label for="nome_sala" class="block mb-1 font-medium text-gray-700 ">Nome da
                        Sala</label>
                    <input type="text" id="nome_sala" name="nome_sala" placeholder="Digite o nome da sala"
                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" />
                </div>
                <div>
                    <label for="lotacao_sala" class="block mb-1 font-medium text-gray-700 ">Lotação</label>
                    <input type="number" id="lotacao_sala" name="lotacao_sala" placeholder="Capacidade máxima" min="1"
                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" />
                </div>
                <button type="submit"
                    class="px-4 py-2 font-semibold text-white bg-green-600 rounded hover:bg-green-700">Cadastrar
                    Sala</button>
            </form>
        </div>

        <!-- Cafés -->
        <div class="hidden p-4 rounded-lg bg-gray-50 " id="cafes" role="tabpanel" aria-labelledby="cafes-tab">
            <form class="max-w-md mx-auto space-y-4">
                <div>
                    <label for="nome_cafe" class="block mb-1 font-medium text-gray-700 ">Nome do
                        Espaço de Café</label>
                    <input type="text" id="nome_cafe" name="nome_cafe" placeholder="Digite o nome do espaço"
                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500" />
                </div>
                <div>
                    <label for="lotacao_cafe" class="block mb-1 font-medium text-gray-700 ">Lotação</label>
                    <input type="number" id="lotacao_cafe" name="lotacao_cafe" placeholder="Capacidade máxima" min="1"
                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500" />
                </div>
                <button type="submit"
                    class="px-4 py-2 font-semibold text-white bg-yellow-600 rounded hover:bg-yellow-700">Cadastrar
                    Espaço de Café</button>
            </form>
        </div>

        <!-- Consultas -->
        <div class="hidden p-4 rounded-lg bg-gray-50 " id="consultas" role="tabpanel" aria-labelledby="consultas-tab">
            <form class="max-w-lg mx-auto space-y-4">
                <div>
                    <label for="consulta_pessoa" class="block mb-1 font-medium text-gray-700 ">Consultar Pessoa (nome ou
                        sobrenome)</label>
                    <input type="text" id="consulta_pessoa" name="consulta_pessoa"
                        placeholder="Digite o nome ou sobrenome"
                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>
                <div>
                    <label for="consulta_sala" class="block mb-1 font-medium text-gray-700 ">Consultar
                        Sala (nome)</label>
                    <input type="text" id="consulta_sala" name="consulta_sala" placeholder="Digite o nome da sala"
                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>
                <div>
                    <label for="consulta_cafe" class="block mb-1 font-medium text-gray-700 ">Consultar
                        Espaço de Café (nome)</label>
                    <input type="text" id="consulta_cafe" name="consulta_cafe" placeholder="Digite o nome do espaço"
                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>
                <button type="submit"
                    class="px-4 py-2 font-semibold text-white bg-indigo-600 rounded hover:bg-indigo-700">Consultar</button>
            </form>
        </div>
    </div>




    <!-- Crud modal -->
    <div id="crud-modal-pessoas" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <
            <div class="relative bg-white rounded-lg shadow-sm ">

                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Adicionar nova pessoa
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                        data-modal-toggle="crud-modal-pessoas">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Fechar Modal</span>
                    </button>
                </div>

                <form class="p-4 md:p-5" id="step-form" method="POST" action="{{ route('evento.alocar') }}">
                    @csrf
                    <!--  Stepper visual -->
                    <ol id="step-indicator"
                        class="flex items-center justify-center gap-6 w-full mb-6 text-sm font-medium text-center text-gray-500sm:text-base">

                        <li class="flex items-center text-blue-600 dark:text-blue-500 step-item">
                            <span
                                class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 ">1</span>
                            <span class="hidden sm:inline ml-2">Etapa 1</span>
                            <svg class="w-4 h-4 ml-6 text-gray-400  rtl:rotate-180 dark:text-gray-500"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10.293 15.707a1 1 0 010-1.414L13.586 11H4a1 1 0 110-2h9.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" />
                            </svg>
                        </li>

                        <li class="flex items-center  step-item">
                            <span
                                class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 ">2</span>
                            <span class="hidden sm:inline ml-2">Etapa 2</span>
                        </li>
                    </ol>

                    <!-- Etapa 1 -->
                    <div class="step-content step-1">

                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="name_etp1"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Nome</label>
                                <input type="text" name="name_etp1" id="name_etp1"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                    placeholder="Lucas" required>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="lastname_etp1"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Sobrenome</label>
                                <input type="text" name="lastname_etp1" id="lastname_etp1"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                    placeholder="Souza" required>
                            </div>


                            <div>
                                <label for="category1"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Salas</label>
                                <select name="sala_etp1" id="sala_etp1" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                                    <option value="" selected disabled>Selecione Uma Sala</option>

                                    @foreach ($salas as $sala)
                                    <option value="{{ $sala->id }}">{{ $sala->nome }} ({{ $sala->lotacao }} pessoas)
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="category2"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Cafés</label>
                                <select name="cafe_etp1" id="cafe_etp1" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                                    <option value="" selected disabled>Selecione Um Café</option>
                                    @foreach ($cafes as $cafe)
                                    <option value="{{ $cafe->id }}">{{ $cafe->nome }} ({{ $cafe->lotacao }} pessoas)
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>


                        <div class="flex justify-end mt-5">
                            <button type="button"
                                class="btn-next text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ">
                                Próxima Etapa
                            </button>
                        </div>
                    </div>

                    <!-- Etapa 2 -->
                    <div class="step-content step-2 hidden">
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="name_etp2"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Nome</label>
                                <input type="text" name="name_etp2" id="name_etp2" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                    placeholder="Lucas" required>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="lastname_etp2"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Sobrenome</label>
                                <input type="text" name="lastname_etp2" id="lastname_etp2" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                    placeholder="Souza" required>
                            </div>


                            <div>
                                <label for="category3"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Salas</label>
                                <select name="sala_etp2" id="sala_etp2" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                                    <option value="" selected disabled>Selecione Uma Sala</option>
                                    @foreach ($salas as $sala)
                                    <option value="{{ $sala->id }}">{{ $sala->nome }} ({{ $sala->lotacao }} pessoas)
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Cafés</label>
                                <select name="cafe_etp2" id="cafe_etp2" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                                    <option value="" selected disabled>Selecione Um Café</option>
                                    @foreach ($cafes as $cafe)
                                    <option value="{{ $cafe->id }}">{{ $cafe->nome }} ({{ $cafe->lotacao }} pessoas)
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="flex justify-between mt-5">
                            <button type="button"
                                class="btn-prev text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                Voltar
                            </button>
                            <button type="submit"
                                class="btn-submit text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                Salvar
                            </button>
                        </div>
                    </div>
                </form>



            </div>
        </div>
    </div>

    <!-- Modal Pessoas -->
    <div id="modalPessoa"
        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60 transition-opacity duration-300"
        aria-hidden="true">
        <div
            class="relative w-full max-w-2xl max-h-[90vh] bg-white rounded-xl shadow-2xl p-6 transform transition-all duration-300 scale-95">

            <button id="btnCloseModal"
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 transition-colors duration-200"
                aria-label="Close modal">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>


            <h2 id="modalNomeCompleto" class="text-2xl font-bold text-gray-900 mb-4"></h2>
            <hr class="my-4 border-gray-200">


            <ol id="listaEtapas" class="relative border-l-2 border-blue-500">

            </ol>
        </div>
    </div>

</div>



@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
    // Inicializa a tabela com DataTable, se o elemento existir e a biblioteca estiver carregada
    if (
        $("#search-table").length &&
        typeof simpleDatatables !== "undefined" &&
        typeof simpleDatatables.DataTable !== "undefined"
    ) {
        const dataTable = new simpleDatatables.DataTable("#search-table", {
            searchable: true, // Permite busca na tabela
            sortable: false, // Desabilita ordenação das colunas
            labels: {
                placeholder: "Buscar...", // Texto do campo de busca
                perPage: "Registros por página",
                noRows: "Nenhum resultado encontrado",
                info: "Mostrando {start} a {end} de {rows} registros",
            },
        });
    }

    // Variáveis para controle das etapas do passo a passo
    let currentStep = 1;
    const totalSteps = $(".step-content").length;

    // Função que mostra a etapa atual e estiliza o passo na barra
    function showStep(step) {
        $(".step-content").addClass("hidden"); // Esconde todas as etapas
        $(".step-" + step).removeClass("hidden"); // Mostra a etapa atual

        // Atualiza o estilo dos itens da barra de passos
        $(".step-item").each(function(index) {
            const li = $(this);
            const icon = li.find("span").first();

            if (index < step) {
                // Passos anteriores ficam azuis (ativo)
                icon
                    .removeClass("border-gray-500 text-gray-500 ")
                    .addClass("border-blue-600 text-blue-600 rounded-full shrink-0");

                li.removeClass("text-gray-500 dark:text-gray-400")
                    .addClass("text-blue-600 dark:text-blue-500");
            } else {
                // Passos futuros ficam cinzas (inativo)
                icon
                    .removeClass("border-blue-600 text-blue-600 ")
                    .addClass("border-gray-500 text-gray-500 rounded-full shrink-0");

                li.removeClass("text-blue-600 dark:text-blue-500")
                    .addClass("text-gray-500 dark:text-gray-400");
            }
        });
    }

    // Clique no botão "Próximo"
    $(".btn-next").click(function() {
        var $currentStepContent = $(".step-content.step-" + currentStep);
        var isValid = true;

        // Validação dos campos obrigatórios da etapa atual
        $currentStepContent.find("input[required], select[required], textarea[required]").each(
        function() {
            var value = $(this).val();

            if ($(this).is('select')) {
                // Verifica se select tem valor válido selecionado
                if (!value || $(this).find('option:selected').is(':disabled')) {
                    isValid = false;
                    $(this).addClass("border-red-500"); // Destaca campo inválido
                } else {
                    $(this).removeClass("border-red-500");
                }
            } else {
                // Verifica se campo está preenchido
                if (!value) {
                    isValid = false;
                    $(this).addClass("border-red-500");
                } else {
                    $(this).removeClass("border-red-500");
                }
            }
        });

        // Se estiver válido, avança para próxima etapa
        if (isValid) {
            if (currentStep < totalSteps) {
                currentStep++;
                showStep(currentStep);
            }
        }
    });

    // Clique no botão "Anterior"
    $(".btn-prev").click(function() {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    });

    // Função para sincronizar valores de campos entre etapas
    function sincronizarCampos() {
        $('#name_etp2').val($('#name_etp1').val());
        $('#lastname_etp2').val($('#lastname_etp1').val());
    }

    // Sincroniza ao carregar a página
    sincronizarCampos();

    // Sincroniza ao digitar nos campos da primeira etapa
    $('#name_etp1, #lastname_etp1').on('input', function() {
        sincronizarCampos();
    });

    // Evento para abrir modal com detalhes
    $('.btn-show-modal').on('click', function(e) {
        e.preventDefault();

        // Obtém dados do botão clicado
        var nome = $(this).data('nome');
        var sobrenome = $(this).data('sobrenome');
        var salas = $(this).data('salas');
        var cafes = $(this).data('cafes');

        // Atualiza nome completo no modal
        $('#modalNomeCompleto').text(nome + ' ' + sobrenome);

        // Limpa a lista de etapas dentro do modal
        $('#listaEtapas').empty();

        // Agrupa salas e cafés por etapa
        var etapas = {};

        // Processa salas e agrupa por etapa
        salas.forEach(function(sala) {
            var etapa = sala.etapa || 1;
            if (!etapas[etapa]) {
                etapas[etapa] = {
                    salas: [],
                    cafes: []
                };
            }
            etapas[etapa].salas.push(sala);
        });

        // Processa cafés e agrupa por etapa
        cafes.forEach(function(cafe) {
            var etapa = cafe.etapa || 1;
            if (!etapas[etapa]) {
                etapas[etapa] = {
                    salas: [],
                    cafes: []
                };
            }
            etapas[etapa].cafes.push(cafe);
        });

        // Gera itens da timeline para cada etapa
        var itens = [];
        Object.keys(etapas).sort().forEach(function(etapa) {
            var item = `
                <li class="mb-8 ml-6 transition-all duration-200 hover:bg-gray-100 rounded-lg p-4">
                    <span class="absolute flex items-center justify-center w-8 h-8 bg-blue-600 rounded-full -left-4 ring-4 ring-white">
                        <svg class="w-5 h-5 text-white" ...>...</svg>
                    </span>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Etapa ${etapa}</h3>
                    ${etapas[etapa].salas.map(sala => `
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 text-blue-600 mr-2" ...>...</svg>
                            <p class="text-base font-medium text-gray-600">Sala: ${sala.nome || 'Sem nome'}</p>
                        </div>
                    `).join('')}
                    ${etapas[etapa].cafes.map(cafe => `
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 text-blue-600 mr-2" ...>...</svg>
                            <p class="text-base font-medium text-gray-600">Café: ${cafe.nome || 'Sem nome'}</p>
                        </div>
                    `).join('')}
                </li>
            `;
            itens.push(item);
        });

        // Adiciona os itens gerados na lista da timeline do modal
        $('#listaEtapas').append(itens.join(''));

        // Exibe o modal com animação
        $('#modalPessoa').removeClass('hidden').find('.scale-95').removeClass('scale-95').addClass(
            'scale-100');
    });

    // Fecha o modal ao clicar no botão de fechar
    $('#btnCloseModal').on('click', function() {
        $('#modalPessoa').addClass('hidden');
    });

    // Fecha o modal ao clicar fora do conteúdo (na máscara)
    $('#modalPessoa').on('click', function(e) {
        if ($(e.target).is('#modalPessoa')) {
            $('#modalPessoa').addClass('hidden');
        }
    });

    // Exibe a etapa inicial ao carregar
    showStep(currentStep);
});
</script>
