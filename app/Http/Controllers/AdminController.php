<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Rubric;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function create()
    {
        $rubrics = Rubric::all();

        return view('create', ['rubrics' => $rubrics]);
    }

    function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255', 'regex:/^[\pL\pN\s.,!?()-]+$/u'],
            'lid' => ['required', 'string', 'max:255', 'regex:/^[\pL\pN\s.,!?()-]+$/u'],
            'content' => ['required', 'string', 'min:10', 'max:2048'],
            'rubric_id' => ['required', 'integer', 'exists:rubric,id'],
            'image' => ['required', 'file', 'image', 'max:2048'],
        ], [
            'title.required' => 'Пожалуйста, введите заголовок.',
            'title.string' => 'Заголовок должен быть строкой.',
            'title.max' => 'Заголовок не должен превышать 255 символов.',
            'title.regex' => 'Заголовок содержит недопустимые символы.',

            'lid.required' => 'Пожалуйста, укажите краткое описание.',
            'lid.string' => 'Краткое описание должно быть строкой.',
            'lid.max' => 'Краткое описание не должно превышать 255 символов.',
            'lid.regex' => 'Краткое описание содержит недопустимые символы.',

            'content.required' => 'Контент обязателен для заполнения.',
            'content.string' => 'Контент должен быть строкой.',
            'content.min' => 'Контент должен содержать минимум 10 символов.',
            'content.max' => 'Контент не должен превышать 2048 символов.',

            'rubric_id.required' => 'Пожалуйста, выберите рубрику.',
            'rubric_id.integer' => 'Рубрика должна быть числом.',
            'rubric_id.exists' => 'Выбранной рубрики не существует.',

            'image.required' => 'Загрузите изображение.',
            'image.file' => 'Файл изображения должен быть валидным файлом.',
            'image.image' => 'Файл должен быть изображением.',
            'image.max' => 'Размер изображения не должен превышать 2MB.',
        ]);

        $post = new Post();

        $post->title = $request['title'];
        $post->lid = $request['lid'];
        $post->content = $request['content'];
        $post->rubric_id = $request['rubric_id'];

        $path = $validated['image']->store('images', 'public');
        $post->image = $path;

        $post->save();

        $rubrics = Rubric::all();
        $rubric_name = Rubric::findOrFail($request['rubric_id'])->name;

        return view('statya', ['post' => $post, 'rubrics' => $rubrics, 'header' => $rubric_name]);
    }

    function destroy(int $rubrics_id, int $post_id)
    {
        $post = Post::findOrFail($post_id);
        $post->delete();
        return redirect(route('home'));
    }

    function createRubric()
    {
        $rubrics = Rubric::all();

        return view('rubric', ['rubrics' => $rubrics]);
    }

    function storeRubric(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:rubric,name',
        ], [
            'name.required' => 'Пожалуйста, укажите название рубрики.',
            'name.string' => 'Название рубрики должно быть строкой.',
            'name.max' => 'Название рубрики не должно превышать 255 символов.',
            'name.unique' => 'Такая рубрика уже существует.',
        ]);

        $rubric = new Rubric();
        $rubric->name = $validated['name'];

        $rubric->save();

        return redirect(route('rubrika', ['rubrics_id' => $rubric['id']]));
    }
}
