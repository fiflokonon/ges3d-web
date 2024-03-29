<div>
    <!--
    page header - start
    -->
    <div class="page-header">
        <div class="page-header-wrapper">
            <div class="page-header-inner">
                <div class="container">
                    <div class="row d-lg-flex align-items-lg-end">
                        <div class="col-lg-6">
                            <div class="page-header-content c-white">
                                <h1>Inscrivez-vous</h1>
                                <ul>
                                    <li>
                                        <a href="{{ route('welcome') }}" class="link-underline">
                                            <span>Accueil</span>
                                        </a>
                                    </li>
                                    <li>
                                        <i class="las la-angle-right"></i>
                                        <a href="{{ route('site.register') }}" class="link-underline">
                                            <span>Inscription</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6">
                            <div class="page-header-search">
                                <form>
                                    <input type="text" placeholder="Search">
                                    <button type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="background-pattern background-pattern-1">
                <div class="background-pattern-img background-loop" style="background-image: url(assets/images/patterns/pattern.jpg);"></div>
                <div class="background-pattern-gradient"></div>
                <div class="background-pattern-bottom">
                    <div class="image" style="background-image: url(assets/images/patterns/pattern-1.jpg)"></div>
                </div>
            </div>
        </div>
    </div>
    <!--
    page header - end
    -->
    <!--
    contact form section - start
    -->
    <div class="contact-form-section">
        <div class="contact-form-section-wrapper">
            <div class="container" >
                <div class="row gx-5 contact-form-section-row justify-content-center">
                    <div class="col-lg-6 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
                        <!--
                        contact form - start
                        -->
                        <div class="contact-form drop-shadow-2">
                            <div class="contact-form-wrapper">
                                <div class="section-heading section-heading-2 center">
                                    <div class="sub-heading c-green upper ls-1">
                                        <i class="las la-envelope"></i>
                                        <h5>Inscription</h5>
                                    </div>
                                    <div class="main-heading c-dark">
                                        <h1>Renseignez vos informations</h1>
                                    </div>
                                </div>
                                <form wire:submit.prevent='register'>
                                    <div class="form-floating">
                                        <input class="input form-control" id="name-field" type="text" placeholder="Votre nom" wire:model="nom">
                                        <label for="name-field">Votre nom</label>
                                        @error('nom')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating">
                                        <input class="input form-control" id="name-field" type="text" placeholder="Votre prenoms" wire:model="prenoms">
                                        <label for="name-field">Votre Prénom</label>
                                        @error('prenoms')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating">
                                        <input class="input form-control" id="email-field" type="email" placeholder="Votre adresse mail" wire:model="email">
                                        <label for="email-field">Votre email</label>
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating">
                                        <input class="input form-control" type="text" placeholder="Votre Ville" wire:model="ville">
                                        <label for="email-field">Ville</label>
                                        @error('ville')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating">
                                        <input class="input form-control" type="tel" placeholder="Votre numero de telephone" wire:model="phone">
                                        <label for="email-field">Téléphone</label>
                                        @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating">
                                        <input class="input form-control" id="email-field" type="password" placeholder="mot de passe" wire:model="password">
                                        <label for="email-field">Mot de passe</label>
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating">
                                        <p> J'ai déjà compte. <a class="text-primary" href="{{ route('login') }}">Connexion</a></p>
                                    </div>
                                    <button type="submit" class="button button-2">
                                        <span class="button-inner">
                                            <span class="button-content">
                                                <span class="text">S'inscrire</span>
                                            </span>
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!--
                        contact form - end
                        -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--
    contact form section - end
    -->
</div>
