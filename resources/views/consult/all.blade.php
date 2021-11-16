<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Consultas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Doutor</th>
                        <th scope="col">Paciente</th>
                        <th scope="col">Email</th>
                        <th scope="col">Motivo</th>
                        <th scope="col">Doença</th>
                        <th scope="col">Data</th>
                        <th scope="col">Hora</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($consults as $consult)
                    <tr>
                    <th>{{$consult->user->name}}</th>
                    <th scope="row">{{$consult->pacient->name}}</th>
                    <th>{{$consult->pacient->email}}</th>
                    <td>{{$consult->reason}}</td>
                    <td>{{$consult->sickness}}</td>
                    <td>{{$consult->date}}</td>
                    <td>{{$consult->hour}}</td>
                    <td>
                        <a
                            type="button"
                            class="btn btn-danger"
                            href="{{ route('consult_delete', ['id' => $consult->id]) }}">
                            Deletar
                        </a>
                    </td>
                    <td>
                        <a
                            type="button"
                            class="btn btn-info"
                            href="{{ route('consult_edit_form', ['id' => $consult->id]) }}">Editar
                        </a>
                    </td>
                    @endforeach
                </tr>
                </tbody>

            </table>
                <a type="button" class="btn btn-success" href="{{ route('consult_create_form') }}">Agendar Consulta</a>
            </div>
            @if(session('msg'))
                <div class="alert alert-success" role="alert">
                    {{session('msg')}}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
