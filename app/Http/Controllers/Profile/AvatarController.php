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
        $path = $request->file('avatar')->store('avatars');

        //update avatar column
        auth()->user()->update(['avatar' => storage_path('app')."/$path"]);

        return redirect(route('profile.edit'));
    }
}
