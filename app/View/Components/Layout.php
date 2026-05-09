<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * Page title.
     */
    public string $title;

    /**
     * Create a new component instance.
     */
    public function __construct(string $title = '')
    {
        $this->title = $title;
    }

    /**
     * Get the view that represents the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout', [
            'title' => $this->title,
        ]);
    }
}