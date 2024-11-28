<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteUserController extends Controller
{
    /**
     * Display the delete view.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('auth.delete-account');
    }

    /**
     * Delete the authenticated user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $user = $request->user();

        // Ensure the user is authenticated
        if ($user) {
            $user->delete(); // Delete the user's account
            Auth::guard('web')->logout(); // Log out the user

            $request->session()->invalidate(); // Invalidate the session
            $request->session()->regenerateToken(); // Regenerate the CSRF token

            return redirect('/')->with('status', 'Your account has been deleted successfully.');
        }

        return redirect('/')->withErrors(['error' => 'User not authenticated.']);
    }
}
