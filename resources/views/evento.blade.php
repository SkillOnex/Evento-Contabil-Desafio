@extends('layouts.app')

@section('title', 'Sistema Evento')

@section('content')

<div class="flex-col w-1/2">


    @php
        $alerts = [
            'success' => [
                'color' => 'green',
                'iconColor' => 'text-green-800',
                'bg' => 'bg-green-50',
                'ring' => 'ring-green-400',
                'text' => session('success'),
            ],
            'error' => [
                'color' => 'red',
                'iconColor' => 'text-red-800',
                'bg' => 'bg-red-50 ',
                'ring' => 'ring-red-400',
                'text' => session('error'),
            ],
        ];
    @endphp

    @foreach ($alerts as $type => $config)
        @if ($config['text'])
            <div id="alert-{{ $type }}" class="flex items-center p-4 mb-4 rounded-lg {{ $config['bg'] }} {{ $config['iconColor'] }}" role="alert">
                <svg class="shrink-0 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <div class="ms-3 text-sm font-medium">
                    {{ $config['text'] }}
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 {{ $config['bg'] }} text-{{ $config['color'] }}-500 rounded-lg focus:ring-2 focus:ring-{{ $config['color'] }}-400 p-1.5 hover:bg-{{ $config['color'] }}-200 inline-flex items-center justify-center h-8 w-8 dark:hover:bg-gray-700" data-dismiss-target="#alert-{{ $type }}" aria-label="Close">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        @endif
    @endforeach

    @if ($errors->any())
        <div id="alert-validation" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 " role="alert">
            <svg class="shrink-0 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div class="ms-3 text-sm font-medium">
                <ul class="list-disc ps-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 " data-dismiss-target="#alert-validation" aria-label="Close">
                <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif




    <!-- Tabs -->
    <div class="mb-4 border-b border-gray-700 ">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center " id="default-tab"
            data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="pessoa-tab" data-tabs-target="#pessoa"
                    type="button" role="tab" aria-controls="pessoa" aria-selected="false">Pessoa</button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg " id="salas-tab" data-tabs-target="#salas"
                    type="button" role="tab" aria-controls="salas" aria-selected="false">Salas</button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg " id="cafes-tab" data-tabs-target="#cafes"
                    type="button" role="tab" aria-controls="cafes" aria-selected="false">
                    Café</button>
            </li>

        </ul>
    </div>

    <!-- Content -->
    <div id="default-tab-content">
        <!-- Pessoa -->
        <div class="hidden p-4 rounded-lg bg-white " id="pessoa" role="tabpanel" aria-labelledby="pessoa-tab">

            <button type="button" data-modal-target="crud-modal-pessoas" data-modal-toggle="crud-modal-pessoas"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Cadastrar</button>
                <hr class="h-px my-2 bg-gray-200 border-0 ">
            <table id="table-pessoa">
                <thead>
                    <tr>
                        <th>
                            <span class="flex items-center">
                                Nome
                            </span>
                        </th>

                        <th>
                            <span class="flex items-center">
                                Ações
                            </span>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <!-- ForEach para Exibir pessoas -->
                    @foreach($pessoas as $pessoa)
                    <tr>
                        <td>
                            <p class="font-bold text-gray-600">
                                {{ $pessoa->nome }} {{ $pessoa->sobrenome }}
                            </p>
                        </td>
                        <td>
                            <a href="#" class="btn-show-modal font-bold text-gray-600" data-nome="{{ $pessoa->nome }}"
                                data-sobrenome="{{ $pessoa->sobrenome }}" data-salas='@json($pessoa->alocacoes_salas)'
                                data-cafes='@json($pessoa->alocacoes_cafes)'>
                                Ver Pessoa
                            </a>
                        </td>

                    </tr>
                    @endforeach



                </tbody>
            </table>


        </div>

        <!-- Salas -->
        <div class="hidden p-4 rounded-lg bg-white " id="salas" role="tabpanel" aria-labelledby="salas-tab">
            <button type="button" data-modal-target="modal-crud-salas" data-modal-toggle="modal-crud-salas"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Cadastrar</button>
            <hr class="h-px my-2 bg-gray-200 border-0 ">

            <table id="table-sala">
                <thead>
                    <tr>
                        <th>Nome da Sala</th>
                        <th>Lotação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salas as $sala)
                    <tr>
                        <td class="font-bold text-gray-600">{{ $sala->nome }}</td>
                        <td class="font-bold text-gray-600">{{ $sala->lotacao }}</td>
                        <td>
                            <button class="btn-show-modal-salas font-bold text-gray-600" data-id="{{ $sala->id }}"
                                data-nome="{{ $sala->nome }}" data-alocacoes='@json($sala->pessoas_por_etapas)'>

                                Ver Salas
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


        </div>

        <!-- Cafés -->
        <div class="hidden p-4 rounded-lg bg-gray-50 " id="cafes" role="tabpanel" aria-labelledby="cafes-tab">
            <button type="button" data-modal-target="modal-crud-cafes" data-modal-toggle="modal-crud-cafes"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Cadastrar</button>
            <hr class="h-px my-2 bg-gray-200 border-0 ">
            <table id="table-cafe">
                <thead>
                    <tr>
                        <th>Nome do Café</th>
                        <th>Lotação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cafes as $cafe)
                    <tr>
                        <td class="font-bold text-gray-600">{{ $cafe->nome }}</td>
                        <td class="font-bold text-gray-600">{{ $cafe->lotacao }}</td>
                        <td>
                            <button class="btn-show-modal-cafes font-bold text-gray-600" data-id="{{ $cafe->id }}"
                                data-nome="{{ $cafe->nome }}" data-alocacoes='@json($cafe->pessoas_por_etapas)'>

                                Ver Salas
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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

    <!-- Modal CRUD Pessoas -->
    <div id="crud-modal-pessoas" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
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
                                <input type="text" name="name_etp1" id="name_etp1" pattern="^[^<>]*$" title="Não use caracteres como / ou >"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                    placeholder="" required>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="lastname_etp1"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Sobrenome</label>
                                <input type="text" name="lastname_etp1" id="lastname_etp1" pattern="^[^<>]*$" title="Não use caracteres como / ou >"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                    placeholder="" required>
                            </div>


                            <div>
                                <label for="category1"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Salas</label>
                                <select name="sala_etp1" id="sala_etp1" required pattern="^[^<>]*$" title="Não use caracteres como / ou >"
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
                                <select name="cafe_etp1" id="cafe_etp1" required pattern="^[^<>]*$" title="Não use caracteres como / ou >"
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
                                <input type="text" name="name_etp2" id="name_etp2" disabled pattern="^[^<>]*$" title="Não use caracteres como / ou >"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                    placeholder="" required>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="lastname_etp2"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Sobrenome</label>
                                <input type="text" name="lastname_etp2" id="lastname_etp2" disabled pattern="^[^<>]*$" title="Não use caracteres como / ou >"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                    placeholder="" required>
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


    <!-- Modal Salas -->
    <div id="modalSala"
        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60 transition-opacity duration-300"
        aria-hidden="true">
        <div
            class="relative w-full max-w-2xl max-h-[90vh] bg-white rounded-xl shadow-2xl p-6 transform transition-all duration-300 scale-95">

            <button id="btn-close-sala"
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 transition-colors duration-200"
                aria-label="Close modal">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>



            <!-- Título dinâmico -->
            <h2 id="modalSalaNome" class="text-xl font-bold mb-4"></h2>

            <!-- Lista das etapas com pessoas -->
            <ul id="listaEtapasSala" class="relative border-l-2 border-blue-500">
                <!-- Itens vão ser inseridos aqui pelo JS -->
            </ul>
        </div>
    </div>

    <!-- Modal CRUD Salas -->
    <div id="modal-crud-salas" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">

            <div class="relative bg-white rounded-lg shadow-sm ">

                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t  border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Cadastrar nova sala
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                        data-modal-hide="modal-crud-salas">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <div class="p-4 md:p-5">
                    <form class="space-y-4" method="POST" action="{{ route('evento.storeSala') }}">
                        @csrf
                        <div>
                            <label for="name_sala" class="block mb-2 text-sm font-medium text-gray-900 ">Nome</label>
                            <input type="text" name="name_sala" id="name_sala" pattern="^[^<>]*$" title="Não use caracteres como / ou >"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="" required />
                        </div>
                        <div>
                            <label for="lotacao" class="block mb-2 text-sm font-medium text-gray-900 ">Lotação</label>
                            <input type="number" name="lotacao" id="lotacao" placeholder="" pattern="^[^<>]*$" title="Não use caracteres como / ou >"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required />
                        </div>

                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Salvar Sala
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <!-- Modal Cafés -->
    <div id="modalCafe"
        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60 transition-opacity duration-300"
        aria-hidden="true">
        <div
            class="relative w-full max-w-2xl max-h-[90vh] bg-white rounded-xl shadow-2xl p-6 transform transition-all duration-300 scale-95">

            <button id="btn-close-cafe"
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 transition-colors duration-200"
                aria-label="Close modal">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>



            <!-- Título dinâmico -->
            <h2 id="modalCafeNome" class="text-xl font-bold mb-4"></h2>

            <!-- Lista das etapas com pessoas -->
            <ul id="listaEtapasCafe" class="relative border-l-2 border-blue-500">
                <!-- Itens vão ser inseridos aqui pelo JS -->
            </ul>
        </div>
    </div>

    <!-- Modal CRUD Café -->
    <div id="modal-crud-cafes" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">

            <div class="relative bg-white rounded-lg shadow-sm ">

                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t  border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Cadastrar novo Café
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                        data-modal-hide="modal-crud-cafes">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <div class="p-4 md:p-5">
                    <form class="space-y-4" method="POST" action="{{ route('evento.storeCafe') }}">
                        @csrf
                        <div>
                            <label for="name_cafe" class="block mb-2 text-sm font-medium text-gray-900 ">Nome</label>
                            <input type="text" name="name_cafe" id="name_cafe" pattern="^[^<>]*$" title="Não use caracteres como / ou >"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="" required />
                        </div>
                        <div>
                            <label for="lotacao_cafe" class="block mb-2 text-sm font-medium text-gray-900 ">Lotação</label>
                            <input type="number" name="lotacao_cafe" id="lotacao_cafe" placeholder="" pattern="^[^<>]*$" title="Não use caracteres como / ou >"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required />
                        </div>

                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Salvar Café
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>






    @endsection
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    // Função para inicializar uma tabela
    function initDataTable(id) {
        if ($(id).length && typeof simpleDatatables !== "undefined" && typeof simpleDatatables.DataTable !==
            "undefined") {
            return new simpleDatatables.DataTable(id, {
                searchable: true,
                sortable: false,
                labels: {
                    placeholder: "Buscar...",
                    perPage: "Registros por página",
                    noRows: "Nenhum resultado encontrado",
                    info: "Mostrando {start} a {end} de {rows} registros",
                },
            });
        }
        return null;
    }

    // Armazena a Tabela
    const dataTableSala = initDataTable("#table-sala");
    const dataTablePessoa = initDataTable("#table-pessoa");
    const dataTableCafe = initDataTable("#table-cafe");

    $(document).ready(function() {
        // Inicializa a tabela com DataTable se o elemento existir e a biblioteca estiver carregada
        initDataTable("#table-sala");
        initDataTable("#table-pessoa");
        initDataTable("#table-cafe");

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

        // Clique no botão Próximo
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

            // Se estiver válido avança para próxima etapa
            if (isValid) {
                if (currentStep < totalSteps) {
                    currentStep++;
                    showStep(currentStep);
                }
            }
        });

        // Clique no botão Anterior
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
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                    </span>


                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Etapa ${etapa}</h3>
                    ${etapas[etapa].salas.map(sala => `
                        <div class="flex items-center mb-2">

                            <p class="text-base font-medium text-gray-600">Sala: ${sala.nome || 'Sem nome'}</p>
                        </div>
                    `).join('')}
                    ${etapas[etapa].cafes.map(cafe => `
                        <div class="flex items-center mb-2">

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


        $('.btn-show-modal-salas').on('click', function(e) {
            e.preventDefault();

            // Obtém o nome da sala e as alocações por etapa do atributo data-*
            const nomeSala = $(this).data('nome');
            const pessoasEtapas = $(this).data('alocacoes');

            // Define o título do modal com o nome da sala
            $('#modalSalaNome').text(`Pessoas na "${nomeSala}" por etapa`);

            // Limpa a lista de etapas anteriores no modal
            $('#listaEtapasSala').empty();

            // Verifica se há informações de alocações
            if (!pessoasEtapas) {
                // Se não houver, exibe uma mensagem de ausência de dados
                $('#listaEtapasSala').append('<li>Nenhuma informação disponível.</li>');
            } else {
                // Ordena as etapas (chaves do objeto)
                const etapas = Object.keys(pessoasEtapas).sort();

                // Para cada etapa encontrada
                etapas.forEach(function(etapa) {
                    const pessoas = pessoasEtapas[etapa]; // Lista de pessoas nessa etapa

                    // Cria o HTML do item da etapa
                    let html = `
                    <li class="mb-8 ml-6 transition-all duration-200 hover:bg-gray-100 rounded-lg p-4">
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-blue-600 rounded-full -left-4 ring-4 ring-white">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </span>

                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Etapa ${etapa}</h3>`;

                    // Se não houver pessoas na etapa
                    if (pessoas.length === 0) {
                        html +=
                            `<p class="text-gray-500">Nenhuma pessoa alocada nesta etapa.</p>`;
                    } else {
                        // Se houver pessoas lista cada uma
                        html += "<ul class='list-disc list-inside'>";
                        pessoas.forEach(function(p) {
                            html += `<li>${p.nome} ${p.sobrenome || ''}</li>`;
                        });
                        html += "</ul>";
                    }

                    html += `</li>`; // Fecha o item da etapa

                    // Adiciona o HTML gerado ao modal
                    $('#listaEtapasSala').append(html);
                });
            }

            // Exibe o modal (remove a classe 'hidden' e faz a animação de scale)
            $('#modalSala').removeClass('hidden').find('.scale-95').removeClass('scale-95').addClass(
                'scale-100');
        });


        $('.btn-show-modal-cafes').on('click', function(e) {
            e.preventDefault();

            // Obtém o nome do Café e as alocações por etapa do atributo data-*
            const nomeSala = $(this).data('nome');
            const pessoasEtapas = $(this).data('alocacoes');

            // Define o título do modal com o nome da Café
            $('#modalCafeNome').text(`Pessoas no "${nomeSala}" por etapa`);

            // Limpa a lista de etapas anteriores no modal
            $('#listaEtapasCafe').empty();

            // Verifica se há informações de alocações
            if (!pessoasEtapas) {
                // Se não houver, exibe uma mensagem de ausência de dados
                $('#listaEtapasCafe').append('<li>Nenhuma informação disponível.</li>');
            } else {
                // Ordena as etapas (chaves do objeto)
                const etapas = Object.keys(pessoasEtapas).sort();

                // Para cada etapa encontrada
                etapas.forEach(function(etapa) {
                    const pessoas = pessoasEtapas[etapa]; // Lista de pessoas nessa etapa

                    // Cria o HTML do item da etapa
                    let html = `
                    <li class="mb-8 ml-6 transition-all duration-200 hover:bg-gray-100 rounded-lg p-4">
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-blue-600 rounded-full -left-4 ring-4 ring-white">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </span>

                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Etapa ${etapa}</h3>`;

                    // Se não houver pessoas na etapa
                    if (pessoas.length === 0) {
                        html +=
                            `<p class="text-gray-500">Nenhuma pessoa alocada nesta etapa.</p>`;
                    } else {
                        // Se houver pessoas lista cada uma
                        html += "<ul class='list-disc list-inside'>";
                        pessoas.forEach(function(p) {
                            html += `<li>${p.nome} ${p.sobrenome || ''}</li>`;
                        });
                        html += "</ul>";
                    }

                    html += `</li>`; // Fecha o item da etapa

                    // Adiciona o HTML gerado ao modal
                    $('#listaEtapasCafe').append(html);
                });
            }

            // Exibe o modal (remove a classe 'hidden' e faz a animação de scale)
            $('#modalCafe').removeClass('hidden').find('.scale-95').removeClass('scale-95').addClass(
                'scale-100');
        });

        // Fechar modal Café
        $('#btn-close-cafe').off('click').on('click', function() {
            $('#modalCafe').addClass('hidden');
        });

        // Fechar modal Café
        $('#modal-crud-cafes').off('click').on('click', function() {
            $('#modalCafe').addClass('hidden');
        });


        // Fechar modal sala
        $('#btn-close-sala').off('click').on('click', function() {
            $('#modalSala').addClass('hidden');
        });

        // Exibe a etapa inicial ao carregar
        showStep(currentStep);
    });
    </script>
