<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = 'title',
        public string $desc = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit et, impedit ipsam sequi obcaecati totam laborum cumque, reprehenderit magnam animi labore alias architecto qui perferendis, assumenda officiis accusantium! Odio, laudantium?",
        public string $target = "#",
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
