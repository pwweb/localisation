<div class="dropdown show">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="dropdown-item-icon" src="#" alt="{{ $current->locale }}">
        <span class="d-inline-block d-sm-none">{{ $current->abbreviation }}</span>
        <span class="d-none d-sm-inline-block">{{ $current->name }}</span>
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        @foreach ($languages as $language)
        <a class="dropdown-item @if ($current->name == $language->name) active @endif" href="/localisation/change/{{ $language->locale }}">{{ $language->name }}</a>
        @endforeach
    </div>
</div>


<!--<a id="languageDropdownInvoker" class="dropdown-nav-link dropdown-toggle d-flex align-items-center" href="javascript:;" role="button" aria-controls="languageDropdown" aria-haspopup="true" aria-expanded="false" data-unfold-event="hover" data-unfold-target="#languageDropdown" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
</a>

<div id="languageDropdown" class="dropdown-menu dropdown-unfold u-unfold--css-animation u-unfold--hidden fadeOut" aria-labelledby="languageDropdownInvoker" style="animation-duration: 300ms;">-->
