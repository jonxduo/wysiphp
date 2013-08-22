wysiphp
=======

simple text editor based on wysihtml5 and bootstrap
<a href="http://webcrafter.it/wysiphp/" arget="_blank">DEMO</a>



GETTING START

<ol>
  <li>
    <h4>import the necessary files</h4>
    <ul>
      <li>lib/bootstrap/css/bootstrap.min.css</li>
      <li>lib/fontello/css/fontello.css</li>
      <li>lib/wysi/wysi.css</li>
      
      <li>http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js</li>
      <li>lib/bootstrap/js/bootstrap.min.js</li>
      <li>lib/wysihtml5/advanced.js</li>
      <li>lib/wysihtml5/wysihtml5-0.3.0.min.js</li>
      <li>lib/wysi/wysi.js</li>
      
      <li>lib/wysi/wysi.php</li>
    </ul>
  </li>
  <li>
    <h4>set the php array</h4>
    <pre>
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
    </pre>
  </li>
  <li>
   <h4>create and print the editor</h4>
    <pre>
$wysi=new wysi($editor);
echo $wysi->editor;
    </pre>
  </li>
</ol>

<a href="https://github.com/jonxduo/wysiphp/blob/master/index.php" target="_blank">see index.php file</a>

<h3>I used to make this editor:</h3>
<ul>
  <li><a href="http://jquery.com/">jQuery</a>, javascript library</li>
  <li><a href="http://getbootstrap.com/">Bootstrap</a>, css framework</li>
  <li><a href="https://github.com/xing/wysihtml5">wysihtml5</a>, open source rich text editor</li>
</ul>
