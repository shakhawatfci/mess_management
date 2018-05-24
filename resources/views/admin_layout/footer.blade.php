
    <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
	<script src="{{ url('js/toastr.min.js') }}"></script>
	<script src="{{ url('js/bootstrap.min.js') }}"></script>
	<script src="{{ url('js/chart.min.js') }}"></script>
	<script src="{{ url('js/chart-data.js') }}"></script>
	<script src="{{ url('js/easypiechart.js') }}"></script>
	<script src="{{ url('js/easypiechart-data.js') }}"></script>
	
		
	  <script>
    $(function() {
    $( ".datepicker" ).datepicker();
    });
    </script>


<script>


  @if(Session::has('success'))

  		toastr.success("{{ Session::get('success') }}");

  @endif


  @if(Session::has('info'))

  		toastr.info("{{ Session::get('info') }}");

  @endif


  @if(Session::has('warning'))

  		toastr.warning("{{ Session::get('warning') }}");

  @endif


  @if(Session::has('error'))

  		toastr.error("{{ Session::get('error') }}");

  @endif


</script>
</body>

</html>
