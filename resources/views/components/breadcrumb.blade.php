<div class="breadcrumb-env">
  <ol class="breadcrumb bc-1" >
    



@php 
  $bread = URL::to('/'); 
  $link = Request::path(); 
  $subs = explode("/", $link);
@endphp

@if (Request::path() != '/')

  @for($i = 0; $i < count($subs); $i++)

    @php 
      $bread = $bread."/".$subs[$i]; 
      $title = urldecode($subs[$i]);
      $title = str_replace("-", " ", $title);
      $title = title_case($title);

    @endphp

    <li>

    @if ($i != count($subs)-1)
      <a href="{{ $bread }}">{{ $title }}</a>
    @else
      <strong>{{ $title }}</strong>
    @endif

    </li>

  @endfor

@endif

  </ol>
</div>