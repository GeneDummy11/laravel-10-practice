<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request)
    {
        //store file path in a variable
        $path = $request->file('avatar')->store('avatars', 'public');

        //update avatar column
        auth()->user()->update(['avatar' => $path]);

        return redirect(route('profile.edit'))->with(['message' => 'Avatar successfully updated.']);
    }
}
