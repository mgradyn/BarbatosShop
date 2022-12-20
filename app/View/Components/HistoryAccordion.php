<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HistoryAccordion extends Component
{
    /**
     * The transaction.
     *
     * @var object
     */
    public $transaction;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.history-accordion');
    }
}
