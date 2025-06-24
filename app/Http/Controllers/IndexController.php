<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Rubric;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    function index()
    {
        $posts = Post::all();
        $rubrics = Rubric::all();

        return view('index', ['posts' => $posts, 'rubrics' => $rubrics]);
    }

    function rubrika(int $rubrics_id)
    {
        $rubric_name = Rubric::findOrFail($rubrics_id)->name;
        $rubrics = Rubric::all();
        $posts = Post::where('rubric_id', '=', $rubrics_id)->get();

        return view('rubrika', ['rubrics' => $rubrics, 'header' => $rubric_name, 'posts' => $posts]);
    }

    function statya(int $rubrics_id, int $post_id)
    {
        $rubric_name = Rubric::findOrFail($rubrics_id)->name;
        $post = Post::where('rubric_id', $rubrics_id)->where('id', $post_id)->firstOrFail();
        $rubrics = Rubric::all();

        return view('statya', ['post' => $post, 'rubrics' => $rubrics, 'header' => $rubric_name]);
    }

    function auth()
    {
        $rubrics = Rubric::all();

        return view('auth', ['rubrics' => $rubrics]);
    }

    function authUser(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|max:255|exists:users,email',
            'password' => 'required|string|min:8|max:255',
        ], [
            'email.required' => 'Введите email для входа.',
            'email.max' => 'Email не должен превышать 255 символов.',
            'email.exists' => 'Пользователь с таким email не найден.',

            'password.required' => 'Введите пароль.',
            'password.string' => 'Пароль должен быть строкой.',
            'password.min' => 'Пароль должен содержать минимум 8 символов.',
            'password.max' => 'Пароль не должен превышать 255 символов.',
        ]);

        Auth::attempt($validated);

        return redirect(route('home'));
    }

    function registration()
    {
        $rubrics = Rubric::all();

        return view('registration', ['rubrics' => $rubrics]);
    }

    function registerUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|max:255',
        ], [
            'name.required' => 'Пожалуйста, введите ваше имя.',
            'name.string' => 'Имя должно быть строкой.',
            'name.max' => 'Имя не должно превышать 255 символов.',

            'email.required' => 'Пожалуйста, укажите электронную почту.',
            'email.email' => 'Введите корректный email.',
            'email.unique' => 'Пользователь с таким email уже зарегистрирован.',

            'password.required' => 'Пожалуйста, введите пароль.',
            'password.string' => 'Пароль должен быть строкой.',
            'password.min' => 'Пароль должен содержать минимум 8 символов.',
            'password.max' => 'Пароль не должен превышать 255 символов.',
        ]);

        $user = new User();
        $user['name'] = $validated['name'];
        $user['email'] = $validated['email'];
        $user['password'] = bcrypt($validated['password']);
        $user['is_admin'] = 0;
        $user->save();

        Auth::attempt($validated);

        return redirect(route('home'));
    }

    function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }
}
