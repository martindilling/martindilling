@extends('layouts.master')

@section('title', 'About me')

@section('content')

    <div class="row">
        <div class="col-md-12 headertitle">
            <div class="head">
                <div class="meta">
                    <span class="title">About</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text">
            <div class="row">
                <div class="col-sm-3 text-center">
                    <img src="http://placehold.it/300x400" alt="" class="img-responsive img-profile-pic">
                </div>
                <div class="col-sm-9">
                    <p>
                        The nerd who loves coding.
                        <br>
                        - Mainly for the web in Object Oriented PHP, HTML, CSS and JavaScript, but have also played around with some Delphi (Pascal), Java and other languages.
                    </p>
                    <p>
                        What I put most importance into in coding, is that I strive to follow the evolution of best practices, standards and architectures of programming. With that in mind, I have lately been focusing a lot on reading- and learning about architecture and structure in programming projects. One subject I find particularly interesting at the moment is Domain-Driven Design (DDD).
                    </p>
                    <p>
                        I always work Object Oriented and do my best to follow the SOLID principles in my coding and to follow the PSR standards. I am also working on getting more into the Test Driven Development workflow, using tools like PHPUnit, PhpSpec, Behat and Codeception.
                    </p>
                    <p>
                        I do have a little experience with CMS systems like Drupal and Joomla, but I prefer to build projects from the ground up, supported by a good, modern framework. My preferred framework is Laravel, because of its ability to make development fun, interesting and flexible. It also keeps up with the evolution of PHP programming; for example, Laravel 4 jumped on the Composer wagon and began to use a wide range of good, well-tested packages from Symfony for many of the trivial parts, so Laravel itself could have more focus on the innovative side. Laravel 5 (due Jan-Feb 2015) will now be completely following the PSR-4 autoloading, their IoC container will be highly improved to ease development, and it will be shipping with a great, flexible Command Bus.
                        <br>
                        In short, Laravel is flexible enough to let you use the architecture you want, and strong enough to support the decision you make, and that is what I have fallen in love with.
                    </p>
                    <p>
                        Generally, coding is most of my life. It is not only my profession, but a great hobby, and thus most of my free time goes into reading tech books/blogposts, watching tech talks and hacking around to learn some new, interesting stuff.
                    </p>
                </div>
            </div>
        </div>
    </div>

@stop
