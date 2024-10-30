<?php
/* 	Plugin Name: Lord Linus Business hours
	Plugin Uri: http://businessadwings.com
	Description: This plugin gives you the set business hours and allow to show on your site with a simple shortcode [LORDLINUS_BUSINESS_HOURS]
	Version: 1.1
	Author: lordlinus
	Author URI: http://businessadwings.com/contact-us
	Licence: GPVl
*/
?>
<?php
function business_hours_menu()
{

	echo "<link rel='stylesheet' type='text/css' href='".plugins_url('/bootstrap-assets/css/bootstrap.css', __FILE__)."' />";
	
	add_menu_page( 'LordLinus Business Hours', 'Lordlinus Business Hours', 'administrator','lbh-menu' ,'lbh_menu');
	//add_submenu_page('lbh-menu', 'Lordlinus Business Hours','Entries','administrator','entries-lord','entries_lord');
	//add_submenu_page('lbh-menu', 'Contact Us','Uninstall','administrator','uninstall','uninstall');
	
}

function lbh_menu()
{
wp_enqueue_script('jquery');
	?>
<script>
jQuery(document).ready(function() {
	//monday
	jQuery('#mclose').change(function(){
	  if(jQuery(this).is(':checked'))
	  {
		jQuery('#mstart').attr("disabled", true);
		jQuery('#mend').attr("disabled", true);
		jQuery('#mstart').val('12:00 AM');
		jQuery('#mend').val('11:45 PM');
	  }
	  else
	  {
		jQuery('#mstart').attr("disabled", false);
		jQuery('#mend').attr("disabled", false);
	  }
	});
	
	//tuesday
	jQuery('#tuclose').change(function(){
	  if(jQuery(this).is(':checked'))
	  {
		jQuery('#tustart').attr("disabled", true);
		jQuery('#tuend').attr("disabled", true);
		jQuery('#tustart').val('12:00 AM');
		jQuery('#tuend').val('11:45 PM');
	  }
	  else
	  {
		jQuery('#tustart').attr("disabled", false);
		jQuery('#tuend').attr("disabled", false);
	  }
	});
	//wed
	jQuery('#wclose').change(function(){
	  if(jQuery(this).is(':checked'))
	  {
		jQuery('#wstart').attr("disabled", true);
		jQuery('#wend').attr("disabled", true);
				jQuery('#wstart').val('12:00 AM');
		jQuery('#wend').val('11:45 PM');
	  }
	  else
	  {
		jQuery('#wstart').attr("disabled", false);
		jQuery('#wend').attr("disabled", false);
	  }
	});
	
	//thrusday
	jQuery('#thclose').change(function(){
	  if(jQuery(this).is(':checked'))
	  {
		jQuery('#thstart').attr("disabled", true);
		jQuery('#thend').attr("disabled", true);
				jQuery('#thstart').val('12:00 AM');
		jQuery('#thend').val('11:45 PM');
	  }
	  else
	  {
		jQuery('#thstart').attr("disabled", false);
		jQuery('#thend').attr("disabled", false);
	  }
	});
	
	//friday
	jQuery('#fclose').change(function(){
	  if(jQuery(this).is(':checked'))
	  {
		jQuery('#fstart').attr("disabled", true);
		jQuery('#fend').attr("disabled", true);
				jQuery('#fstart').val('12:00 AM');
		jQuery('#fend').val('11:45 PM');
	  }
	  else
	  {
		jQuery('#fstart').attr("disabled", false);
		jQuery('#fend').attr("disabled", false);
	  }
	});
	
	//saturday
	jQuery('#saclose').change(function(){
	  if(jQuery(this).is(':checked'))
	  {
		jQuery('#sastart').attr("disabled", true);
		jQuery('#saend').attr("disabled", true);
				jQuery('#sastart').val('12:00 AM');
		jQuery('#saend').val('11:45 PM');
	  }
	  else
	  {
		jQuery('#sastart').attr("disabled", false);
		jQuery('#saend').attr("disabled", false);
	  }
	});
	
	//sunday
	jQuery('#suclose').change(function(){
	  if(jQuery(this).is(':checked'))
	  {
		jQuery('#sustart').attr("disabled", true);
		jQuery('#suend').attr("disabled", true);
				jQuery('#sustart').val('12:00 AM');
		jQuery('#suend').val('11:45 PM');
	  }
	  else
	  {
		jQuery('#sustart').attr("disabled", false);
		jQuery('#suend').attr("disabled", false);
	  }
	});
	
	jQuery("#savebh").click( function () {
		
		var mstart = jQuery('#mstart').val();
		if(mstart == '' )
		{
			alert("Select Monday's start time");
			return false;
		}
		
		var mend = jQuery('#mend').val();
		if(mend == '' )
		{
			alert("Select Monday's end time");
			return false;
		}
		
		var tustart = jQuery('#tustart').val();
		if(tustart == '' )
		{
			alert("Select Tuesday's start time");
			return false;
		}
		
		var tuend = jQuery('#tuend').val();
		if(tuend == '' )
		{
			alert("Select Tuesday's end time");
			return false;
		}
		
		var wstart = jQuery('#wstart').val();
		if(wstart == '' )
		{
			alert("Select Wednesday's start time");
			return false;
		}
		
		var wend = jQuery('#wend').val();
		if(wend == '' )
		{
			alert("Select Wednesday's end time");
			return false;
		}
		
		var thstart = jQuery('#thstart').val();
		if(thstart == '' )
		{
			alert("Select Thrusday's start time");
			return false;
		}
		
		var thend = jQuery('#thend').val();
		if(thend == '' )
		{
			alert("Select Thrusday's end time");
			return false;
		}
		
		var fstart = jQuery('#fstart').val();
		if(fstart == '' )
		{
			alert("Select Friday's start time");
			return false;
		}
		
		var fend = jQuery('#fend').val();
		if(fend == '' )
		{
			alert("Select Friday's end time");
			return false;
		}
		
		var sastart = jQuery('#sastart').val();
		if(sastart == '' )
		{
			alert("Select Saturday's start time");
			return false;
		}
		
		var saend = jQuery('#saend').val();
		if(saend == '' )
		{
			alert("Select Saturday's end time");
			return false;
		}
		
		var sustart = jQuery('#sustart').val();
		if(sustart == '' )
		{
			alert("Select Sunday's start time");
			return false;
		}
		
		var suend = jQuery('#suend').val();
		if(suend == '' )
		{
			alert("Select Sunday's end time");
			return false;
		}
		
	});
		
});

</script>
	<H1>Set Your Business hours </h1>
	<?php
	if(isset($_POST['savebh']))
	{
		$subvalue = serialize($_POST);
		update_option('lordlinus_business_hours',$subvalue);
		echo "<div class='alert alert-info'> Your business hours has been successfully updated </div>";
	}
	?>
	<form class="well form-inline" method="post" action="">
     Monday : <select name="mstart" id="mstart" style="margin-left:25px;">
	<option value="">Select Start time</option>
	<?php
	$start = strtotime('12:00am');
	$end = strtotime('11:59pm');
	for( $j = $start; $j <= $end; $j += 900) 
	{
		echo "<option value='" .date('g:i A', $j). "'>" .date('g:i A', $j). "</option>";
	}
	?>
	</select>
    <select name="mend" id="mend" style="margin-left:20px;">
	<option value="">Select End time</option>
	<?php
	$start = strtotime('12:00am');
	$end = strtotime('11:59pm');
	for( $j = $start; $j <= $end; $j += 900) 
	{
		echo "<option value='" .date('g:i A', $j). "'>" .date('g:i A', $j). "</option>";
	}
	?>
	</select>
    <label class="checkbox">
    <input type="checkbox" id="mclose" name="mclose" style="margin-left:20px;"> Close
    </label>
	<br/><br/>
	  Tuesday : <select name="tustart" id="tustart" style="margin-left:20px;">
	<option value="">Select Start time</option>
	<?php
	$start = strtotime('12:00am');
	$end = strtotime('11:59pm');
	for( $j = $start; $j <= $end; $j += 900) 
	{
		echo "<option value='" .date('g:i A', $j). "'>" .date('g:i A', $j). "</option>";
	}
	?>
	</select>
    <select name="tuend" id="tuend" style="margin-left:20px;">
	<option value="">Select End time</option>
	<?php
	$start = strtotime('12:00am');
	$end = strtotime('11:59pm');
	for( $j = $start; $j <= $end; $j += 900) 
	{
		echo "<option value='" .date('g:i A', $j). "'>" .date('g:i A', $j). "</option>";
	}
	?>
	</select>
    <label class="checkbox">
    <input type="checkbox" id="tuclose" name="tuclose" style="margin-left:20px;"> Close
    </label>
	<br/><br/>
	 Wednesday : <select name="wstart" id="wstart" style="margin-left:2px;">
	<option value="">Select Start time</option>
	<?php
	$start = strtotime('12:00am');
	$end = strtotime('11:59pm');
	for( $j = $start; $j <= $end; $j += 900) 
	{
		echo "<option value='" .date('g:i A', $j). "'>" .date('g:i A', $j). "</option>";
	}
	?>
	</select>
    <select name="wend" id="wend" style="margin-left:20px;">
	<option value="">Select End time</option>
	<?php
	$start = strtotime('12:00am');
	$end = strtotime('11:59pm');
	for( $j = $start; $j <= $end; $j += 900) 
	{
		echo "<option value='" .date('g:i A', $j). "'>" .date('g:i A', $j). "</option>";
	}
	?>
	</select>
    <label class="checkbox">
    <input type="checkbox" id="wclose" name="wclose" style="margin-left:20px;"> Close
    </label>
	<br/><br/>
	 Thrusday : <select name="thstart" id="thstart" style="margin-left:16px;">
	<option value="">Select Start time</option>
	<?php
	$start = strtotime('12:00am');
	$end = strtotime('11:59pm');
	for( $j = $start; $j <= $end; $j += 900) 
	{
		echo "<option value='" .date('g:i A', $j). "'>" .date('g:i A', $j). "</option>";
	}
	?>
	</select>
    <select name="thend" id="thend" style="margin-left:20px;">
	<option value="">Select End time</option>
	<?php
	$start = strtotime('12:00am');
	$end = strtotime('11:59pm');
	for( $j = $start; $j <= $end; $j += 900) 
	{
		echo "<option value='" .date('g:i A', $j). "'>" .date('g:i A', $j). "</option>";
	}
	?>
	</select>
    <label class="checkbox">
    <input type="checkbox" id="thclose" name="thclose" style="margin-left:20px;"> Close
    </label>
	<br/><br/>
	 Friday : <select name="fstart" id="fstart" style="margin-left:34px;">
	<option value="">Select Start time</option>
	<?php
	$start = strtotime('12:00am');
	$end = strtotime('11:59pm');
	for( $j = $start; $j <= $end; $j += 900) 
	{
		echo "<option value='" .date('g:i A', $j). "'>" .date('g:i A', $j). "</option>";
	}
	?>
	</select>
    <select name="fend" id="fend" style="margin-left:20px;">
	<option value="">Select End time</option>
	<?php
	$start = strtotime('12:00am');
	$end = strtotime('11:59pm');
	for( $j = $start; $j <= $end; $j += 900) 
	{
		echo "<option value='" .date('g:i A', $j). "'>" .date('g:i A', $j). "</option>";
	}
	?>
	</select>
    <label class="checkbox">
    <input type="checkbox" id="fclose" name="fclose" style="margin-left:20px;"> Close
    </label>
	<br/><br/>
	 Saturday : <select name="sastart" id="sastart" style="margin-left:20px;">
	<option value="">Select Start time</option>
	<?php
	$start = strtotime('12:00am');
	$end = strtotime('11:59pm');
	for( $j = $start; $j <= $end; $j += 900) 
	{
		echo "<option value='" .date('g:i A', $j). "'>" .date('g:i A', $j). "</option>";
	}
	?>
	</select>
    <select name="saend" id="saend" style="margin-left:20px;">
	<option value="">Select End time</option>
	<?php
	$start = strtotime('12:00am');
	$end = strtotime('11:59pm');
	for( $j = $start; $j <= $end; $j += 900) 
	{
		echo "<option value='" .date('g:i A', $j). "'>" .date('g:i A', $j). "</option>";
	}
	?>
	</select>
    <label class="checkbox">
    <input type="checkbox" id="saclose" name="saclose" style="margin-left:20px;"> Close
    </label>
	<br/><br/>
	 Sunday : <select name="sustart" id="sustart" style="margin-left:28px;">
	<option value="">Select Start time</option>
	<?php
	$start = strtotime('12:00am');
	$end = strtotime('11:59pm');
	for( $j = $start; $j <= $end; $j += 900) 
	{
		echo "<option value='" .date('g:i A', $j). "'>" .date('g:i A', $j). "</option>";
	}
	?>
	</select>
    <select name="suend" id="suend" style="margin-left:20px;">
	<option value="">Select End time</option>
	<?php
	$start = strtotime('12:00am');
	$end = strtotime('11:59pm');
	for( $j = $start; $j <= $end; $j += 900) 
	{
		echo "<option value='" .date('g:i A', $j). "'>" .date('g:i A', $j). "</option>";
	}
	?>
	</select>
    <label class="checkbox">
    <input type="checkbox" id="suclose" name="suclose" style="margin-left:20px;"> Close
    </label>
	<br/><br/>
	
	<input type="submit" class="btn btn-primary" name="savebh" id="savebh" value="submit" >
   
    </form>
	<?php
}
add_action( 'admin_menu','business_hours_menu' );
add_action( 'widgets_init', 'lordlinus_businesshour_load' );
function lordlinus_businesshour_load() {
    register_widget( 'lordlinus_businesshour' );
}

class lordlinus_businesshour extends WP_Widget{

    	function lordlinus_businesshour() {

            $widget_ops = array( 'classname' => 'lordlinus_businesshour', 'description' => "Show your business by hours" );

            $control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'lordlinus_businesshour' );

            $this->WP_Widget( 'lordlinus_businesshour',"Lord Linus Business Hours", $widget_ops, $control_ops );
			echo "<link rel='stylesheet' type='text/css' href='".plugins_url('/bootstrap-assets/css/bootstrap.css', __FILE__)."' />";
    }

    function widget( $args, $instance ) {
            extract( $args );
			$title = apply_filters( 'widget_title', $instance['title'] );

			echo $before_widget;
			if ( ! empty( $title ) )
				echo $before_title . $title . $after_title;
			$getopionlord = get_option('lordlinus_business_hours');
			$getopionlord = unserialize($getopionlord);
			echo "<table class='table'><tr style='border-bottom:1px solid'><th>Day</th><th>Start</th><th>End</th></tr>";
			if($getopionlord['mclose'] == 'on')
			{
				echo "<tr><td>Mon</td><td>Close</td><td>Close</td></tr>";
			}
			else
			{
				echo "<tr><td>Mon</td><td>".$getopionlord['mstart']."</td><td>".$getopionlord['mend']."</td></tr>";
			}
			if($getopionlord['tuclose'] == 'on')
			{
				echo "<tr><td>Tue</td><td>Close</td><td>Close</td></tr>";
			}
			else
			{
				echo "<tr><td>Tue</td><td>".$getopionlord['tustart']."</td><td>".$getopionlord['tuend']."</td></tr>";
			}
			if($getopionlord['wclose'] == 'on')
			{
				echo "<tr><td>Wed</td><td>Close</td><td>Close</td></tr>";
			}
			else
			{
				echo "<tr><td>Wed</td><td>".$getopionlord['wstart']."</td><td>".$getopionlord['wend']."</td></tr>";
			}
			if($getopionlord['thclose'] == 'on')
			{
				echo "<tr><td>Thu</td><td>Close</td><td>Close</td></tr>";
			}
			else
			{
				echo "<tr><td>Thu</td><td>".$getopionlord['thstart']."</td><td>".$getopionlord['thend']."</td></tr>";
			}
			if($getopionlord['fclose'] == 'on')
			{
				echo "<tr><td>Fri</td><td>Close</td><td>Close</td></tr>";
			}
			else
			{
				echo "<tr><td>Fri</td><td>".$getopionlord['fstart']."</td><td>".$getopionlord['fend']."</td></tr>";
			}
			if($getopionlord['saclose'] == 'on')
			{
				echo "<tr><td>Sat</td><td>Close</td><td>Close</td></tr>";
			}
			else
			{
				echo "<tr><td>Sat</td><td>".$getopionlord['sastart']."</td><td>".$getopionlord['saend']."</td></tr>";
			}
			if($getopionlord['suclose'] == 'on')
			{
				echo "<tr><td>Sun</td><td>Close</td><td>Close</td></tr>";
			}
			else
			{
				echo "<tr><td>Sun</td><td>".$getopionlord['sustart']."</td><td>".$getopionlord['suend']."</td></tr>";
			}
			
			echo "</table>";
			
			echo $after_widget;
            
        }

        function update( $new_instance, $old_instance ) {
			   $instance = array();
			$instance['title'] = strip_tags( $new_instance['title'] );

			return $instance;

        }

        function form( $instance ) {
                  
           if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	    }
    }

?>