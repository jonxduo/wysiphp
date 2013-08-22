<!DOCTYPE HTML>
<html>

	<head>
		<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
		<link href="lib/fontello/css/fontello.css" rel="stylesheet">
		<link href="lib/wysi/wysi.css" rel="stylesheet">


		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		<script src="lib/bootstrap/js/bootstrap.min.js"></script>
		<script src="lib/wysihtml5/advanced.js"></script>
		<script src="lib/wysihtml5/wysihtml5-0.3.0.min.js"></script>
		<script src="lib/wysi/wysi.js"></script>
		<script>
			$(function(){
				$('button[type="submit"]').on('click', function(e){
					e.preventDefault();
					console.log($('textarea.weditorStyle').val());
					$('.anteprima').html($('textarea.weditorStyle').val());
				})
			});
		</script>

	</head>

	<body>
		<?php 

			$editor=array(
				'id'=>'23',
				'label'=>'',
				'height'=>'20',
				'buttons'=>array(
					'text-format'=> true,
					'bold'=> true,
					'italic'=> true,
					'underline'=> true,
					'code'=> true,
					'quote'=> true,
					'align-left'=> true,
					'align-center'=> true,
					'align-right'=> true,
					'list'=> true,
					'image'=> true,
					'link'=> true,
					'smile' => true,
					'source'=> true
				)
			);

			include('lib/wysi/wysi.php');
		?>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form>
					<?php				
						$wysi1=new wysi($editor);
						echo $wysi1->editor;
					?>
					<textarea id="weditor<?php echo $editor['id']; ?>" class="weditorStyle" rows="<?php echo $editor['height']; ?>" name="weditor"></textarea>
					<button type="submit" class="btn">Salva</button>
				</form>
				<div class="anteprima"></div>
			</div>
		</div>
	</body>

</html>
