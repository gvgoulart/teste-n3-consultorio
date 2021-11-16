<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('$pacient->name') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method="GET" action="{{route('pacient_edit', ['id' => $pacient->id])}}">
                @csrf
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" value="{{$pacient->name}}"name="name"placeholder="Nome do paciente" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email"  value="{{$pacient->email}}" class="form-control"  name="email" placeholder="Email do paciente" required>
                </div>
                <div class="form-group">
                    <label class="form-check-label">CPF do paciente</label>
                    <input type="text" value="{{$pacient->cpf}}" class="form-control" name="cpf">
                </div>
                <div class="form-group">
                    <label class="form-check-label">Endereço</label>
                    <input type="text" value="{{$pacient->adress}}" class="form-control" name="adress">
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
