wysiphp
=======

simple text editor based on wysihtml5 and bootstrap



GETTING START


1 import the necessary files

<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
<link href="lib/fontello/css/fontello.css" rel="stylesheet">
<link href="lib/wysi/wysi.css" rel="stylesheet">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="lib/wysihtml5/advanced.js"></script>
<script src="lib/wysihtml5/wysihtml5-0.3.0.min.js"></script>
<script src="lib/wysi/wysi.js"></script>
<?php include('lib/wysi/wysi.php'); ?>


2 set the php array

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


3 create and print the editor

<?php				
  $wysi1=new wysi($editor);
  echo $wysi1->editor;
?>
