<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BackButton extends Component
{
    public $id;
    public $class;

    public function __construct($id = 'back', $class = 'hover:border rounded-sm w-24 h-10 text-lg transition ease-in dark:hover:bg-blue-500 hover:bg-neutral-400 cursor-pointer border-black dark:border-white')
    {
        $this->id = $id;
        $this->class = $class;
    }

    public function render()
    {
        return view('components.back-button');
    }
}
