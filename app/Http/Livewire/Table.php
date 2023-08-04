<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

abstract class Table extends Component
{
    use WithPagination;

    public $perPage = 2;
    public $search = '';
    public $createUrl = '';
    protected $queryString = ['search'];


    public $page = 1;
    public abstract function query(): \Illuminate\Database\Eloquent\Builder;
    public abstract function columns(): array;
    public function data()
    {
        return $this
            ->query()
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.table');
    }
}
