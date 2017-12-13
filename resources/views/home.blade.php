@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <div class="row">
<div class="col-sm-2 sidebar" id="fixed">
<div class="mini-submenu">
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
</div>
<div class="list-group">
  <span class="list-group-item active">
      Conferences
      <span class="pull-right" id="slide-submenu">
          <i class="fa fa-times"></i>
      </span>
  </span>
  @foreach($conferences as $conference)
  <a class="list-group-item">
      {{ $conference->acronym }} <i class="fa fa-eye pull-right"></i>
  @endforeach
  </a>
</div>
</div>

<div class="col-sm-2 list">
</div>

      <div class="col-sm-8 list">


        <div id="tableEditions" >
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th>Paper Title</th>
                    <th>Authors</th>
                    <th>Conference</th>
                    <th>Edition</th>
                </tr>
                </thead>
                <tbody>
                @foreach($conferences as $conference)
                  @foreach($conference->edition as $edition)
                    @foreach($edition->papers as $paper)
                <tr>
                    <td>{{ $paper->paper_title }}</td>
                    <td>
                      @foreach($paper->persons as $person)
                        {{ $person->last_name }} /
                      @endforeach
                    </td>
                    <td>{{ $conference->acronym }}</td>
                    <td>{{ $edition->edition_name }}</td>
                </tr>
                    @endforeach
                  @endforeach
                @endforeach
                </tbody>
                </table>
        </div>


      </div>
      </div>

    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/metisMenu.min.js" type="text/javascript"></script>
    <script src="js/sb-admin-2.min.js" type="text/javascript"></script>



@endsection
