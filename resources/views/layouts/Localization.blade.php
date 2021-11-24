<li class="dropdown">
    <a href="#" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" class="nav-link dropdown-toggle" title="Translation">
        <i class="far fa-globe fa-fw">
        </i><span class="caret"></span>
    </a>
    <ul class="dropdown-menu border-1 shadow">
        <li>
            <a class="dropdown-item" rel="alternate" hreflang="{{ 'en' }}" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                <img src="{{asset('adminlte/dist/img/lang_flag/english.png')}}" style="width: 20px; margin:5px;"> 
                {{ 'English' }}
            </a>
        </li>
        <li>
            <a class="dropdown-item" rel="alternate" hreflang="{{ 'km' }}" href="{{ LaravelLocalization::getLocalizedURL('km', null, [], true) }}" >
                <img src="{{asset('adminlte/dist/img/lang_flag/khmer.png')}}" style="width: 20px; margin:5px;"> 
                {{ 'ភាសាខ្មែរ' }}
            </a>
        </li>
    </ul>   
</li>