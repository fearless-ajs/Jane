<?php

namespace App\Http\Controllers\View\Mart;

use App\Http\Controllers\Controller;
use App\Models\ActiveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MartViewController extends Controller
{

    public function mart (){
        $data = [
            'title' => 'Jane mart',
            'keywords' => 'Jane mart',
            'description' => 'Jane mart'
        ];
        return view('livewire.mart.pages.index', ['data' => $data]);
    }


}
