<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">BLOG</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
        </button>

     <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="{{ Request :: is('/') ? "active" : ""}}">
           <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="{{ Request :: is('/') ? "active" : ""}}">
           <a class="nav-link" href="/blog">Blog <span class="sr-only">(current)</span></a>
        </li>
        <li class="{{ Request :: is('/about') ? "active" : ""}}">
          <a class="nav-link" href="/about">About</a>
        </li>
        <li class="{{ Request :: is('/contact') ? 'active' : ''}}">
          <a class="nav-link" href="/contact">Contact</a>
        </li>
        <li class="{{Request:: is('/') ? 'active' : ''}}">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          My Contacts
          </a>
     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>
          <a class="dropdown-item" href="{{route('categories.index')}}">Categories</a>
          <a class="dropdown-item" href="{{route('tags.index')}}">Tags</a>

     <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Log out</a>
     </div>
        </li>
       </ul>

     </div>

    </nav>