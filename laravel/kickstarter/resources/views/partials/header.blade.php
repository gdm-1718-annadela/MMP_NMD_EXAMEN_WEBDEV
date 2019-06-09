
<ul @if (Request::path() == '/') class="o-header__home" @else class="o-header__page" @endif>
  @if(Request::path() !== '/')
  <li>
    <a href="/">
      <span class="a-tablet">Home</span>
      <span class="a-mobile"><i class="fas fa-home"></i></span>
    </a>
  </li>
  @endif
  <li>
    <a href="/projects">
      <span class="a-tablet">Projecten</span>
      <span class="a-mobile"><i class="fas fa-tasks"></i></span> 
    </a>
  </li>
  <li>
    <a href="/news">
      <span class="a-tablet">News</span>
      <span class="a-mobile"><i class="fas fa-newspaper"></i></span>
    </a>
  </li>
  <li>
    <a href="/about">
      <span class="a-tablet">About</span>
      <span class="a-mobile"><i class="fas fa-info-circle"></i></span></a></li>
  <li>
    <a href="/contact">
      <span class="a-tablet">Contact</span>
      <span class="a-mobile"><i class="fas fa-phone"></i></span>
    </a>
  </li>
  <li>
    <a href="/privacy">
      <span class="a-tablet">Privacy</span>
      <span class="a-mobile"><i class="fas fa-user-secret"></i></span>
    </a>
  </li>
  @if(Auth::check() && Auth::user()->soortgebruiker == 'admin')
  
  <li>
      <a href="/admin/users">
        <span class="a-tablet">Overzicht</span>
        <span class="a-mobile"><i class="fas fa-table"></i></span>
      </a>
  </li>
  @endif
  @if(Auth::check())
    <li>
      <a href="/account">
        @if((Auth::user()->fototitel !== null) && (Request::path() !== '/'))
        <span class="a-tablet"><div class="a-profile__header">
          <img src="{{asset($userId->fotopad  . '/' . $userId->fototitel)}}">
        </span>
        @elseif((Auth::user()->fototitel == null) && (Request::path() !== '/'))
        <div class="a-profile__header">
          <span class="a-tablet">
            <img src="/images/profile.png">
          </span>
        </div>
        @else
        <span class="a-tablet">Account</span>
        @endif
        <span class="a-mobile"><i class="fas fa-user-circle"></i></span>
      </a>
    </li>
  @else
  <li>
      <a href="/login">
        <span class="a-tablet">Account</span>
        <span class="a-mobile"><i class="fas fa-user-circle"></i></span>
      </a>
    </li>
  @endif
  <li class="m-credits__user">
      @if(Request::path() !== '/' && Auth::check())
        <p class="a-credits__user">
          @if(Auth::user()->credits > 0)
          {{ Auth::user()->credits }} credits
          @else 
          Je hebt geen credits
          @endif
        </p>
      @endif
  </li>
</ul>

