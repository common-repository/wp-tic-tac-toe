<?php

/**
 * Plugin Name:       WP Tic-Tac-Toe
 * Plugin URI:        https://geeky.com.ng/wp-tic-tac-toe-plugin
 * Description:       Drive engagement to your website with the Tic-Tac-Toe Game.
 * Version:           1.7
 * Author:            Geeky Nigeria
 * Author URI:        https://geeky.com.ng
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

define("wptictactoe", plugin_dir_url(__FILE__));

add_action( 'admin_head', 'WPTTT_enq_admin_styles' );
add_action( 'wp_enqueue_scripts', 'WPTTT_enq_custom_script' );

function WPTTT_enq_admin_styles() {


 wp_register_style( 'WPTTT_CSS', wptictactoe . 'css/style.css' );
 wp_enqueue_style( 'WPTTT_CSS' );
}

add_action( 'admin_head', 'WPTTT_enq_admin_styles' );
add_action( 'admin_head', 'WPTTT_enq_custom_script' );

function WPTTT_enq_custom_script() {

wp_register_script('WPTTT_JS', wptictactoe . 'js/wpttt.js');
wp_enqueue_script('WPTTT_JS');
}

function WPTTT_GAME_Dashboard()
{
  add_menu_page( 'WP Tic-Tac-Toe', 'Wp Tic-Tac-Toe', 'manage_options', 'wptictactoe-dashboardpage', 'WPTTT_GAME_Admin', ' dashicons-games');
}
add_action('admin_menu', 'WPTTT_GAME_Dashboard');
add_shortcode( 'wp-tic-tac-toe', 'WPTTT_game_page' );

function WPTTT_GAME_Admin()
{  
?>
 <div class ="WPTTT_game-center-align"> <h1> WP Tic-Tac-Toe</h1><h2>By Geeky Nigeria</h2><br>

<p class="WPTTT_settings-intro">
	 <b>N.B</b>		The game <b>can only run once</b>. Please choose to display either on sidebar or page. Two instances of the game will trigger an error. e.g Having two games on a sidebar or displaying on a page and sidebar.
	 </p>

	 <p class="WPTTT_settings-intro">IF THE GAME DOESN'T WORK ON SIDEBAR, CREATE A PAGE AND USE THE SHORTCODE. </p>

	<p class="WPTTT_settings-intro"> Add the game to your sidebar, from <b>Appearance >> Widgets </b>, <b>or Use the shortcode in a page.</b>  </p>

		<p class="WPTTT_settings-intro"><mark>Wp Tic-Tac-Toe uses Javascript and CSS to function. Note that some optimization plugins that compress Javascript and CSS codes may cause the game to not start.</mark></p>

	<p class="WPTTT-h2">Shortcode (For page) : </p><input type="text" disabled size="10" class="WPTTT-codebxne" value="[wp-tic-tac-toe]"></div>

<?php
}

function WPTTT_game_page ()
{
	
   ob_start();
   include( 'inc/page.php' );
	$WPTTT_bar = ob_get_clean();

  return $WPTTT_bar;
	
}

/**
 * Foo_Widget Class
 */
class WPTTT_WIDGET extends WP_Widget {
	/** constructor */
	function __construct() {
		parent::WP_Widget( /* Base ID */'WPTTT_WIDGET', /* Name */'Tic-Tac-Toe Game', array( 'description' => 'Displays Tic-Tac-Toe game on sidebar' ) );
	}

	/** @see WP_Widget::widget */
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title; ?>
<div style="margin-top:-10px;padding: 3px">
<input style="-ms-transform: scale(1.1);-webkit-transform: scale(1.1);transform: scale(1.1);padding: 5px" type="radio" name="leve0" id="leve0" onclick="setlevel(0)" checked ><label for="leve0" style="padding:2px;font-family: 'Marck Script',cursive;color: black;font-weight: 900;font-size:12pt;cursor: pointer"> Beginner </label>
<input style="-ms-transform: scale(1.1);-webkit-transform: scale(1.1);transform: scale(1.1);padding:5px" type="radio" name="leve0" id="level" onclick="setlevel(1)"> <label for="level" style="padding:2px;font-family: 'Marck Script',cursive;color: black;font-weight: 900;font-size:12pt;cursor: pointer">Learner </label>
<input type="radio" name="leve0" id="leve2" onclick="setlevel(2)"><label for="leve2" style="padding:5px;font-family: 'Marck Script',cursive;color: black;font-weight: 900;font-size:12pt;cursor: pointer">Pro</label>
<input type="radio" name="leve0" id="leve3" onclick="setlevel(3)"><label for="leve3" style="padding:5px;font-family: 'Marck Script',cursive;color: black;font-weight: 900;font-size:12pt; cursor: pointer;">Geek</label>
</div><br>

<div align="center">
<table style="background-color: white;border: 1px solid lightgrey;padding: 0px;margin: 0px;border-spacing:0px; text-align:center;">
<tr>
<td style="border:1px solid lightgrey;width:85px;"><a href="javascript:setbutton(11)"><img src="<?php echo wptictactoe; ?>/images/blank.gif" name="rc11"></a></td>
<td style="border:1px solid lightgrey;width:85px;"><a href="javascript:setbutton(12)"><img src="<?php echo wptictactoe; ?>/images/blank.gif" name="rc12"></a></td>
<td style="border:1px solid lightgrey;width:85px;"><a href="javascript:setbutton(13)"><img src="<?php echo wptictactoe; ?>/images/blank.gif" name="rc13"></a></td>
</tr><tr>
<td style="border:1px solid lightgrey;width:85px;"><a href="javascript:setbutton(21)"><img src="<?php echo wptictactoe; ?>/images/blank.gif" name="rc21"></a></td>
<td style="border:1px solid lightgrey;width:85px;"><a href="javascript:setbutton(22)"><img src="<?php echo wptictactoe; ?>/images/blank.gif" name="rc22"></a></td>
<td style="border:1px solid lightgrey;width:85px;"><a href="javascript:setbutton(23)"><img src="<?php echo wptictactoe; ?>/images/blank.gif" name="rc23"></a></td>
</tr><tr>
<td style="border:1px solid lightgrey;width:85px;"><a href="javascript:setbutton(31)"><img src="<?php echo wptictactoe; ?>/images/blank.gif" name="rc31"></a></td>
<td style="border:1px solid lightgrey;width:85px;"><a href="javascript:setbutton(32)"><img src="<?php echo wptictactoe; ?>/images/blank.gif" name="rc32"></a></td>
<td style="border:1px solid lightgrey;width:85px;"><a href="javascript:setbutton(33)"><img src="<?php echo wptictactoe; ?>/images/blank.gif" name="rc33"></a></td>
</tr></table><br>
<p>

<form name="WPTTT_scores">
<table>
<tr>
<td><textarea style="width:298px;height: 195px;overflow-y:hidden;color:#008753;font-size:16pt; font-family: 'Marck Script',cursive;font-weight:bolder;padding: 0 0 0 10px;line-height: 50px;background: url('<?php echo wptictactoe; ?>/images/scoresgame.jpg');" name="scores2" ></textarea></td>
</tr>
</table>
</form>


</div>
	<div id="WPTTT_popup">
  		<div class="close"><a href="javascript:;" onclick="WPTTT_closex()">[ <?php echo "Close"; ?> ]</a></div>
        <div id="WPTTT_result"></div>
	</div>

		<?php echo $after_widget;
	}

	/** @see WP_Widget::update */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	/** @see WP_Widget::form */
	function form( $instance ) {
		if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
		}
		else {
			$title = __( 'Play Tic-Tac-Toe', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Title:'; ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<?php 
	}
} 
add_action('widgets_init','my_init_function');
function my_init_function() {
   register_widget( 'WPTTT_WIDGET' );
}
?>