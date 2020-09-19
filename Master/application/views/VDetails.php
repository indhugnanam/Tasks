<?php $this->load->view('header'); ?>
<?php $this->load->view('footer'); ?>
<?php $this->load->view($vw); ?>

<?php 
if($script =="")
{

}
else
{
	$this->load->view($script);
}
?>
