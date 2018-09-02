<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $esg->meta['title'] ?> | <?php echo $esg->meta['description'] ?></title>
<!-- Bootstrap -->
<link href="<?php echo base_url('assets'); ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="<?php echo base_url('assets'); ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress -->
<link href="<?php echo base_url('assets'); ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- iCheck -->
<link href="<?php echo base_url('assets'); ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo mod_css('admin') ?>">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $esg->meta['image']; ?>">
<?php
switch ($esg->content)
{
	case 'admin':
		break;
	case 'user/list':
	case 'content/list':
		?>
		<!-- Datatables -->
    <link href="<?php echo base_url('assets') ?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <?php
		break;
	case 'user/edit':
		?>
		<!-- bootstrap-wysiwyg -->
    <link href="<?php echo base_url('assets') ?>/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?php echo base_url('assets') ?>/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?php echo base_url('assets') ?>/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="<?php echo base_url('assets') ?>/vendors/starrr/dist/starrr.css" rel="stylesheet">
		<?php
		break;
	default:
		?>
		<!-- bootstrap-progressbar -->
		<link href="<?php echo base_url('assets'); ?>/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
		<!-- JQVMap -->
		<link href="<?php echo base_url('assets'); ?>/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
		<!-- bootstrap-daterangepicker -->
		<link href="<?php echo base_url('assets'); ?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
		<?php
		break;
}
?>
<!-- Custom Theme Style -->
<link href="<?php echo base_url('assets'); ?>/build/css/custom.min.css" rel="stylesheet">

<meta name="keywords" content="<?php echo $esg->meta['keyword'] ?>">
<meta name="developer" content="esoftgreat.com">
<meta name="author" content="esoftgreat">
<meta name="ROBOTS" content="all, index, follow">

<meta name="url" content="<?php echo base_url() ?>">
<meta name="og:title" content="<?php echo $esg->meta['title'] ?>"/>
<meta name="og:type" content="site"/>
<meta name="og:url" content="<?php echo base_url() ?>"/>
<meta name="og:image" content="<?php echo $esg->meta['image'] ?>"/>
<meta name="og:site_name" content="<?php echo $esg->meta['title'] ?>"/>
<meta name="og:description" content="<?php echo $esg->meta['description'] ?>"/>

<meta content="<?php echo $esg->meta['image'] ?>" property="og:image"/>
<meta content="<?php echo $esg->meta['title'] ?>" property="og:title"/>
<meta content="<?php echo $esg->meta['description'] ?>" property="og:description"/>
<meta content="<?php echo $esg->meta['image'] ?>" itemprop='url'/>

<link itemprop="thumbnailUrl" href="<?php echo $esg->meta['image'] ?>">
<span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject"> <link itemprop="url" href="<?php echo $esg->meta['image'] ?>"> </span>

<link rel="shortcut icon" type="image/x-icon" href="<?php echo $esg->meta['image']; ?>">
