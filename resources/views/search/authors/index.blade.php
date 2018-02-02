<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/style2.css" rel="stylesheet" type="text/css">

<title>Authors</title>

<div class="row">

      <div class="list">
        <a href="{{ url('/') }}" style="color:#000000; text-decoration:none;">
          <h2 id="title"> {{ config('app.name') }}</h2>
        </a>
      </div>
</div>

<h3 id="conferences">

  @foreach($conference_checked as $conference)
    @if ($loop->last)
      {{ $conference->acronym }} -
    @else
      {{ $conference->acronym }},
    @endif
  @endforeach

  {{ $start_date}}{{ $end_date }}

<a data-toggle="modal" data-target="#exampleModal" href="">
  <i class="fa fa-pencil" aria-hidden="true" style="color:#C0C0C0;"></i>
</a>
</h3>
<hr class="first">

<div class="collapse navbar-collapse" id="app-navbar-collapse">
  <!-- Left Side Of Navbar -->
      <a href="{{ url('/home') }}" id="dashboard"><i class="fa fa-home"></i> Dashboard</a>
      <a href="{{ url('#') }}" id="authors"><i class="fa fa-users"></i><b> Authors</b></a>
      <a href="{{ url('#') }}" id="institutions"><i class="fa fa-building"></i> Intitutions</a>
      <a href="{{ url('#') }}" id="editions"><i class="fa fa-book"></i> Editions</a>

  <!-- Right Side Of Navbar -->
      <!-- Authentication Links -->
      @if (Auth::guest())
          <a href="{{ url('#about') }}" id="about">About</a>
          <a href="{{ url('/login') }}" id="login">Login</a>
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
</div>
<hr class="second">

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Conferences</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          {!! Form::open([
              'route' => 'authors.store'
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
{!! Form::close() !!}


<div class="row">

<div class="col-md-1 col-lg-1 col-sm-1 list">
</div>

<div class="col-md-10 col-lg-10 col-sm-10 list">

<div id="table{{ $conference->acronym }}">
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



          <tr>
                <td>{{ $person->first_name }}</td>
                <td>{{ $person->middle_name }}</td>
                <td>{{ $person->last_name }}</td>
                <td>{{ $person->institution_name }}</td>
                <td>{{ $person->numPapers }}</td>
                <td><input type="checkbox" id="{{ $person->last_name }}"/></td>
          </tr>


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
