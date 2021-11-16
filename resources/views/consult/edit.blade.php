<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar uma Consulta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method="GET" action="{{route('consult_edit', ['id' => $data['consult']->id])}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Motivo</label>
                    <input type="text" value="{{$data['consult']->reason}}" class="form-control" name="reason"placeholder="Qual motivo da consulta" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Doença</label>
                    <input type="text" value="{{$data['consult']->sickness}}" class="form-control"  name="sickness" placeholder="Qual doença do paciente" required>
                </div>
                <div class="form-check">
                    <input type="date" name="date" value="{{$data['date']}}" required>
                    <label class="form-check-label" >A consulta está agendada para {{$data['date']}}</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
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
    </div>
</x-app-layout>
