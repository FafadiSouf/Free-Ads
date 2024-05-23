<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        // Vérifier si l'utilisateur est authentifié
        if (Auth::check()) {
            // Vérifier si l'e-mail de l'utilisateur a déjà été vérifié
            if ($request->user()->hasVerifiedEmail()) {
                return redirect()->intended(RouteServiceProvider::HOME);
            }

            // Envoyer la notification de vérification par e-mail
            $request->user()->sendEmailVerificationNotification();

            // Rediriger avec un message de statut
            return back()->with('status', 'verification-link-sent');
        } else {
            // Rediriger vers une page d'erreur ou gérer le cas où l'utilisateur n'est pas authentifié
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour effectuer cette action.');
        }
    }
}