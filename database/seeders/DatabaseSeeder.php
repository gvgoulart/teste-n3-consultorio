<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Douglas Médico',
            'email' => 'doga@teste.com',
            'password' => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'Médico',
            'email' => 'medico@teste.com',
            'password' => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'Médico 2',
            'email' => 'medico2@teste.com',
            'password' => Hash::make('12345678'),
        ]);
        DB::table('pacients')->insert([
            'name' => 'paciente',
            'email' => 'paciente@teste.com',
            'adress' => 'rua da irroba numero 2268',
            'cpf' =>  '33333333333'
        ]);

        DB::table('pacients')->insert([
            'name' => 'paciente dois',
            'email' => 'paciente2@teste.com',
            'adress' => 'segue reto toda via numero 999',
            'cpf' =>  '33335553333'
        ]);
        DB::table('pacients')->insert([
            'name' => 'paciente tres',
            'email' => 'paciente3@teste.com',
            'adress' => 'endereço adress',
            'cpf' =>  '111111111'
        ]);
        DB::table('pacients')->insert([
            'name' => 'paciente quatro',
            'email' => 'paciente4@teste.com',
            'adress' => 'endereço teste',
            'cpf' =>  '335536535333'
        ]);
        DB::table('pacients')->insert([
            'name' => 'paciente cinco',
            'email' => 'paciente5@teste.com',
            'adress' => 'teste de endd',
            'cpf' =>  '11122555'
        ]);
        DB::table('pacients')->insert([
            'name' => 'paciente seis',
            'email' => 'paciente6@teste.com',
            'adress' => '666666666',
            'cpf' =>  '666666'
        ]);
        DB::table('pacients')->insert([
            'name' => 'paciente sete',
            'email' => 'paciente7@teste.com',
            'adress' => 'adress 7',
            'cpf' =>  '7777'
        ]);
        DB::table('pacients')->insert([
            'name' => 'paciente oito',
            'email' => 'paciente8@teste.com',
            'adress' => 'segue 8',
            'cpf' =>  '6515615'
        ]);

        DB::table('consults')->insert([
            'user_id' => '1',
            'pacient_id' => '1',
            'reason' => 'motivo teste 1',
            'sickness' => 'doença teste 1',
            'date' => '2021-09-30'
,        ]);

        DB::table('consults')->insert([
            'user_id' => '2',
            'pacient_id' => '2',
            'reason' => 'motivo teste 2',
            'sickness' => 'doença teste 2',
            'date' => '2021-10-12',
        ]);
    }
}
