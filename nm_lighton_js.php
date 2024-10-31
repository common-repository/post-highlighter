<script type="text/javascript">
/*if (typeof jQuery == 'undefined') { 
  //alert('hi');
   var head = document.getElementsByTagName("head")[0];
   script = document.createElement('script');
   script.id = 'jQuery';
   script.type = 'text/javascript';
   script.src = '<?php echo plugins_url('/js/jquery-1.4.4.min.js', __FILE__)?>';
   head.appendChild(script);
}*/

function showStart()
{
	$('body').append('<div id="nm_shadow"></div>');
	$("#nm_shadow").css("height", $(document).height()).hide();
	
	
	var postDiv = $('#nm_button_container').parent();
		//alert($(postDiv).html());
				
    		$("#nm_shadow").toggle();
			if($("#nm_shadow").is(':visible'))
			{
				$(postDiv).addClass('postOn');
				$('#nm_button_container').html('<a class="nm_highlighter" href="javascript:showEnd()" >Light on</a>');
				$('.nm_highlighter').addClass('offNow');
				//$('.nm_highlighter').html('Turn off');
			}
			
}

function showEnd()
{
	var postDiv = $('#nm_button_container').parent();
	//alert($(postDiv).html());
	$("#nm_shadow").hide();
	$(postDiv).removeClass('postOn');
	$('.nm_highlighter').removeClass('offNow');
	$('#nm_button_container').html('<a class="nm_highlighter" href="javascript:showStart()" >Light off</a>');
}
</script>