@extends('templates.outs.home')

@section('content')
    {{-- HEADER--}}
	<div class="hug hug-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{ route('home') }}" class="pull-left"><img src="{{ \App\Helpers\Helpers::logoUrl() }}" alt="Ribbbon"></a>
                    <a href="{{ route('login') }}" class="btn btn-primary btn-line pull-right login">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-line pull-right register">Register</a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
	</div>

    {{-- HEREO SECTION --}}
    <div class="hug hug-hero">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="left-side">
                        <h1>Introducing Ribbbon 2.0</h1>
                        <h2>An open source project management system.</h2>
                        <a href="{{ route('register') }}" class="btn btn-special">GET STARTED</a>
                    </div>
                    <div class="right-side">
                        <img class="mascot" src="{{ asset('assets/img/mascot_left.png')  }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SKYLINE --}}
    <div class="hug hug-skyline">
        <div class="skyline"></div>
    </div>

    {{-- FEATURES --}}
    <div class="hug hug-features">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="text-center">Ribbbon comes full of delightful features!</h2>
                </div>
                <div class="col-xs-12 col-md-3 feature">
                    <i class="ion-ios-person-outline"></i>
                    <h3>clients</h3>
                    <p>Manage unlimited amount of clients. Add additional information for each client
                        such as, contact person, email, and phone number.</p>
                </div>
                <div class="col-xs-12 col-md-3 feature">
                    <i class="ion-ios-box-outline"></i>
                    <h3>projects</h3>
                    <p>Create projects that are connected to clients. Projects are displayed
                        in an agile format and have special sections to store project based
                        credentials.</p>
                </div>
                <div class="col-xs-12 col-md-3 feature">
                    <i class="ion-ios-checkmark-outline"></i>
                    <h3>tasks</h3>
                    <p>Create an unlimited amount of tasks for any project. Push them across
                        the scrum board and assign weights and priority per task.</p>
                </div>
                <div class="col-xs-12 col-md-3 feature">
                    <i class="ion-ios-gear-outline"></i>
                    <h3>weights</h3>
                    <p>Each task has a weight number, the bigger the weight the harder the task
                        is to complete. This allows you to keep track on how big a project really is. Pretty handy stuff.</p>
                </div>
                <div>
                    <div class="col-xs-12 col-md-3 feature centered">
                        <i class="ion-ios-people-outline"></i>
                        <h3>project sharing <span class="new">new!</span></h3>
                        <p>Share your projects with multiples users and collaborate together on your projects.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- INFO --}}
    <div class="hug hug-info text-center">
        <img class="arrow" src="{{ asset('assets/img/arrows.png')  }}" alt="Arrows">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2>We Are Powered by</h2>
                    <h3>Laravel & Vue.js</h3>

                    <img src="{{ asset('assets/img/laravel.png')  }}" alt="Laravel">
                    <img src="{{ asset('assets/img/vue.png')  }}" alt="Vue.js">
                </div>
            </div>
        </div>
    </div>

    {{-- UI --}}
    <div class="hug hug-ui text-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="text-bucket">
                        <h2>Did we mention it looks good too?</h2>
                        <h3>Less fuzz while still having all the info you need at a glance.</h3>
                    </div>
                    <img src="{{ asset('assets/img/project_screenshot.png')  }}" alt="Project Page">
                </div>
            </div>
        </div>
    </div>

    {{-- exit --}}
    <div class="hug hug-exit">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="img">
                        <h2>"Free, sexy, and open source. I think it's time for you to take the dive."</h2>
                        <a href="{{ route('register') }}" class="btn btn-special">GET STARTED</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- footer --}}
    <div class="hug hug-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3>Current Version <span class="color-primary">2.2</span> | <a class="color-primary" href="https://github.com/canvasowl/ribbbon" target="_blank">Go To Project</a></h3>
                    <hr class="special">
                    <p class="text-center last-line">Copyright {{ date("Y") }} &copy;  <a href="https://twitter.com/canvasowl" target="_blank">Jefry Cruz</a></p>
                </div>
            </div>
        </div>
    </div>
@stop