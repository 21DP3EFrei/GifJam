<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade\PDF;;
use App\Models\User;
use App\Models\Media;
use Illuminate\Foundation\Auth\User as AuthUser;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required','current_password'],['current_password'=>__('validation.current_password') ]
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function destroyNoPassword(User $user)
    {
        if (Auth::id() !== $user->id) {
            return redirect()->route('home')->with('error', __('translation.unauthorized'));
        }
        
        Auth::logout(); 
        $user->delete(); 
        
        return redirect('/')->with('success', __('translation.accountDelete'));
    }
    public function viewPDF()
    {
        $data = Media::where('Lietotajs', Auth::id())->get();

        $pdf = PDF::loadview('pdf.user', array('data' => $data));
        
        return $pdf->stream();
    }
    public function downloadPDF()
    {
        $data = Media::where('Lietotajs', Auth::id())->get();

        $pdf = PDF::loadview('pdf.user', array('data' => $data));
        
        return $pdf->download(__('translation.pdfname'));
    }
}
