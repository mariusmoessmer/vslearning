	<footer class="bs-footer">
		<nav class="navbar navbar-default navbar-fixed-bottom navbar-inverse"
			role="navigation">
			<div class="container">
				<ul>
					<li><a href="{{ URL::to("group") }}">Donate</a></li>
					<li>Copyright &copy; {{ date("Y", time()) }} <a href="mailto:mariusmoessmer@gmail.com"
						title="Marius M&ouml;ssmer" target="_blank">Marius M&ouml;ssmer</a>
					</li>
				</ul>
			</div>
		</nav>
	</footer>
	


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