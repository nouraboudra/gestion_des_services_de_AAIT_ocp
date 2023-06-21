@extends('layouts/blankLayout')

@section('title', 'Login Basic - Pages')

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand" style="display: flex; justify-content: center;">
                            <a href="{{ url('/') }}" class="app-brand-link gap-2">
                                <span class="demo mx-auto d-block">
                                    <img src="{{ asset('assets/img/app/logo.png') }}" alt="Logo"
                                        style="width: 50%; display: block; margin: 0 auto;">
                                </span>
                            </a>
                        </div>


                        <!-- /Logo -->
                        <h4 class="mb-2">Bienvenue ! 👋</h4>
                        <p class="mb-4">Connectez-vous à votre compte et commencez l'aventure</p>

                        <form id="formAuthentication" class="mb-3" action="{{ route('post-auth-login-basic') }}"
                            method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="ID" class="form-label">ID </label>
                                <input type="text" required class="form-control" id="email" name="matricule"
                                    placeholder="Entrer votre ID" autofocus>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Mot de passe</label>
                                    <a href="{{ url('auth/forgot-password-basic') }}">
                                        <small>Mot de passe oublié ?</small>
                                    </a>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input required type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me">
                                    <label class="form-check-label" for="remember-me">
                                        Souvenez-vous de moi
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100 custom-btn" type="submit"
                                    style="background-color: #002A5C;">Se connecter</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
    </div>
@endsection
