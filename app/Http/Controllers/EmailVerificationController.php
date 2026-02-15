<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Verified;

class EmailVerificationController extends Controller
{
    public function notice(Request $request)
    {
        return view('auth.verify-email');
    }

    public function verify(Request $request, string $id, string $hash)
    {
      $user = User::findOrFail($id);

      if (! hash_equals(sha1($user->getEmailForVerification()), $hash)) {
          abort(403, 'Invalid verification link.');
      }

      if (! $user->hasVerifiedEmail()) {
          $user->markEmailAsVerified();
          event(new Verified($user));
      }

      Auth::login($user);
        return redirect('/')->with('status', 'Your email has been verified.');
    }

    public function send(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'verification-link-sent');
    }
}