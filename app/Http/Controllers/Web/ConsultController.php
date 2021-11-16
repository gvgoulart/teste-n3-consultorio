<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Consult;
use App\Models\Pacients;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ConsultController extends Controller
{
    public function getAll() {
        $consults = '';
        $consults = Consult::all();
        $all = true;

        return view('consult/all', ['consults' => $consults, 'all' => $all]);
    }
    public function delete($id) {

        if(User::find(Auth::user()->id)){
            if(Consult::find($id)) {
                Consult::find($id)->delete();

                return redirect()->back()->with('msg', 'Consulta excluida com sucesso!');
            } else {
                return redirect()->back()->with('error', 'Nenhuma consulta');
            }
        } else {
            return response(['message' => 'Você não tem permissão para deletar uma consulta!'], 404);
        }
    }

    public function createForm() {
        $pacients = '';
        $pacients = Pacients::all();

        return view('consult/form', ['pacients' => $pacients]);
    }

    public function create(Request $request) {
        $data = $request->all();

        $validator = Validator::make($data, [
            'pacient' => 'required',
            'reason' => 'required|string|max:255',
            'sickness' => 'required|string|max:255',
            'date' => 'required|date|max:255',
            'hour' => 'required'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Erro de validação']);
        } else {
            //cria a consulta
            $consult = Consult::create([
                'user_id' => Auth::user()->id,
                'pacient_id' => $request->pacient,
                'reason' => $request->reason,
                'sickness' => $request->sickness,
                'date' => $request->date,
                'hour' => $request->hour
            ]);
            
            return redirect()->back()->with('msg', 'Consulta criada com sucesso!');

        }
    }
    public function editForm($id) {
        $consult = Consult::findOrFail($id);
        $date = DateTime::createFromFormat("Y-m-d H:i:s", "$consult->date")->format("d/m/Y");

        $data['consult'] = $consult;
        $data['date'] = $date;

        return view('consult/edit', ['data' => $data]);
    }
    public function edit(Request $request, $id) {
        if(User::find(Auth::user()->id)){
            $data = $request->all();

            $validator = Validator::make($data, [
                'reason' => 'required|string|max:255',
                'sickness' => 'required|string|max:255',
                'date' => 'required|date|max:255',
                'hour' => 'required'
            ]);

            if($validator->fails()){
                return response(['error' => $validator->errors(), 'Erro de validação']);
            }

            $reason = $request->reason;
            $sickness = $request->sickness;
            $date = $request->date;
            $hour = $request->hour;

            Consult::find($id)->update([
                'reason'=>$reason,
                'sickness'=>$sickness,
                'date'=>$date,
                'hour'=>$hour
            ]);
            $consult = Consult::find($id);

            $consult->save();
            return redirect()->back()->with('msg', 'Consulta editada com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Algo deu errado no formulário!');
        }
    }
}
