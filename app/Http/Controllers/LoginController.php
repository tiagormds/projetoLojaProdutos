<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function entrar(Request $request){

        $dados = $request->all();

        if(Auth::attempt(['email'=>$dados['email'], 'password'=>$dados['password']])){
//            dd('aqui');
            return redirect()->route('produtos.index');
        }else{
            return redirect()->route('login');
        }
    }

    public function sair(){
        Auth::logout();

        return redirect()->route('login');
    }
}
