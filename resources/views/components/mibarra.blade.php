<nav class="navbar navbar-expand-lg bg-body-tertiary">  
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="{{asset('img/datos.png')}}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
        Mi proyecto
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="#">{{(auth()!= null && auth()->user() != null)?auth()->user()->name:"NO LOGIN"}}</a>
          <a class="nav-link" href="#">Features</a>
          <a class="nav-link" href="#">unidad</a>
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </div>
      </div>
    </div>
</nav>

{{--
<div class="container-fluid">
  <a class="navbar-brand" href="#">
    <img src="{{asset('img/datos.png')}}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
    Bootstrap
  </a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-link active" aria-current="page" href="#">Home</a>
      <a class="nav-link" href="#">Features</a>
      <a class="nav-link" href="#">unidad</a>
      <a class="nav-link disabled" aria-disabled="true">Disabled</a>
    </div>
  </div>
  
</div>
--}}