<?php $this->load->view('CHeader'); ?>
<?php $this->load->view($vw); ?>
<?php $this->load->view('footer'); ?>

<?php 
if($script =="")
{

}
else
{
	$this->load->view($script);
}
?>
