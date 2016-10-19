<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Proyecto | Administración</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<?= $this->Html->meta('icon'); ?>
		<?= $this->Html->css(array(
			'/businesses-backend/css/theme-dark',
			'/businesses-backend/css/icheck/skins/flat/red',
			'/businesses-backend/css/job-style',
			'/businesses-backend/css/custom',
			/*
			'/businesses-backend/css/ion/ion.rangeSlider',
			'/businesses-backend/css/ion/ion.rangeSlider.skinFlat',
			'/businesses-backend/css/cropper/cropper.min.css',
			'/businesses-backend/css/jstree/jstree.min'
			*/
		)); ?>
		<?= $this->fetch('css'); ?>
		<?= $this->Html->scriptBlock("var webroot = '{$this->webroot}';"); ?>
		<?= $this->Html->scriptBlock("var fullwebroot = '{$this->Html->url('', true)}';"); ?>
		<?= $this->Html->script(array(
			'/businesses-backend/js/plugins/jquery/jquery.min',
			'/businesses-backend/js/plugins/jquery/jquery-ui.min',
			'/businesses-backend/js/plugins/bootstrap/bootstrap.min',
			'/businesses-backend/js/plugins/bootstrap/bootstrap-select',
			'/businesses-backend/js/plugins/bootstrap/bootstrap-datepicker',
			'/businesses-backend/js/plugins/bootstrap/bootstrap-timepicker.min',
			'/businesses-backend/js/plugins/icheck/icheck.min',
			'/businesses-backend/js/plugins/owl/owl.carousel.min',
			'/businesses-backend/js/plugins/codemirror/codemirror',
			'/businesses-backend/js/plugins/codemirror/mode/htmlmixed/htmlmixed',
			'/businesses-backend/js/plugins/codemirror/mode/xml/xml',
			'/businesses-backend/js/plugins/codemirror/mode/javascript/javascript',
			'/businesses-backend/js/plugins/codemirror/mode/css/css',
			'/businesses-backend/js/plugins/codemirror/mode/clike/clike',
			'/businesses-backend/js/plugins/codemirror/mode/php/php',
			'/businesses-backend/js/plugins/summernote/summernote',
			'/businesses-backend/js/plugins/jquery-validation/jquery.validate',
			'/businesses-backend/js/plugins/maskedinput/jquery.mask.min',
			'/businesses-backend/js/plugins/fileinput/fileinput.min',
			'/businesses-backend/js/custom',
			/*
			'/businesses-backend/js/plugins/bootstrap/bootstrap-datepicker',

			'/businesses-backend/js/plugins/icheck/icheck.min',
			'/businesses-backend/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min',
			'/businesses-backend/js/plugins/summernote/summernote',
			'/businesses-backend/js/plugins/codemirror/codemirror',
			'/businesses-backend/js/plugins/codemirror/mode/sql/sql',

			'/businesses-backend/js/plugins',
			'/businesses-backend/js/plugins/owl/owl.carousel.min',
			//'/businesses-backend/js/actions',
			//'/businesses-backend/js/demo_sliders',
			//'/businesses-backend/js/demo_charts_morris',

			'/businesses-backend/js/plugins/morris/raphael-min',
			'/businesses-backend/js/plugins/morris/morris.min',
			'/businesses-backend/js/custom',
			//'/businesses-backend/js/demo_dashboard',
			'/businesses-backend/js/plugins/ion/ion.rangeSlider.min',
			'/businesses-backend/js/plugins/rangeslider/jQAllRangeSliders-min',

			'/js/vendor/bootstrap3-typeahead'
			*/
		)); ?>
		<?= $this->fetch('script'); ?>
	</head>
	<body>
        <div class="page-container">
			<?= $this->element('businesses/menu_lateral'); ?>
            <div class="page-content">
                <?= $this->element('businesses/menu_superior'); ?>
                <?= $this->element('template/breadcrumbs');?>
				<?= $this->element('businesses/alertas'); ?>
				<?= $this->fetch('content'); ?>
			</div>
		</div>
        <audio id="audio-alert" src="<?= $this->Html->url('/businesses-backend/audio/alert.mp3'); ?>" preload="auto"></audio>
        <audio id="audio-fail" src="<?= $this->Html->url('/businesses-backend/audio/fail.mp3'); ?>" preload="auto"></audio>
		<?= $this->Html->script(array('/businesses-backend/js/actions')); ?>
    </body>
</html>
