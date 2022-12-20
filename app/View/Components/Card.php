<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    /**
     * The category.
     *
     * @var object
     */
    public $category;

    /**
     * The product.
     *
     * @var object
     */
    public $product;

    /**
     * Create a new component instance.
     *
     * @param object $category
     * @param object $product
     * @return void
     */
    public function __construct($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card');
    }
}
