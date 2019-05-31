
<ul @if (Request::path() == '/') class="o-header__home" @else class="o-header__page" @endif>
  <li>
    <a href="/">
      <span class="a-tablet">Home</span>
      <span class="a-mobile"><i class="fas fa-home"></i></span>
    </a>
  </li>
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
  @if(Auth::check())
  <li>
    <a href="/account">
      <span class="a-tablet">Account</span>
      <span class="a-mobile"><i class="fas fa-user-circle"></i></span></span>
    </a>
  </li>
  @else
  <li>
      <a href="/login">
        <span class="a-tablet">Account</span>
        <span class="a-mobile"><i class="fas fa-user-circle"></i></span></span>
      </a>
    </li>
  @endif
  <li class="m-credits__user">
      @if(Request::path() !== '/' && Auth::check())
        <p class="a-credits__user">{{ Auth::user()->credits }} credits</p>
      @endif
  </li>
</ul>

