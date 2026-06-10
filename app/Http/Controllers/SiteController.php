<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        return view('welcome');
    }
    public function contact()
    {
        return view('contact');
    }

    public function submitForm()
    {
        return view('form');
    }
    public function submitEditForm($id)
    {
        dump($id);
        return view('formEdit', [
            'user' => $id
        ]);
    }
    public function store(Request $request)
    {
        dump(
            $request->all(),
            $request->only(['name', 'email']),
            $request->except(['token']),
        );
    }

    public function update($user, Request $request)
    {
        // O $user identifica o objeto que estamos atualizando
        // Na request vem as informações que serão inseridas no banco, atualizadas.
        // Ao receber essas informações poderíamos fazer uma série de execuções vinculadas aos dados
        // nesse caso ao submetermos as informações no formulário eles irão compor o Request
        dump(
            $user,
            $request->all(),
            $request->only(['name', 'email']),
            $request->except(['token']),
        );
    }

    public function userComments($id, $comment): void {
        dump($id, $comment);
    }

    public function show(User $user): void
    {
        dump($user);
    }

    public function showEmail(User $user): void
    {
        dump($user);
    }
}
