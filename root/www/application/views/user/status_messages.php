<div class="messages <?=$type?>">
<?php if (count($messages) > 1) {
  $output = "	<ul>\n";
  foreach ($messages as $message) {
    $output .= '		<li>'. $message ."</li>\n";
  }
  $output .= "	</ul>\n";
}
else {
  $output = $messages[0];
}
?>
</div>

