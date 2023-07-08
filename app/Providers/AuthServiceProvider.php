<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        VerifyEmail::toMailUsing(function($notifiable, $url) {
            return(new MailMessage)
            ->subject('Verificar Cuenta')
            ->line('Haz clic en el siguiente botón para verificar tu dirección de correo electrónico.')
            ->action('Confirmar Cuenta', $url)
            ->line('Si no creaste una cuenta, no es necesario realizar ninguna otra acción.');
        });
    }
}
