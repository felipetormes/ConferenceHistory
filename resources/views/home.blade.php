@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <div class="row">
        <div class="col-sm-4 col-md-3 col-xs-3 col-lg-3 sidebar">
            <div class="mini-submenu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
            <div class="list-group">
        <span href="#" class="list-group-item active">
            Choose your options
            <span class="pull-right" id="slide-submenu">
                <i class="fa fa-times"></i>
            </span>
        </span>
                <form action="POST">
                    <p class="list-group-item">
                        <b>Conference</b><br>
                        <input type="checkbox" value="NOMS"> NOMS<br>
                        <input type="checkbox" value="IM">  IM<br>
                    </p>
                    <p class="list-group-item">
                        Conference
                    </p>
                    <p class="list-group-item">
                        Institution
                    </p>
                </form>
            </div>
    </div>

        <div class="col-md-8 col-lg-8 col-xs-8 list">



            <ul>
                <li><a href='#a'>A</a></li>
                <li><a href='#b'>B</a></li>
                <li><a href='#c'>C</a></li>
                <li><a href='#d'>D</a></li>
                <li><a href='#e'>E</a></li>
                <li><a href='#f'>F</a></li>
                <li><a href='#g'>G</a></li>
                <li><a href='#h'>H</a></li>
                <li><a href='#i'>I</a></li>
                <li><a href='#j'>J</a></li>
                <li><a href='#k'>K</a></li>
                <li><a href='#l'>L</a></li>
                <li><a href='#m'>M</a></li>
                <li><a href='#n'>N</a></li>
                <li><a href='#o'>O</a></li>
                <li><a href='#p'>P</a></li>
                <li><a href='#q'>Q</a></li>
                <li><a href='#r'>R</a></li>
                <li><a href='#s'>S</a></li>
                <li><a href='#t'>T</a></li>
                <li><a href='#u'>U</a></li>
                <li><a href='#v'>V</a></li>
                <li><a href='#w'>W</a></li>
                <li><a href='#x'>X</a></li>
                <li><a href='#y'>Y</a></li>
                <li><a href='#z'>Z</a></li>
            </ul>
            <div id='a'>
                <h2>Names Beginning with <span>A</span></h2>
                <p>AARON</p>
                <p>ABIGAIL</p>
                <p>ADALYN</p>
                <p>ADAM</p>
                <p>ADDISON</p>
                <p>ADELAIDE</p>
                <p>ADELINE</p>
                <p>ADRIAN</p>
                <p>AIDAN/AIDEN/ADEN</p>
                <p>ALEXANDER</p>
                <p>ALEXIS</p>
                <p>ALICE</p>
                <p>ALISSA/ALYSSA</p>
                <p>AMELIA/EMILIA</p>
                <p>ANDREW</p>
                <p>ANNA</p>
                <p>ANNABELLE</p>
                <p>ARABELLA</p>
                <p>ARCHER</p>
                <p>ARIA</p>
                <p>ARIANNA/ARIANA</p>
                <p>ASHER</p>
                <p>ATTICUS</p>
                <p>AUBREY/AUBREE</p>
                <p>AUDREY</p>
                <p>AUGUST</p>
                <p>AURORA</p>
                <p>AUTUMN</p>
                <p>AVA</p>
                <p>AVERY</p>
            </div>
            <div id='b'>
                <h2>Names Beginning with <span>B</span></h2>
                <p>BENJAMIN</p>
                <p>BENNETT</p>
                <p>BENTLEY</p>
                <p>BLAKE</p>
                <p>BRADEN/BRAYDEN</p>
                <p>BRIELLE</p>
                <p>BROOKLYN/BROOKLYNN</p>
            </div>
            <div id='c'>
                <h2>Names Beginning with <span>C</span></h2>
                <p>CALEB/KALEB</p>
                <p>CAROLINE</p>
                <p>CARTER</p>
                <p>CATHERINE/KATHERINE/KATHRYN</p>
                <p>CAYDEN/CADEN/KAYDEN/KADEN</p>
                <p>CHARLES</p>
                <p>CHARLOTTE</p>
                <p>CHASE</p>
                <p>CHLOE/KHLOE</p>
                <p>CLAIRE/CLARE</p>
                <p>CLARA</p>
                <p>COLE/KOLE</p>
                <p>COLIN/COLLIN</p>
                <p>COLTON</p>
                <p>CONNOR/CONOR/CONNER</p>
                <p>COOPER</p>
                <p>CORA</p>
            </div>
            <div id='d'>
                <h2>Names Beginning with <span>D</span></h2>
                <p>DANIEL</p>
                <p>DECLAN</p>
                <p>DELILAH</p>
                <p>DOMINIC/DOMINICK</p>
                <p>DYLAN/DILLON/DILLAN</p>
            </div>
            <div id='e'>
                <h2>Names Beginning with <span>E</span></h2>
                <p>EASTON</p>
                <p>EDEN</p>
                <p>ELEANOR</p>
                <p>ELI</p>
                <p>ELIJAH</p>
                <p>ELISE/ELYSE</p>
                <p>ELIZABETH</p>
                <p>ELLA</p>
                <p>ELLIOT/ELIOT/ELLIOTT</p>
                <p>ELOISE</p>
                <p>EMILY</p>
                <p>EMMA</p>
                <p>EMMETT/EMMET</p>
                <p>ETHAN</p>
                <p>EVA</p>
                <p>EVAN</p>
                <p>EVANGELINE</p>
                <p>EVELYN</p>
                <p>EVERETT</p>
                <p>EZRA</p>
            </div>
            <div id='f'>
                <h2>Names Beginning with <span>F</span></h2>
                <p>FELIX</p>
                <p>FINN/FYNN</p>
                <p>FIONA</p>
            </div>
            <div id='g'>
                <h2>Names Beginning with <span>G</span></h2>
                <p>GABRIEL</p>
                <p>GABRIELLA</p>
                <p>GAVIN</p>
                <p>GEMMA</p>
                <p>GENEVIEVE</p>
                <p>GRACE</p>
                <p>GRAHAM</p>
                <p>GRAYSON/GREYSON</p>
            </div>
            <div id='h'>
                <h2>Names Beginning with <span>H</span></h2>
                <p>HADLEY</p>
                <p>HANNAH/HANNA</p>
                <p>HARPER</p>
                <p>HARRISON</p>
                <p>HAYLEY/HALEY/HAILEY</p>
                <p>HAZEL</p>
                <p>HENRY</p>
                <p>HOLDEN</p>
                <p>HUDSON</p>
                <p>HUNTER</p>
            </div>
            <div id='i'>
                <h2>Names Beginning with <span>I</span></h2>
                <p>IAN</p>
                <p>ISAAC</p>
                <p>ISABELLA</p>
                <p>ISABELLE/ISABEL</p>
                <p>ISAIAH</p>
                <p>ISLA</p>
                <p>IVY</p>
            </div>
            <div id='j'>
                <h2>Names Beginning with <span>J</span></h2>
                <p>JACE/JASE</p>
                <p>JACK</p>
                <p>JACKSON/JAXON</p>
                <p>JACOB</p>
                <p>JAMES</p>
                <p>JASPER</p>
                <p>JONAH</p>
                <p>JOSEPH</p>
                <p>JOSEPHINE</p>
                <p>JOSHUA</p>
                <p>JUDE</p>
                <p>JULIA</p>
                <p>JULIAN</p>
                <p>JULIET/JULIETTE</p>
            </div>
            <div id='k'>
                <h2>Names Beginning with <span>K</span></h2>
                <p>KEIRA/KIRA</p>
            </div>
            <div id='l'>
                <h2>Names Beginning with <span>L</span></h2>
                <p>LANDON/LANDEN</p>
                <p>LAYLA/LEILA</p>
                <p>LEAH</p>
                <p>LEO</p>
                <p>LEVI</p>
                <p>LIAM</p>
                <p>LILA/LILAH</p>
                <p>LILLIAN</p>
                <p>LILY/LILLY</p>
                <p>LINCOLN</p>
                <p>LOGAN</p>
                <p>LORELEI</p>
                <p>LUCA/LUKA</p>
                <p>LUCAS</p>
                <p>LUCY</p>
                <p>LUKE</p>
                <p>LUNA</p>
                <p>LYDIA</p>
            </div>
            <div id='m'>
                <h2>Names Beginning with <span>M</span></h2>
                <p>MADELINE/MADELYN</p>
                <p>MADISON</p>
                <p>MASON</p>
                <p>MATTHEW</p>
                <p>MAX</p>
                <p>MIA</p>
                <p>MICAH</p>
                <p>MILA</p>
                <p>MILES/MYLES</p>
                <p>MOLLY</p>
            </div>
            <div id='n'>
                <h2>Names Beginning with <span>N</span></h2>
                <p>NAOMI</p>
                <p>NATALIE</p>
                <p>NATHAN</p>
                <p>NATHANIEL</p>
                <p>NICHOLAS/NICOLAS</p>
                <p>NOAH</p>
                <p>NOLAN</p>
                <p>NORA/NORAH</p>
            </div>
            <div id='o'>
                <h2>Names Beginning with <span>O</span></h2>
                <p>OLIVER</p>
                <p>OLIVIA</p>
                <p>OWEN</p>
            </div>
            <div id='p'>
                <h2>Names Beginning with <span>P</span></h2>
                <p>PAIGE</p>
                <p>PARKER</p>
                <p>PAYTON/PEYTON</p>
                <p>PENELOPE</p>
                <p>PIPER</p>
            </div>
            <div id='q'>
                <h2>Names Beginning with <span>Q</span></h2>
                <p>QUINN</p>
            </div>
            <div id='r'>
                <h2>Names Beginning with <span>R</span></h2>
                <p>REAGAN/REGAN</p>
                <p>RHYS/REECE/REESE</p>
                <p>RILEY/RYLEE</p>
                <p>ROSALIE</p>
                <p>ROSE</p>
                <p>RUBY</p>
                <p>RYAN</p>
                <p>RYDER/RIDER</p>
            </div>
            <div id='s'>
                <h2>Names Beginning with <span>S</span></h2>
                <p>SADIE</p>
                <p>SAMUEL</p>
                <p>SAVANNAH/SAVANNA</p>
                <p>SAWYER</p>
                <p>SCARLETT/SCARLET</p>
                <p>SEBASTIAN/SEBASTIEN</p>
                <p>SETH</p>
                <p>SIENNA</p>
                <p>SILAS</p>
                <p>SOPHIA/SOFIA</p>
                <p>SOPHIE/SOFIE</p>
                <p>STELLA</p>
            </div>
            <div id='t'>
                <h2>Names Beginning with <span>T</span></h2>
                <p>THEODORE</p>
                <p>THOMAS</p>
                <p>TRISTAN</p>
            </div>
            <div id='v'>
                <h2>Names Beginning with <span>V</span></h2>
                <p>VICTORIA</p>
                <p>VIOLET</p>
                <p>VIVIENNE/VIVIEN/VIVIAN</p>
            </div>
            <div id='w'>
                <h2>Names Beginning with <span>W</span></h2>
                <p>WILLIAM</p>
                <p>WILLOW</p>
                <p>WYATT</p>
            </div>
            <div id='x'>
                <h2>Names Beginning with <span>X</span></h2>
                <p>XAVIER</p>
            </div>
            <div id='z'>
                <h2>Names Beginning with <span>Z</span></h2>
                <p>ZACHARY</p>
                <p>ZOE</p>
                <p>ZOEY</p>
            </div>
            <script src="js/jquery.min.js" type="text/javascript"></script>
            <script src="js/list.js" type="text/javascript"></script>
        </div>

    </div>
@endsection
