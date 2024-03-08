<?php

namespace App\View\Components\form\addPenyakit;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class gejala extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $id,
        public string $name,
        public int $count, // menghitung ini element ke berapa
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.add-penyakit.gejala');
    }
}
