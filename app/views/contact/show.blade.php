@extends('layouts.master')

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

            @include('contact._form')

        </div>
    </div>

@stop
