@extends('layouts.app')

@section('title', 'Conference Editions')

@section('content')

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <div id="page-wrapper" class="container">
        <div class="row">
            <label><input type="checkbox" id="editions" name="haha"/>Show Editions</label>
            <label><input type="checkbox" id="papers" name="haha"/>Show Papers</label>
            <label><input type="checkbox" id="authors" name="haha"/>Show Authors</label>

            <div class="col-md-12" >
                <h1 class="page-header">{{$conference->conference_title}} - {{ $conference->acronym }}</h1>
            <div id="tableEditions" style="display:none">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Editions</th>
                        <th>Host City</th>
                        <th>Host Country</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($editions as $edition)
                    <tr>
                        <td>{{ $edition->edition_name }}</td>
                        <td>{{ $edition->host_city }}</td>
                        <td>{{ $edition->host_country }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
            </div>

                <div id="tablePapers" style="display:none">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Paper Title</th>
                            <th>Conference Edition</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($editions as $edition)
                            @foreach($edition->papers as $paper)
                            <tr>
                                <td>{{ $paper->paper_title }}</td>
                                <td>{{ $edition->edition_name }}</td>
                            </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div id="tableAuthors" style="display:none">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Number of Papers</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($persons as $person)
                                <tr>
                                    <td>{{ $person->first_name }}</td>
                                    <td>{{ $person->middle_name }}</td>
                                    <td>{{ $person->last_name }}</td>
                                    <td>{{ $person->papers->count() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>

    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/metisMenu.min.js" type="text/javascript"></script>
    <script src="js/sb-admin-2.min.js" type="text/javascript"></script>
    <script>
        $('#editions').click(function() {
            $("#tableEditions").toggle(this.checked);
        });
        $('#papers').click(function() {
            $("#tablePapers").toggle(this.checked);
        });
        $('#authors').click(function() {
            $("#tableAuthors").toggle(this.checked);
        });
    </script>

@stop