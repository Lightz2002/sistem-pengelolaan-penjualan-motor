<?php

namespace App\Http\Controllers;

use App\Services\SalesService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller {
  private $salesService;

  public function __construct(SalesService $salesService)
  {
      $this->salesService = $salesService;
  }

  public function index()
  {
      $data = $this->salesService->getDashboardData();
      
      return view('dashboard', [
          'data' => $data
      ]);
  }
}