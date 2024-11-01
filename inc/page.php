<?php

if (!defined('ABSPATH')) {
  die; 
} ?>

<div style="margin-top:-10px;padding: 3px" align="center">
<input style="-ms-transform: scale(1.1);-webkit-transform: scale(1.1);transform: scale(1.1);padding: 5px" type="radio" name="leve0" id="leve0" onclick="setlevel(0)" checked ><label for="leve0" style="padding:2px;font-family: 'Marck Script',cursive;color: black;font-weight: 900;font-size:14pt;cursor: pointer"> Beginner </label>
<input style="-ms-transform: scale(1.1);-webkit-transform: scale(1.1);transform: scale(1.1);padding:5px" type="radio" name="leve0" id="level" onclick="setlevel(1)"> <label for="level" style="padding:2px;font-family: 'Marck Script',cursive;color: black;font-weight: 900;font-size:14pt;cursor: pointer">Learner </label>
<input type="radio" name="leve0" id="leve2" onclick="setlevel(2)"><label for="leve2" style="padding:5px;font-family: 'Marck Script',cursive;color: black;font-weight: 900;font-size:14pt;cursor: pointer">Pro</label>
<input type="radio" name="leve0" id="leve3" onclick="setlevel(3)"><label for="leve3" style="padding:5px;font-family: 'Marck Script',cursive;color: black;font-weight: 900;font-size:14pt; cursor: pointer;">Geek</label>
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