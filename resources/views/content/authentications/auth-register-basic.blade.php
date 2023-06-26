@extends('layouts/blankLayout')

@section('title', 'Register')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
<style>
    .step-indicator {
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin-bottom: 20px;
    }

    .step-circle {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #000;
        font-size: 14px;
        font-weight: bold;
    }

    .step-line {
        flex-grow: 1;
        height: 4px;
        background-color: #ddd;
    }

    .step-circle.active-step,
    .step-line.active-line {
        background-color: #696cff;
        color: #fff;
    }

</style>

@endsection


@section('content')
<div class="container-md">
    <div class="authentication-wrapper containermd-md mx-auto" style="padding-top: 50px;">
        <div class="authentication-inner">

            <!-- Register Card -->
            <div class="card col-md-8 offset-md-2">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand text-center mb-4">
                        <a href="{{ url('auth/login-basic') }}" class="app-brand-link">
                            <img src="{{ asset('assets/img/app/logo.png') }}" alt="Logo" style="width: 30%;">
                        </a>
                    </div>
                    <!-- /Logo -->
                    <div class="step-indicator">
                        <div class="step-circle active-step">1</div>
                        <div class="step-line"></div>
                        <div class="step-circle">2</div>
                        <div class="step-line"></div>
                        <div class="step-circle">3</div>
                        <div class="step-line"></div>
                        <div class="step-circle">4</div>
                    </div>

                    <form id="formAuthentication" class="mb-3" action="{{ route('post-auth-register-basic') }}" method="POST">
                        @csrf


                        <!-- Step 1 -->
                        <div class="form-step" id="step1">

                            <div class="mb-3">
                                <label for="CIN" class="form-label">CIN</label>
                                <input type="text" required readonly class="form-control" value="{{ old('CIN', $ecoUser->CIN ? $ecoUser->CIN : '') }}" id="CIN" name="CIN" placeholder="Entrez votre CIN" autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $ecoUser->candidat->user->email ? $ecoUser->candidat->user->email : '') }}" placeholder="Entrez votre email">
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Mot de passe</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" required id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="button" class="btn btn-primary" id="nextButtonStep1">Next</button>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="form-step" id="step2">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="Type_contrat" class="form-label">Type de contrat</label>
                                    <select class="form-select" required id="Type_contrat" name="Type_contrat">
                                        <option value="" selected disabled>Choisissez une option</option>
                                        <option {{ $ecoUser->Type_contrat == 'CDI' ? 'selected' : '' }} value="CDI">CDI
                                        </option>
                                        <option {{ $ecoUser->Type_contrat == 'CDD' ? 'selected' : '' }} value="CDD">
                                            CDD</option>
                                        <option {{ $ecoUser->Type_contrat == 'Stage' ? 'selected' : '' }} value="Stage">
                                            Stage</option>
                                        <option {{ $ecoUser->Type_contrat == 'Freelance' ? 'selected' : '' }} value="Freelance">Freelance</option>
                                        <option value="Autre">Autre</option>
                                    </select>
                                    <input type="text" class="form-control mt-2" id="Type_contrat_autre" name="Type_contrat_autre" placeholder="Entrez autre type de contrat" style="display: none;">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Niveau_scolaire" class="form-label">Niveau scolaire</label>
                                    <select class="form-select" id="Niveau_scolaire" name="Niveau_scolaire">
                                        <option value="" selected disabled>Choisissez une option</option>
                                        <option {{ $ecoUser->Niveau_scolaire == 'Primaire' ? 'selected' : '' }} value="Primaire">Primaire</option>
                                        <option {{ $ecoUser->Niveau_scolaire == 'Collège' ? 'selected' : '' }} value="Collège">Collège</option>
                                        <option {{ $ecoUser->Niveau_scolaire == 'Lycée' ? 'selected' : '' }} value="Lycée">Lycée</option>
                                        <option {{ $ecoUser->Niveau_scolaire == 'Université' ? 'selected' : '' }} value="Université">Université</option>
                                        <option value="Autre">Autre</option>
                                    </select>
                                    <input type="text" class="form-control mt-2" id="Niveau_scolaire_autre" name="Niveau_scolaire_autre" placeholder="Entrez autre niveau scolaire" style="display: none;">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Diplôme" class="form-label">Diplôme</label>
                                    <select class="form-select" id="Diplôme" name="Diplôme">
                                        <option value="" selected disabled>Choisissez une option</option>
                                        <option {{ $ecoUser->Diplôme == 'Bac' ? 'selected' : '' }} value="Bac">Bac
                                        </option>
                                        <option {{ $ecoUser->Diplôme == 'Licence' ? 'selected' : '' }} value="Licence">
                                            Licence</option>
                                        <option {{ $ecoUser->Diplôme == 'Master' ? 'selected' : '' }} value="Master">
                                            Master</option>
                                        <option {{ $ecoUser->Diplôme == 'Doctorat' ? 'selected' : '' }} value="Doctorat">Doctorat</option>
                                        <option value="Autre">Autre</option>
                                    </select>
                                    <input type="text" class="form-control mt-2" id="Diplôme_autre" name="Diplôme_autre" placeholder="Entrez autre diplôme" style="display: none;">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Spécialité" class="form-label">Spécialité</label>
                                    <select class="form-select" id="Spécialité" name="Spécialité">
                                        <option value="" selected disabled>Choisissez une option</option>
                                        <option {{ $ecoUser->Spécialité == 'Informatique' ? 'selected' : '' }} value="Informatique">Informatique</option>
                                        <option {{ $ecoUser->Spécialité == 'Finance' ? 'selected' : '' }} value="Finance">Finance</option>
                                        <option {{ $ecoUser->Spécialité == 'Marketing' ? 'selected' : '' }} value="Marketing">Marketing</option>
                                        <option {{ $ecoUser->Spécialité == 'Ressources humaines' ? 'selected' : '' }} value="Ressources humaines">Ressources humaines</option>
                                        <option value="Autre">Autre</option>
                                    </select>
                                    <input type="text" class="form-control mt-2" id="Spécialité_autre" name="Spécialité_autre" placeholder="Entrez autre spécialité" style="display: none;">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="button" class="btn btn-primary" id="previousButtonStep2">Previous</button>
                                <button type="button" class="btn btn-primary" id="nextButtonStep2">Next</button>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="form-step" id="step3">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="Langues" class="form-label">Deuxième Langue</label>
                                    <select class="form-select" id="Langues" name="Langues">
                                        <option value="" selected disabled>Choisissez une option</option>
                                        <option {{ $ecoUser->Langues == 'Français' ? 'selected' : '' }} value="Français">Français</option>
                                        <option {{ $ecoUser->Langues == 'Arabe' ? 'selected' : '' }} value="Arabe">
                                            Arabe</option>
                                        <option {{ $ecoUser->Langues == 'Anglais' ? 'selected' : '' }} value="Anglais">
                                            Anglais</option>
                                        <option value="Autre">Autre</option>
                                    </select>
                                    <input type="text" class="form-control mt-2" id="Langues_autre" name="Langues_autre" placeholder="Entrez autre langue" style="display: none;">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="annees_experience" class="form-label">Année d'expérience</label>
                                    <input type="number" min="0" max="40" class="form-control mt-2" id="annees_experience" name="annees_experience" value="{{ old('annees_experience', $ecoUser->annees_experience ? $ecoUser->annees_experience : '') }}" placeholder="Entrez années d'expérience">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Entreprise_actuelle" class="form-label">Entreprise actuelle</label>
                                    <input type="text" class="form-control" id="Entreprise_actuelle" value="{{ old('Entreprise_actuelle', $ecoUser->Entreprise_actuelle ? $ecoUser->Entreprise_actuelle : '') }}" name="Entreprise_actuelle" placeholder="Entrez votre entreprise actuelle" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Poste_actuellement_occupe" class="form-label">Poste actuellement
                                        occupé</label>
                                    <input type="text" class="form-control" id="Poste_actuellement_occupe" value="{{ old('Poste_actuellement_occupe', $ecoUser->Poste_actuellement_occupe ? $ecoUser->Poste_actuellement_occupe : '') }}" name="Poste_actuellement_occupe" placeholder="Entrez votre poste actuel" required>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="button" class="btn btn-primary" id="previousButtonStep3">Previous</button>
                                <button type="button" class="btn btn-primary" id="nextButtonStep3">Next</button>
                            </div>
                        </div>



                        <!-- Step 4 -->
                        <div class="form-step" id="step4">

                            <div class="row">

                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="Anciennete" class="form-label">Ancienneté</label>
                                    <input type="number" min="0" max="40" class="form-control" id="Anciennete" value="{{ old('Anciennete', $ecoUser->Anciennete ? $ecoUser->Anciennete : '') }}" name="Anciennete" placeholder="Entrez votre ancienneté">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Organismes_de_diplôme" class="form-label">Organismes de
                                        diplôme</label>
                                    <input type="text" class="form-control" id="Organismes_de_diplôme" value="{{ old('Organismes_de_diplôme', $ecoUser->Organismes_de_diplôme ? $ecoUser->Organismes_de_diplôme : '') }}" name="Organismes_de_diplôme" placeholder="Entrez les organismes de diplôme">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="Organisme_de_formation" class="form-label">Organisme de
                                        formation</label>
                                    <input type="text" class="form-control" id="Organisme_de_formation" value="{{ old('Organisme_de_formation', $ecoUser->Organisme_de_formation ? $ecoUser->Organisme_de_formation : '') }}" name="Organisme_de_formation" placeholder="Entrez l'organisme de formation">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="Societe" class="form-label">Société</label>
                                    <input type="text" class="form-control" required id="Societe" value="{{ old('Societe', $ecoUser->Societe ? $ecoUser->Societe : '') }}" name="Societe" placeholder="Entrez la Société">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" required type="checkbox" id="terms-conditions" name="terms">
                                        <label class="form-check-label" for="terms-conditions">
                                            J'accepte les
                                            <a href="javascript:void(0);" id="showModalLink">politique de
                                                confidentialité et les conditions</a>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="button" class="btn btn-primary" id="previousButtonStep4">Previous</button>
                                <button type="submit" class="btn btn-primary">S'inscrire</button>
                                <!-- Modal -->
                                <div class="modal fade" id="modalScrollable" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalScrollableTitle">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>En cliquant sur "J'accepte", vous consentez à ce que vos informations
                                                    personnelles soient stockées par OCP (Organization Confidentialité
                                                    Protectrice) conformément à notre politique de confidentialité et à
                                                    nos conditions.</p>
                                                <p>OCP s'engage à protéger votre vie privée et à utiliser vos
                                                    informations de manière responsable. Veuillez prendre le temps de
                                                    lire attentivement notre politique de confidentialité et nos
                                                    conditions d'utilisation avant de donner votre consentement.</p>
                                                <p>Nous collectons des informations telles que votre nom, votre adresse
                                                    e-mail, votre numéro de téléphone et d'autres données personnelles
                                                    nécessaires pour vous fournir nos services et répondre à vos
                                                    demandes. Ces informations sont stockées en toute sécurité dans nos
                                                    bases de données et ne sont utilisées que dans le cadre des
                                                    activités de l'organisation OCP.</p>
                                                <p>Vos informations personnelles ne seront jamais vendues, partagées ou
                                                    louées à des tiers sans votre consentement explicite. Nous prenons
                                                    des mesures appropriées pour protéger vos données contre tout accès
                                                    non autorisé ou toute divulgation.</p>
                                                <p>En donnant votre consentement, vous reconnaissez avoir lu, compris et
                                                    accepté notre politique de confidentialité et nos conditions
                                                    d'utilisation. Vous avez également le droit de retirer votre
                                                    consentement à tout moment en nous contactant ou en utilisant les
                                                    options de désinscription fournies. hhhhh</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                                                <button type="button" class="btn btn-primary">J'accepte</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>Already have an account?</span>
                        <a href="{{ url('auth/login-basic') }}">
                            <span>Sign in instead</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- Register Card -->
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/form-registration.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function updateProgressBar(step) {
            $('.step-circle, .step-line').removeClass('active-step active-line');
            $('.step-circle').each(function(index) {
                if (index < step) {
                    $(this).addClass('active-step');
                    if (index != step - 1 && $(this).next('.step-line').length > 0) {
                        $(this).next('.step-line').addClass('active-line');
                    }
                }
            });
        }
        // Initially, only the first step should be visible
        $('.form-step').hide();
        $('#step1').show();

        // Step 1 is initially active
        $('#stepIndicator1').addClass('active-step');

        $('#nextButtonStep1').click(function() {
            $('#step1').hide();
            $('#step2').show();
            $('#stepIndicator1').removeClass('active-step');
            $('#stepIndicator2').addClass('active-step');
            updateProgressBar(2);

        });

        $('#nextButtonStep2').click(function() {
            $('#step2').hide();
            $('#step3').show();
            $('#stepIndicator2').removeClass('active-step');
            $('#stepIndicator3').addClass('active-step');
            updateProgressBar(3);

        });

        $('#nextButtonStep3').click(function() {
            $('#step3').hide();
            $('#step4').show();
            $('#stepIndicator3').removeClass('active-step');
            $('#stepIndicator4').addClass('active-step');
            updateProgressBar(4);

        });

        $('#previousButtonStep2').click(function() {
            $('#step2').hide();
            $('#step1').show();
            $('#stepIndicator2').removeClass('active-step');
            $('#stepIndicator1').addClass('active-step');
            updateProgressBar(1);

        });

        $('#previousButtonStep3').click(function() {
            $('#step3').hide();
            $('#step2').show();
            $('#stepIndicator3').removeClass('active-step');
            $('#stepIndicator2').addClass('active-step');
            updateProgressBar(2);

        });

        $('#previousButtonStep4').click(function() {
            $('#step4').hide();
            $('#step3').show();
            $('#stepIndicator4').removeClass('active-step');
            $('#stepIndicator3').addClass('active-step');
            updateProgressBar(3);

        });
    });

    // DOM Ready
    $(function() {
        // Hide all form steps except the first one
        $('.form-step').not('#step1').hide();

        // Handle next button click
        $('#nextButton').on('click', function() {
            // Get the current step
            var currentStep = $('.form-step:visible');

            // Perform validation for the current step
            if (validateStep(currentStep)) {
                // Hide the current step
                currentStep.hide();

                // Get the ID of the next step
                var nextStepId = currentStep.next('.form-step').attr('id');

                // Show the next step
                $('#' + nextStepId).show();
            }
        });

        // Function to validate a step
        function validateStep(step) {
            // Perform validation for each input field in the current step
            var isValid = true;
            step.find('input, select').each(function() {
                // Perform validation for each input/select field
                // Add your validation logic here
                if ($(this).val() === '') {
                    // Display error message or apply error styling
                    isValid = false;
                }
            });

            return isValid;
        }
    });

</script>
<script>
    // DOM Ready
    $(function() {
        // Hide all form steps except the first one
        $('.form-step').not('#step1').hide();

        // Handle next button click for each step
        $('#nextButtonStep1').on('click', function() {
            showNextStep('#step1', '#step2');
        });

        $('#nextButtonStep2').on('click', function() {
            showNextStep('#step2', '#step3');
        });

        $('#nextButtonStep3').on('click', function() {
            showNextStep('#step3', '#step4');
        });

        $('#nextButtonStep4').on('click', function() {
            showNextStep('#step4', '#step5');
        });

        // Handle previous button click for each step
        $('#previousButtonStep2').on('click', function() {
            showPreviousStep('#step2', '#step1');
        });

        $('#previousButtonStep3').on('click', function() {
            showPreviousStep('#step3', '#step2');
        });

        $('#previousButtonStep4').on('click', function() {
            showPreviousStep('#step4', '#step3');
        });

        $('#previousButtonStep5').on('click', function() {
            showPreviousStep('#step5', '#step4');
        });

        // Function to show the next step and hide the current step
        function showNextStep(currentStepSelector, nextStepSelector) {
            var currentStep = $(currentStepSelector);
            var nextStep = $(nextStepSelector);

            if (validateStep(currentStep)) {
                currentStep.hide();
                nextStep.show();
            }
        }

        // Function to show the previous step and hide the current step
        function showPreviousStep(currentStepSelector, previousStepSelector) {
            var currentStep = $(currentStepSelector);
            var previousStep = $(previousStepSelector);

            currentStep.hide();
            previousStep.show();
        }

        // Function to validate the form fields for a given step
        function validateStep(step) {
            // Add your validation logic here
            return true;
        }
    });

</script>
@endsection
