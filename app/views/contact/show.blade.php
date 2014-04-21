@extends('layouts.master')

@section('title', 'Contact me')

@section('content')

    <div class="row">
        <div class="col-md-12 headertitle">
            <div class="head">
                <div class="meta">
                    <span class="title">Contact</span>
                    <div class="social">
                        <a href="mailto:martindilling@gmail.com" target="_blank" alt="Email" title="Email">
                            <i class="icon email"></i>
                        </a>
                        <a href="http://www.linkedin.com/in/martindilling" target="_blank" title="Linkedin" alt="Linkedin">
                            <i class="icon linkedin"></i>
                        </a>
                        <a href="https://twitter.com/dillinghansen" target="_blank" alt="Twitter" title="Twitter">
                            <i class="icon twitter"></i>
                        </a>
                        <a href="https://www.facebook.com/dillinghansen" target="_blank" title="Facebook" alt="Facebook">
                            <i class="icon facebook"></i>
                        </a>
                        <a href="https://github.com/martindilling" target="_blank" alt="GitHub" title="GitHub">
                            <i class="icon github"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text">
            <div class="row">
                <div class="col-sm-offset-2 col-md-offset-2 col-sm-8 col-md-8">
                    <p class="no-top-margin">
                        If you have any questions or just want to chat, you can contact me using any of the links above.
                        Or you can use the form below. I will do my best to get back to you as soon as possible :)
                    <p>
                </div>
            </div>
            

            @include('contact._form')

        </div>
    </div>

@stop
