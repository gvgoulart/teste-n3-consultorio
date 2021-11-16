<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agendar uma Consulta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST" action="{{route('consult_create')}}">
                @csrf
            <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <select class="form-select" name="pacient" aria-label="Default select example">
                    <option selected>Escolha um paciente</option>
                        @foreach($pacients as $pacient)
                        <option value="{{$pacient->id}}">{{$pacient->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Motivo</label>
                    <input type="text" class="form-control" name="reason"placeholder="Qual motivo da consulta">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Doença</label>
                    <input type="text" class="form-control"  name="sickness" placeholder="Qual doença do paciente">
                </div>
                <div class="form-group">
                    <input type="date" name="date">
                    <label class="form-check-label">Quando será realizada a consulta</label>
                </div>
                <div class="form-group">
                    <input type="time" name="hour">
                    <label class="form-check-label">Qual horário da consulta</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
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
