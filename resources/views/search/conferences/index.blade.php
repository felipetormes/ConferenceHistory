<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

<title>Home</title>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('#about') }}">About</a></li>
                    <li><a href="{{ url('#contact') }}">Contact</a></li>
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li><a href="{{ url('/home') }}">Dashboard</a></li>
                    <li><a href="{{ url('#about') }}">About</a></li>
                    <li><a href="{{ url('#contact') }}">Contact</a></li>
                    <li><a href="{{ url('/admin') }}">Admin</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
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
    </div>
</nav>

<div class="row">

<div class="col-md-1 list">
</div>

<div class="col-md-1 list">

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
           {!! Form::checkbox($conference->acronym, $conference->acronym) !!}
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
</div>
{!! Form::close() !!}

</div>


<div class="row">

<div class="col-md-1 list">
</div>

<div class="col-md-10 list">

<div id="table{{ $conference->acronym }}">
  <h3 class="page-header">
    @foreach($editions_checked as $edition)
      @if ($loop->last)
        {{ $edition->edition_name }}
      @else
        {{ $edition->edition_name }},
      @endif
    @endforeach

    <a data-toggle="modal" data-target="#exampleModal" href="">
      <i class="fa fa-pencil" aria-hidden="true" style="color:#C0C0C0;"></i>
    </a>
  </h3>
<table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
          <tr>
              <th>First Name</th>
              <th>Middle Name</th>
              <th>Last Name</th>
              <th>Affiliation</th>
              <th>Papers</th>
              <th>Select</th>
          </tr>
          </thead>
          <tbody>

            @foreach($persons as $person)
            <?php
              $flag = 0;
            ?>

            @foreach($editions_checked as $edition)
              @foreach($edition->papers as $paper)
              @foreach($paper->persons as $person1)
              <?php
              if($person1->id == $person->id) {
                $flag = 1;
              }
              ?>

              @endforeach
              @endforeach
              @endforeach

          @if($flag)
          <tr>
                <td>{{ $person->first_name }}</td>
                <td>{{ $person->middle_name }}</td>
                <td>{{ $person->last_name }}</td>
                <td>
                  @foreach($person->institutions->unique() as $institution)
                  {{ $institution->institution_name }} /
                  @endforeach
                </td>
                <td>

                  <?php
                    $aux = 0;
                    foreach ($person->papers as $paper) {
                      foreach ($editions_checked as $edition) {
                        if ($paper->edition_id == $edition->id) {
                          $aux++;
                        }
                      }
                    }
                    echo $aux;
                  ?>

                </td>
                <td>
                  <input type="checkbox" id="{{ $person->id }}"/>
                </td>
          </tr>

          @endif
            @endforeach
          </tbody>
    </table>
  </div>
  </div>
</div>

@foreach($conferences as $conference)
	<script>
		$(document).ready(function() {
			$('#dataTable').DataTable();
		} );
	</script>
@endforeach
