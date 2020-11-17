<!-- Breadcrumbs-->
<ol class="breadcrumb">
<?php 
	$no = 1;
foreach ($this->uri->segments as $segment): ?>
	<?php 
		$url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segment)) . $segment;
		$is_active =  $url == $this->uri->uri_string;
	?>


	<li class="breadcrumb-item <?php echo $is_active ? 'active': '' ?>">
		<?php if($is_active): ?>
			<?php echo ucfirst($segment) ?>
		<?php else: 
			if($no == 1){
		?>
			<a href="<?php echo site_url($url.'_controller') ?>"><?php echo ucfirst($segment) ?></a>
		<?php
			}else{
		?>
			<a href="<?php echo site_url($url) ?>"><?php echo ucfirst($segment) ?></a>
		<?php
			}
		?>
			
		<?php endif; ?>
	</li>
<?php 
	$no++;
	endforeach; 
?>
</ol>