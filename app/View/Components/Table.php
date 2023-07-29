<?php

namespace App\View\Components;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;
use Illuminate\View\View;

class Table extends Component
{
  /**
   * Create the component instance.
   */
  public function __construct(
    public array $headers,
    public LengthAwarePaginator $datas,
  ) {
  }

  /**
   * Get the view / contents that represents the component.
   */
  public function render(): View
  {
    return view('components.table');
  }
}
