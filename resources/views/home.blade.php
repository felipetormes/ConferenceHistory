<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

<title>Home</title>

    <div class="row">

          <div class="col-md-3 list">
            <a href="{{ url('/') }}" style="color:#000000; text-decoration:none;">
              <h2> &ensp; {{ config('app.name') }}</h2>
            </a>
          </div>
    </div>

  <h3>&ensp;

    @foreach($conferences as $conference)

      @if ($loop->last)
        {{ $conference->acronym }}
      @else
        {{ $conference->acronym }},
      @endif
    @endforeach

    <a data-toggle="modal" data-target="#exampleModal" href="">
      <i class="fa fa-pencil" aria-hidden="true" style="color:#C0C0C0;"></i>
    </a>

  </h3>

  <div class="collapse navbar-collapse" id="app-navbar-collapse">
      <!-- Left Side Of Navbar -->
      <ul class="nav navbar-nav">
          <li><a href="{{ url('/home') }}" style="color:#000000;"><i class="fa fa-home"></i> Dashboard</a></li>
          <li><a href="{{ url('#') }}" style="color:#000000;"><i class="fa fa-users"></i> Authors</a></li>
          <li><a href="{{ url('#') }}" style="color:#000000;"><i class="fa fa-building"></i> Intitutions</a></li>
          <li><a href="{{ url('#') }}" style="color:#000000;"><i class="fa fa-book"></i> Editions</a></li>
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @if (Auth::guest())
              <li><a href="{{ url('#about') }}" style="color:#000000;">About</a></li>
              <li><a href="{{ url('/login') }}" style="color:#000000;">Login</a></li>
              <li><a href="{{ url('/register') }}" style="color:#000000;">Register</a></li>
          @else
              <li><a href="{{ url('#about') }}" style="color:#000000;">About</a></li>
              <li><a href="{{ url('/admin') }}" style="color:#000000;">Admin</a></li>
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color:#000000;">
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" role="menu">
                      <li>
                          <a href="{{ url('/logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Logout
                          </a>

                          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
                  </ul>
              </li>
          @endif
      </ul>
  </div>
  <hr>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Conferences</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          {!! Form::open([
              'route' => 'home.store'
          ]) !!}
        </div>
        <div class="modal-body">
          @foreach($conferences as $conference)
         <a class="list-group-item">
           {!! Form::checkbox($conference->acronym, $conference->acronym, false) !!}
           <label> {{ $conference->acronym }} </label>
         </a>
         @endforeach
         <a class="list-group-item">
           <label> Start:  </label>
           {!! Form::date('start_date') !!}
           <label> End:  </label>
           {!! Form::date('end_date') !!}
         </a>
        </div>
        <div class="modal-footer">
          {!! Form::submit('Show', ['class' => 'btn btn-primary']) !!}
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
{!! Form::close() !!}
