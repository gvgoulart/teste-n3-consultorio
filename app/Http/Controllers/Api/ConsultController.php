<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consult;
use App\Models\Pacients;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ConsultController extends Controller
{
    public function create(Request $request, $id) {
        if(User::find(Auth::user()->id)) {
            $pacient = Pacients::find($id);

            if($pacient) {
                $data = $request->all();

                $validator = Validator::make($data, [
                    'reason' => 'required|string|max:255',
                    'sickness' => 'required|string|max:255',
                    'date' => 'required|date|max:255'
                ]);

                if($validator->fails()){
                    return response(['error' => $validator->errors(), 'Erro de validação']);
                }
                $date = date('Y-m-d H-i-s', strtotime($request->date));


                //cria a consulta
                $consult = Consult::create([
                    'user_id' => Auth::user()->id,
                    'pacient_id' => $id,
                    'reason' => $request->reason,
                    'sickness' => $request->sickness,
                    'date' => $date
                ]);

                return response([ 'consult' => $consult, 'message' => 'Consulta criada com sucesso'], 200);

            }else {
                return response(['message' => 'Este paciente não existe!'], 404);
            }
        } else {
            return response(['message' => 'Você não tem permissão para criar uma consulta!'], 400);
        }
    }

    public function getAll() {
        $consults = Consult::where('user_id', Auth::user()->id)->get();

        return response(['consult' => $consults], 200);
    }

    public function getConsult($id) {
        if (Consult::where('id', $id)->exists()) {
            $consult = Consult::findOrFail($id);
            return response(['consult' => $consult], 200);
        } else {
            return response(['message' => 'Consulta não encontrada!'], 404);
        }
    }

    public function edit(Request $request,$id) {
        if(User::find(Auth::user()->id)){
            $data = $request->all();

            $validator = Validator::make($data, [
                'reason' => 'required|string|max:255',
                'sickness' => 'required|string|max:255',
                'date' => 'required|date|max:255'
            ]);

            if($validator->fails()){
                return response(['error' => $validator->errors(), 'Erro de validação']);
            }

            $reason = $request->reason;
            $sickness = $request->sickness;
            $date = $request->date;

            Consult::find($id)->update([
                'reason'=>$reason,
                'sickness'=>$sickness,
                'date'=>$date
            ]);
            $consult = Consult::find($id);

            $consult->save();
            return  response([ 'message' => 'Consulta editada com sucesso'], 200);
        } else {
            return response(['message' => 'Você não tem permissão para atualizar uma consulta!'], 400);
        }
    }

    public function delete($id) {

        if(User::find(Auth::user()->id)){
            if(Consult::find($id)) {
                Consult::find($id)->delete();

                return  response([ 'message' => 'Consulta excluída com sucesso'], 200);
            } else {
                return response(['message' => 'Consulta não encontrada'], 404);
            }
        } else {
            return response(['message' => 'Você não tem permissão para deletar uma Consulta!'], 404);
        }
    }
}
