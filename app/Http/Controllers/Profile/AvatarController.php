<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateAvatarRequest;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request)
    {
        //store file in a folder
        $path = Storage::disk('public')->put('avatars', $request->file('avatar'));

        //check if there is an existing file for avatar, if true, delete the file in the storage folder
        if ($oldAvatar = $request->user()->avatar) {
            Storage::disk('public')->delete($oldAvatar);
        }

        //update avatar column
        auth()->user()->update(['avatar' => $path]);

        return redirect(route('profile.edit'))->with(['message' => 'Successfully updated avatar.']);
    }
}
