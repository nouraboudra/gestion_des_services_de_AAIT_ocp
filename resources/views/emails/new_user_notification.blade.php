@component('mail::message')
# Bienvenue dans notre application

Bonjour {{ $data['matricule'] }},

Voici votre ID et votre mot de passe :

- ID: {{ $data['matricule'] }}
- Mot de passe: {{ $data['password'] }}

Merci d'avoir rejoint notre application !

Merci,
L' équipe de l'application
@endcomponent