<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function index()
    {
        return Inertia::render(
            //Vueコンポーネントのパス
            'Index/Index',
            [
                //Vueコンポーネントに渡されるデータ
                'message' => 'Hello from Laravel !',
            ]
        );
    }

    public function show()
    {
        return inertia('Index/Show');
    }
}
