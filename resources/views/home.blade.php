@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/rSlider.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js" type="text/javascript"></script>


    <div class="row">
<div class="col-md-2 sidebar" id="fixed">
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
     <label><input type="checkbox" id="{{ $conference->acronym }}" name="haha"/> {{ $conference->acronym }} </label>
  </a>
  @endforeach
  <span class="list-group-item active">
    Timeline
  </span>
  <a class="list-group-item">
    <br/><br/>
    <input type="range" id="sampleSlider" />
  </a>
</div>
</div>

<div class="col-md-2 list">
</div>

      <div class="col-md-9 list">

        @foreach($conferences as $conference)
        <div id="table{{ $conference->acronym }}" style="display:none">
            <table width="100%" class="table table-striped table-bordered table-hover" id="{{ $conference->acronym }}">
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

                  @foreach($conference->edition as $edition)
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
                            foreach ($conference->edition as $edition) {
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

        @endforeach


      </div>
      </div>

    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/metisMenu.min.js" type="text/javascript"></script>
    <script src="js/sb-admin-2.min.js" type="text/javascript"></script>
    <script src="js/rSlider.js" type="text/javascript"></script>


    @foreach($conferences as $conference)
      <script>
          $('#{{ $conference->acronym }}').click(function() {
              $("#table{{ $conference->acronym }}").toggle(this.checked);
          });
      </script>
    @endforeach

    <script>
      $(document).ready(function() {
        $('#exemple').DataTable();
      });
    </script>

    <script>
      var mySlider = new rSlider({
        target: '#sampleSlider',
        values: [1988, 1989, 1990, 1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999, 2000, 2001, 2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017],
        range: true,
        tooltip: true,
        scale: true,
        labels: false,
        set: [1988, 2017]
      });
    </script>




@endsection
