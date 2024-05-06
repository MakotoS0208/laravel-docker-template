<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    //
    public function index()
    {
        $todo = new Todo();
        $todoList = $todo->all();
       
        return view('todo.index', ['todoList' => $todoList]);
    }
    public function create()
    {
    // TODO: 第1引数を指定
    return view('todo.create'); // 追記
    }

    public function store(Request $request) // 追記
{
    $inputs = $request->all(); // 変更
    dd($inputs);

    $content = $request->input('content'); // 追記
     // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
     $todo = new Todo();
     // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入
     $todo->fill($inputs); // 変更
     // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
     $todo->save();

     return redirect()->route('todo.index'); // 追記
}
}

