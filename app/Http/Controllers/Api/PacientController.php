<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pacients;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class PacientController extends Controller
{
    public function create(Request $request){
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pacients',
            'adress' => 'required|string|max:255',
            'cpf' => 'required|unique:pacients|max:12'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Erro de validação']);
        }

        //cria o usuário
        $pacient = Pacients::create([
            'name' => $request->name,
            'email' => $request->email,
            'adress' => $request->adress,
            'cpf' => $request->cpf
        ]);

        return response([ 'pacient' => $pacient, 'message' => 'Paciente criado com sucesso'], 200);
    }
    public function getAll() {
        $pacients = Pacients::all();

        return response(['pacients' => $pacients], 200);
    }

    public function getPacient($id) {
        if (Pacients::where('id', $id)->exists()) {
            $pacient = Pacients::findOrFail($id);
            return response(['pacient' => $pacient], 200);
        } else {
            return response(['message' => 'Paciente não encontrado!'], 404);
        }
    }

    public function edit(Request $request,$id) {
        if(User::find(Auth::user()->id)){
            $data = $request->all();

            $validator = Validator::make($data, [
                'name' => 'required|max:55',
                'email' => 'email|required|unique:users',
                'adress' => 'required|string|max:255'
            ]);

            if($validator->fails()){
                return response(['error' => $validator->errors(), 'Erro de validação']);
            }

            $name = $request->name;
            $email = $request->email;
            $adress = $request->adress;

            Pacients::find($id)->update([
                'name'=>$name,
                'email'=>$email,
                'adress'=>$adress
            ]);
            $pacient = Pacients::find($id);

            $pacient->save();
            return  response([ 'message' => 'Paciente editado com sucesso'], 200);
        } else {
            return response(['message' => 'Você não tem permissão para atualizar um paciente!'], 400);
        }
    }

    public function delete($id) {

        if(User::find(Auth::user()->id)){
            if(Pacients::find($id)) {
                Pacients::find($id)->delete();

                return  response([ 'message' => 'Paciente excluído com sucesso'], 200);
            } else {
                return response(['message' => 'Paciente não encontrado'], 404);
            }
        } else {
            return response(['message' => 'Você não tem permissão para deletar um paciente!'], 404);
        }
    }
}
