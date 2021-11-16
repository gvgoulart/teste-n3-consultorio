<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    Bem vindo ao consultórioApp!
            </h1>
            <x-jet-section-border />
            <h3 class="text-lg font-medium text-gray-900">
                Esta aplicação foi feita com Laravel, Jetstream, Passport e Laradock.
                Os arquivos docker file e o JSON do insomnia para testes estão todos no <a href="https://github.com/gvgoulart/teste-n3-consultorio">git!</a>
            </h3>
            <h3 class="text-lg font-medium text-gray-900">
                Caso queira utilizar a seeder, ela criará alguns usuários, consultas e também pacientes para testes.
                "php artisan db:seed"
            </h3>
            <h3 class="text-lg font-medium text-gray-900">
                Não esqueça de rodar "php artisan passport:install"
            </h3>
        </div>
    </div>
</x-app-layout>
