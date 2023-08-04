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

    public $sortBy = 'created_at';

    public $sortDirection = 'desc';



    public $page = 1;
    public abstract function query(): \Illuminate\Database\Eloquent\Builder;
    public abstract function columns(): array;

    public function sort($key)
    {
        $this->resetPage();

        if ($this->sortBy === $key) {
            $direction = $this->sortDirection === 'asc' ? 'desc' : 'asc';
            $this->sortDirection = $direction;

            return;
        }

        $this->sortBy = $key;
        $this->sortDirection = 'asc';
    }

    public function data()
    {
        return $this
            ->query()
            ->when($this->sortBy !== '', function ($query) {
                $query->orderBy($this->sortBy, $this->sortDirection);
            })
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.table');
    }
}
