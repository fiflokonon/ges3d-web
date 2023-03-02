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
                                <h1>Envoyez nous vos déchets</h1>
                                <ul>
                                    <li>
                                        <a href="{{ route('welcome') }}" class="link-underline">
                                            <span>Accueil</span>
                                        </a>
                                    </li>
                                    <li>
                                        <i class="las la-angle-right"></i>
                                        <a href="{{ route('site.alert') }}" class="link-underline">
                                            <span>Alert</span>
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
                <div class="background-pattern-img background-loop" style="background-image: url(assets/site/images/patterns/pattern.jpg);"></div>
                <div class="background-pattern-gradient"></div>
                <div class="background-pattern-bottom">
                    <div class="image" style="background-image: url(assets/site/images/patterns/pattern-1.jpg)"></div>
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
                                        <h5>Alert</h5>
                                    </div>
                                    <div class="main-heading c-dark">
                                        <h1>Renseignez vos informations</h1>
                                    </div>
                                    @if (Session::has('message'))
                                    <div class="alert alert-success">{{Session::get('message')}}</div>
                                    @endif
                                </div>
                                <form wire:submit.prevent='saveAlert'>

                                    <div class="form-floating">
                                        <select name="" id="" class="input form-control" wire:model="ville_id">
                                            <option value="">Choisir une ville</option>
                                            @foreach ($villes as $ville)
                                            <option value="{{ $ville->id }}">{{ $ville->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('ville_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating">
                                        <input class="input form-control" id="email-field" type="file" placeholder="Votre photo" accept=".jpg, .png, image/jpeg, image/png" wire:model="path" multiple>
                                        @if ($path)
                                        @foreach ($path as $images)
                                        <img src="{{$images->temporaryUrl()}}" class="px-2" width="100">
                                        @endforeach
                                        @endif
                                        @error('path')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating">
                                        <input class="input form-control" id="message-field" type="text" placeholder="Message" wire:model="message">
                                        <label for="message-field">Message</label>
                                        @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>

                                    <a class="btn btn-outline-info btn-lg btnx-block mt-5 pt-3 pb-3" onclick="getLocation()">Ma position Actuelle</a>
                                    <div class="form-floating">
                                        {{-- <button class="btn btn-info" onclick="getLocation()">Ma position Actuelle</button> --}}
                                        <p id="demo"></p>
                                        @if ($this->latitude)
                                        <div class="form-floating">
                                            <input class="input form-control" type="text" value="{{ $this->latitude }}" disabled>
                                            <label for="message-field">latitude</label>
                                        </div>

                                        @endif
                                        @if ($this->longitude)
                                        <div class="form-floating">
                                            <input class="input form-control" type="text" value="{{ $this->longitude }}" disabled>
                                            <label for="message-field">longitude</label>
                                        </div>

                                        @endif
                                    </div>




                                    <button type="submit" class="button button-2">
                                        <span class="button-inner">
                                            <span class="button-content">
                                                <span class="text">Envoyer</span>
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

@section('custom-scripts')
<script>
    var x = document.getElementById("demo");

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {

        @this.latitude = position.coords.latitude ;
        @this.longitude = position.coords.longitude;

    //   x.innerHTML = "Latitude: " + position.coords.latitude +
    //   "<br>Longitude: " + position.coords.longitude;
    }
    </script>

@endsection
