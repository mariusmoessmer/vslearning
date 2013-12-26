<html>
    <head>
        <title>Lernsystem</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/default.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('home') }}">Lernsystem</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>{{ link_to(route('logout'), 'Abmelden ( '.Auth::user()->username.' )') }}</li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav>
        <!-- check for flash notification message -->
        @if(Session::has('flash_notice'))
        <div id="flash_notice" class="alert alert-warning">{{ Session::get('flash_notice') }}</div>
        @endif
        <!-- Page content -->
        <div class="container">
            @yield('content')
        </div>

        <footer class="bs-footer">
            <div class="container">
                <hr/>
                Copyright &copy; 2013 <a href="mailto:mariusmoessmer@gmail.com" title="Marius M&ouml;ssmer" target="_blank">Marius M&ouml;ssmer</a>
            </div>

        </footer>


        <script type="text/template" id="item-template"></script>
        <script type="text/template" id="stats-template"></script>
        <script src="assets/js/lib/jquery-2.0.3.js"></script>
        <script src="assets/js/lib/underscore.js"></script>
        <script src="assets/js/lib/backbone.js"></script>
        <!--<script src="assets/js/lib/backbone.localStorage.js"></script>-->
        <script src="assets/js/models/exercise.js"></script>
        <script src="assets/js/collections/exercises.js"></script>
        <script src="assets/js/views/exercises.js"></script>
        <script src="assets/js/views/app.js"></script>
        <script src="assets/js/routers/router.js"></script>
        <script src="assets/js/app.js"></script>
        
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
        <script src="assets/js/lib/bootstrap.min.js"></script>
        <script src="assets/js/lib/jquery.bootstrap.wizard.js"></script>
        <script>
        $(document).ready(function() {
                  $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                        var $total = navigation.find('li').length;
                        var $current = index+1;
                        var $percent = ($current/$total) * 100;
                        $('#rootwizard').find('.bar').css({width:$percent+'%'});
                }});
        });        
        </script>
    </body>
</html>