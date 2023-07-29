<?php

namespace App\View\Components;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;
use Illuminate\View\View;

class Select extends Component
{
  /**
   * Create the component instance.
   */
  public function __construct(
    public Collection $options,
    public int $selected
  ) {
  }

  /**
   * Get the view / contents that represents the component.
   */
  public function render(): View
  {
    return view('components.select');
  }
}
