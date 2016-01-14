@extends('templates/ins/master')

@section('content')
    <div id="user">
        <div class="row">
            <div class="col-xs-12 page-title-section">
                <h1 class="pull-left">Settings</h1>
                <a href="" class="btn btn-primary pull-right" title="Create new client">Save Changes</a>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="row settings-container">
            <div class="col-xs-12">
                <section>
                <div class="col-xs-12 col-md-4 left-side">
                    <a href="/profile"><img class="circle" src="{{ App\User::get_gravatar(Auth::user()->email) }}"></a>
                    <div class="info">
                        <p class="name">@{{ user.full_name }}</p>
                        <p class="color-primary">Web Developer</p>
                        <p class="color-badge">@{{ user.email }}</p>
                    </div>
                    <div class="clearfix"></div>
                    <hr>

                    <div class="bio">
                        <p>BIO<p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, fugit id illo iusto necessitatibus nesciunt nobis, omnis optio perferendis porro quas quos saepe voluptas? Corporis cum neque non placeat provident?</p>
                    </div>

                </div>
                <div class="col-xs-12 col-md-8 right-side">
                    <div class="mega-menu">
                        <div class="links">
                            <a class="" data-id="settings_info" href="">Personal Info</a>
                            <a class="" data-id="settings_links" href="">Links</a>
                            <a class="" data-id="settings_themes" href="">Themes</a>
                            <a class="" data-id="settings" href="">Account Settings</a>
                        </div>
                        <div class="content">
                            <div class="item" id="settings_info">settings info</div>
                            <div class="item" id="settings_links">Settings link</div>
                            <div class="item" id="settings_links">Settings Themes</div>
                            <div class="item" id="settings_links">Account Settings</div>
                        </div>
                    </div>
                </div>
                </section>
            </div>
        </div>
    </div>

    <script>
        megaMenuInit();
    </script>
    <script src="{{ asset('assets/js/controllers/user.js') }}"></script>
@stop()
