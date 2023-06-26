@component('mail::message')
# Bienvenue dans notre application

Bonjour {{ $data['nom'] }} {{  }}{{ $data['prenom'] }},

Voici votre ID et votre mot de passe :

- ID: {{ $data['matricule'] }}
- Mot de passe: {{ $data['password'] }}

Merci d'avoir rejoint notre application !


L'équipe de l'application
@endcomponent