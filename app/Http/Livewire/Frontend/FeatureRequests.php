<?php

namespace App\Http\Livewire\Frontend;

use App\Models\FeatureRequest;
use App\Models\Vote;
use Livewire\Component;

class FeatureRequests extends Component
{
    public $project_id, $status, $showSubmitForm = false, $title, $description;

    protected $rules = [
        'title' => 'required|max:255',
        'description' => 'required',
    ];

    public function render()
    {
        $data['features_requests'] = FeatureRequest::where('project_id', $this->project_id)->when($this->status && $this->status != 'all', function($query){
                return $query->where('status', $this->status);
            })
            ->latest()
            ->paginate(20);

        $data['features_requests_data'] = FeatureRequest::where('project_id', $this->project_id)->get();
        $data['counts'] = [
            'all' => $data['features_requests_data']->count(),
            'pending' => $data['features_requests_data']->where('status', 'pending')->count(),
            'inprogress' => $data['features_requests_data']->where('status', 'inprogress')->count(),
            'complete' => $data['features_requests_data']->where('status', 'complete')->count(),
        ];

        return view('livewire.frontend.feature-requests', $data);
    }

    public function mount(){
        $this->project_id = request()->project->id;
    }

    public function changeStatus($type){
        $this->status = $type;
    }

    public function upVote(FeatureRequest $feature){
        $vote_exists = Vote::where(['feature_request_id' => $feature->id, 'ip' => request()->ip()])->exists();

        if (!$vote_exists) {
            $feature->votes()->create(['type' => 'up', 'ip' => request()->ip()]);
            $feature->increment('vote');
        }
    }

    public function downVote(FeatureRequest $feature){
        $vote_exists = Vote::where(['feature_request_id' => $feature->id, 'ip' => request()->ip()])->exists();

        if (!$vote_exists) {
            $feature->votes()->create(['type' => 'down', 'ip' => request()->ip()]);
            $feature->decrement('vote');
        }
    }

    public function submitRequest(){
        $this->validate();

        FeatureRequest::create([
            'project_id' => $this->project_id,
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $this->reset(['title', 'description', 'showSubmitForm']);
    }


}
