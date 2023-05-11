<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\FeatureRequest;

class FeatureRequests extends Component
{
    public $status, $title, $description;

    public function render()
    {
        $data['features_requests'] = FeatureRequest::when($this->status && $this->status != 'all', function($query){
            return $query->where('status', $this->status);
        })
        ->latest()
        ->paginate(20);

        // $data['features_requests_data'] = FeatureRequest::all();
        // $data['counts'] = [
        //     'all' => $data['features_requests_data']->count(),
        //     'pending' => $data['features_requests_data']->where('status', 'pending')->count(),
        //     'inprogress' => $data['features_requests_data']->where('status', 'inprogress')->count(),
        //     'complete' => $data['features_requests_data']->where('status', 'complete')->count(),
        // ];

        return view('livewire.backend.feature-requests', $data);
    }
}
