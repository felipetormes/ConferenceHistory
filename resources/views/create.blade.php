<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>List of authors</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

{!! Form::open([
    'route' => 'store'
]) !!}

<legend>Data of the Paper</legend>

<div class="form-horizontal">
    <fieldset>

        <div class="form-group">
            {!! Form::label('paper_title', 'Paper Title:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::text('paper_title', null, ['class' => 'form-control input-md', 'placeholder' => 'Paper Title']) !!}
            </div>
        </div>
    </fieldset>
</div>


<legend>Data of the Authors</legend>

<div class="form-horizontal">
    <fieldset>

        <div class="form-group">
            {!! Form::label('first_name', 'First Name:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::text('first_name', null, ['class' => 'form-control input-md', 'placeholder' => 'First Name']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('middle_name', 'Middle Name:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::text('middle_name', null, ['class' => 'form-control input-md']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('last_name', 'Last Name:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::text('last_name', null, ['class' => 'form-control input-md']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('author_country', 'Author Coutry:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::text('author_country', null, ['class' => 'form-control input-md']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('institution_name', 'Institution Name:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::text('institution_name', null, ['class' => 'form-control input-md']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('institution_country', 'Institution Country:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::text('institution_country', null, ['class' => 'form-control input-md']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('department_name', 'Department Name:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::text('department_name', null, ['class' => 'form-control input-md']) !!}
            </div>
        </div>

        {!! Form::label('', '', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-4">
            {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
        </div>

    </fieldset>
</div>

{!! Form::close() !!}



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>