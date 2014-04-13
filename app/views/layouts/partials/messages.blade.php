@if ($errors->any() || $messages = Session::get('messages'))

    <div class="alerts">

        <style>
            .alert ul {
                list-style-type: none;
                padding: 0;
                position: relative;
            }
            .alert ul li {
                padding-left: 1.2em;
                margin: 0.1em 0;
            }
            .alert ul li:before {
                content: url({{ asset('assets/img/bullet.png') }});
                width: 8px;
                height: 12px;
                display: block;
                position: absolute;
                left: 2px;
                filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=20);
                opacity: 0.2;
                -webkit-transition: all 150ms linear;
                -moz-transition: all 150ms linear;
                -o-transition: all 150ms linear;
                transition: all 150ms linear;
            }
        </style>

        @if ($errors->any())
            <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-close="alert" aria-hidden="true">&times;</button>
                <ul>
                    @if ($errors->any())
                        @foreach ($errors->all('<li>:message</li>') as $message)
                            {{ $message }}
                        @endforeach
                    @endif
                </ul>
            </div>
        @endif

        @if (isset($messages))

            @if ($messages->has('success'))
                <div class="alert alert-dismissable alert-success">
                    <button type="button" class="close" data-close="alert" aria-hidden="true">&times;</button>
                    <ul>
                        @foreach ($messages->get('success', '<li>:message</li>') as $message)
                            {{ $message }}
                        @endforeach
                    </ul>
                </div>
            @endif
        
            @if ($messages->has('error'))
                <div class="alert alert-dismissable alert-danger">
                    <button type="button" class="close" data-close="alert" aria-hidden="true">&times;</button>
                    <ul>
                        @foreach ($messages->get('error', '<li>:message</li>') as $message)
                            {{ $message }}
                        @endforeach
                    </ul>
                </div>
            @endif
        
            @if ($messages->has('info'))
                <div class="alert alert-dismissable alert-info">
                    <button type="button" class="close" data-close="alert" aria-hidden="true">&times;</button>
                    <ul>
                        @foreach ($messages->get('info', '<li>:message</li>') as $message)
                            {{ $message }}
                        @endforeach
                    </ul>
                </div>
            @endif
        
            @if ($messages->has('warning'))
                <div class="alert alert-dismissable alert-warning">
                    <button type="button" class="close" data-close="alert" aria-hidden="true">&times;</button>
                    <ul>
                        @foreach ($messages->get('warning', '<li>:message</li>') as $message)
                            {{ $message }}
                        @endforeach
                    </ul>
                </div>
            @endif

        @endif

    </div>

@endif
