<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;


class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
//            'email' => ['required', 'string', 'email'],
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    public function authenticate(): void
    {
        //controlla se l'utente non ha superato il limite massimo di tentativi
        $this->ensureIsNotRateLimited();

        //prova l'autenticazione con le credenziali 
        if (! Auth::attempt($this->only('username', 'password'), $this->boolean('remember'))) {
            //incrementa il contatore dei tentativi falliti
            RateLimiter::hit($this->throttleKey());
            //lancia l'eccezione di validazione con un messaggio di errore
            throw ValidationException::withMessages([
                'username' => trans('Le credenziali inserite non sono corrette. Riprova.'),
            ]);
        }
        
        //se l'autenticazione ha successo resetta il contatore dei tentativi falliti
        RateLimiter::clear($this->throttleKey());
    }

    public function ensureIsNotRateLimited(): void
    {
        //controlla se si è ragiunto il caso massimo
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }
        //genera un evento di blocco account
        event(new Lockout($this));
        //conta quanti sencondi restano prima che l'utente possa ripravare
        $seconds = RateLimiter::availableIn($this->throttleKey());
        //lancia un eccezione con un messaggio che indica quanto tempo deve aspettare
        throw ValidationException::withMessages([

            'username' => trans('Troppi tentativi falliti, devi aspettare'),
        ]);
    }

    public function throttleKey(): string
    {
        //genera una chiave unica per il throttling basata sul nome utente e l’indirizzo IP dell’utente. Questo aiuta a tracciare i tentativi di login per utente/IP.
        return Str::transliterate(Str::lower($this->input('username')) . '|' . $this->ip());
    }
}
