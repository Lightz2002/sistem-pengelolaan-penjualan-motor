<?php

namespace App\View\Components;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;
use Illuminate\View\View;

class Alert extends Component
{
  /**
   * Create the component instance.
   */
  public function __construct(
    public string $type = "success",
  ) {
  }

  /**
   * Get the view / contents that represents the component.
   */
  public function render(): View
  {
    return view('components.alert');
  }
}
