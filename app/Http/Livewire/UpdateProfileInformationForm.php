<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Profile\UpdateUserProfileInformation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProfileInformationForm extends Component
{
    use WithFileUploads;

    /*
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    /*
     * The new avatar for the user.
     *
     * @var mixed
     */
    public $photo;

    /*
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {

        $this->state = Auth::user()->withoutRelations()->toArray();
    }

    /*/**
     * Update the user's Profile information.*/

    public function updateProfileInformation(UpdateUserProfileInformation $updater)
    {
        $this->resetErrorBag();
        $updater->update(
            Auth::user(),
            $this->photo
                ? array_merge($this->state, ['photo' => $this->photo])
                : $this->state
        );


       /* if (isset($this->photo)) {
            return redirect()->route('profile.show');
        }*/

        $this->emit('saved');

        $this->emit('refresh-navbar',route('profile.show'));
    }



    /*
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {
        return Auth::user();
    }

    /*
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('Profile.update-Profile-information-form');
    }
}
