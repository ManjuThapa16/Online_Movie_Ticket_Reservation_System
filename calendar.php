<script src="plugins/calendar/jquery.js" type="text/javascript"></script>
<link type="text/css" href="plugins/calendar/themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="plugins/calendar/ui/ui.core.js"></script>
<script type="text/javascript" src="plugins/calendar/ui/ui.datepicker.js"></script>
<link type="text/css" href="plugins/calendar/css/demos.css" rel="stylesheet" />
<script>
$(function() {
		$('#datepicker').datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: '1920:2010' 
		});
		$('#datepicker1').datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: '1920:2010' 
		});	
		$('#datepicker2').datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: '1920:2010' 
		});
		$('#datepicker3').datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: '1920:2010' 
		});	
	});
</script>

Date 1 : <input type="text" id="datepicker" /><br /><br />
Date 2 : <input type="text" id="datepicker1" /><br /><br />

Date 3 : <input type="text" id="datepicker2" /><br /><br />
Date 4 : <input type="text" id="datepicker3" /><br /><br />

