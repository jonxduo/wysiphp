<?php
class wysi {
	private $id;
	private $buttons;
	private $height;
	private $label;

	public $buttontpl;
	public $editor;

	function __construct($editor){
		$this->id=$editor['id'];
		$this->label=$editor['label'];
		$this->buttons=$editor['buttons'];
		$this->height=$editor['height'];
		
		$this->buttontpl=array(
			'text-format'=>'<div class="btn-group btn-group">
				<button type="button" class="btn navbar-btn dropdown-toggle" data-toggle="dropdown">
					<span class="icon-font"></span>Text format <span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="p">Normal</a></li>
					<li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1">Heading 1</a></li>
					<li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2">Heading 2</a></li>
					<li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h3">Heading 3</a></li>
					<li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h4">Heading 4</a></li>
					<li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h5">Heading 5</a></li>
					<li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h6">Heading 6</a></li>
				</ul></div>',

			'bold'=>'<button type="button" class="btn navbar-btn" data-wysihtml5-command="bold"><span class="icon-bold"></span></button>',
			'italic'=> '<button type="button" class="btn navbar-btn" data-wysihtml5-command="italic"><span class="icon-italic"></span></button>',
			'underline'=> '<button class="btn navbar-btn" data-wysihtml5-command="underline"><span class="icon-underline"></span></button>',

			'code'=>'<button type="button" href="#codemodal'.$this->id.'" role="button" class="btn navbar-btn" data-toggle="modal"><span class="icon-code"></span></button>',
			'code-modal'=>'<div id="codemodal'.$this->id.'" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
		      			<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal" aria-hidden="true"></button>
								<h3 class="modal-title">Insert code</h3>
							</div>
							<div class="modal-body">
								<textarea class="myCode form-control" rows="10"></textarea>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
								<button type="button" class="btn btn-primary" data-wisi="insert">Insert</button>
							</div>
						</div>
					</div>
				</div>',
			'quote'=>'<button type="button" href="#quotemodal'.$this->id.'" role="button" class="btn navbar-btn" data-toggle="modal"><span class="icon-quote-left"></span></button>',
			'quote-modal'=>'<div id="quotemodal'.$this->id.'" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
		      			<div class="modal-content">
							<div class="modal-header">
								<button type="button" type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal" aria-hidden="true"></button>
								<h3 class="modal-title">Insert quote</h3>
							</div>
							<div class="modal-body">
								<textarea class="myCode form-control" rows="10"></textarea>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
								<button type="button" class="btn btn-primary" data-wisi="insert">Insert</button>
							</div>
						</div>
					</div>
				</div>',

			'align-left'=> '<button type="button" class="btn navbar-btn" data-wysihtml5-command="justifyLeft"><span class="icon-align-left"></span></button>',
			'align-center'=> '<button type="button" class="btn navbar-btn" data-wysihtml5-command="justifyCenter"><span class="icon-align-center"></span></button>',
			'align-right'=> '<button type="button" class="btn navbar-btn" data-wysihtml5-command="justifyRight"><span class="icon-align-right"></span></button>',

			'list'=> '<div class="btn-group btn-group">
					<button type="button" class="btn navbar-btn" data-toggle="dropdown">
						<span class="icon-list"></span>
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li><a data-wysihtml5-command="insertOrderedList"><span class="icon-list-ol"></span>Ordered List</a></li>
						<li><a data-wysihtml5-command="insertUnorderedList"><span class="icon-list-ul"></span>Unordered List</a></li>
					</ul>
				</div>',

			'image'=> '<button type="button" href="#imagemodal'.$this->id.'" role="button" class="btn navbar-btn" data-toggle="modal"><span class="icon-picture"></span></button>',
			'image-modal'=>'<div id="imagemodal'.$this->id.'" class="modal fade" data-wysihtml5-dialog="insertImage">
					<div class="modal-dialog">
		      			<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal" aria-hidden="true"></button>
								<h3 class="modal-title icon-picture">Insert image</h3>
							</div>
							<div class="modal-body">
								<div class="input-group">
								  <span class="input-group-addon">Title</span>
								  <input type="text" class="form-control imageTitle" placeholder="Image title">
								</div><br/>
								<div class="input-group">
								  <span class="input-group-addon">URL</span>
								  <input type="text" class="form-control imageUrl" placeholder="html://">
								</div>
				    		</div>
							<div class="modal-footer">
								<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
								<button type="button" class="btn btn-primary" data-wisi="insert">Insert</button>
							</div>
						</div>
					</div>
				</div>',
			'link'=> '<button type="button" href="#linkmodal'.$this->id.'" role="button" class="btn navbar-btn" data-toggle="modal"><span class="icon-link"></span></button>',
			'link-modal'=>'<div id="linkmodal'.$this->id.'" class="modal fade" data-wysihtml5-dialog="insertImage">
					<div class="modal-dialog">
		      			<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal" aria-hidden="true"></button>
								<h3 class="modal-title">Insert link</h3>
							</div>
							<div class="modal-body">
								<div class="input-group">
								  <span class="input-group-addon">Title</span>
								  <input type="text" class="form-control linkTitle" placeholder="Link title">
								</div><br/>
								<div class="input-group">
								  <span class="input-group-addon">URL</span>
								  <input type="text" class="form-control linkUrl" placeholder="html://">
								</div>
				    		</div>
							<div class="modal-footer">
								<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
								<button type="button" class="btn btn-primary" data-wisi="insert">Insert</button>
							</div>
						</div>
					</div>
				</div>',

			'smile' => '<div class="btn-group btn-group">
					<button type="button" class="btn navbar-btn" data-toggle="dropdown">
						<span class="icon-smile"></span>
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li><a data-wysi="emo" data-emo="happy"><span class="icon-emo-happy"></span> happy</a></li>
						<li><a data-wysi="emo" data-emo="sleep"><span class="icon-emo-sleep"></span> sleep</a></li>
						<li><a data-wysi="emo" data-emo="wink"><span class="icon-emo-wink"></span> wink</a></li>
						<li><a data-wysi="emo" data-emo="wink2"><span class="icon-emo-wink2"></span> wink2</a></li>
						<li><a data-wysi="emo" data-emo="unhappy"><span class="icon-emo-unhappy"></span> unhappy</a></li>
						<li><a data-wysi="emo" data-emo="thumbsup"><span class="icon-emo-thumbsup"></span> thumbsup</a></li>
						<li><a data-wysi="emo" data-emo="devil"><span class="icon-emo-devil"></span> devil</a></li>
						<li><a data-wysi="emo" data-emo="surprised"><span class="icon-emo-surprised"></span> surprised</a></li>
						<li><a data-wysi="emo" data-emo="tongue"><span class="icon-emo-tongue"></span> tongue</a></li>
						<li><a data-wysi="emo" data-emo="coffee"><span class="icon-emo-coffee"></span> coffee</a></li>
						<li><a data-wysi="emo" data-emo="sunglasses"><span class="icon-emo-sunglasses"></span> sunglasses</a></li>
						<li><a data-wysi="emo" data-emo="displeased"><span class="icon-emo-displeased"></span> displeased</a></li>
						<li><a data-wysi="emo" data-emo="beer"><span class="icon-emo-beer"></span>  beer</a></li>
						<li><a data-wysi="emo" data-emo="grin"><span class="icon-emo-grin"></span> grin</a></li>
						<li><a data-wysi="emo" data-emo="angry"><span class="icon-emo-angry"></span> angry</a></li>
						<li><a data-wysi="emo" data-emo="saint"><span class="icon-emo-saint"></span> saint</a></li>
						<li><a data-wysi="emo" data-emo="cry"><span class="icon-emo-cry"></span> cry</a></li>
						<li><a data-wysi="emo" data-emo="shoot"><span class="icon-emo-shoot"></span>  shoot</a></li>
						<li><a data-wysi="emo" data-emo="squint"><span class="icon-emo-squint"></span> squint</a></li>
						<li><a data-wysi="emo" data-emo="laugh"><span class="icon-emo-laugh"></span> laugh</a></li>
					</ul>
				</div>',

			'source'=> '<div class="btn-group btn-group"><button type="button" role="button" class="btn navbar-btn" data-wysihtml5-action="change_view"><span class="icon-code"></span>Sorce</button></div>'
		);
		
		$this->editor=$this->getEditor();
	}

	function getEditor(){
		$html= '<div data-wysi-id="'.$this->id.'">
			<div id="toolbar'.$this->id.'" class="navbar navbar-default" style="display: none;">
				<div class="navbar-header">
					<span class="navbar-brand">'.$this->label.'</span>';

		if($this->buttons['text-format']) $html.= $this->buttontpl['text-format'];

		if($this->buttons['bold'] or $this->buttons['italic'] or $this->buttons['underline']) {
			$html.= '<div class="btn-group btn-group">';
				if($this->buttons['bold']) $html.= $this->buttontpl['bold'];
				if($this->buttons['italic']) $html.= $this->buttontpl['italic'];
				if($this->buttons['underline']) $html.= $this->buttontpl['underline'];
			$html.= '</div>';
		}

		if($this->buttons['code'] or $this->buttons['quote']) {
			$html.= '<div class="btn-group btn-group">';
				if($this->buttons['code']) $html.= $this->buttontpl['code'];
				if($this->buttons['quote']) $html.= $this->buttontpl['quote'];
			$html.= '</div>';
		}

		if($this->buttons['align-left'] or $this->buttons['align-center'] or $this->buttons['align-right']) {
			$html.= '<div class="btn-group btn-group">';
				if($this->buttons['align-left']) $html.= $this->buttontpl['align-left'];
				if($this->buttons['align-center']) $html.= $this->buttontpl['align-center'];
				if($this->buttons['align-right']) $html.= $this->buttontpl['align-right'];
			$html.= '</div>';
		}

		if($this->buttons['list']) $html.= $this->buttontpl['list'];

		if($this->buttons['image'] or $this->buttons['link']) {
			$html.= '<div class="btn-group btn-group">';
				if($this->buttons['image']) $html.= $this->buttontpl['image'];
				if($this->buttons['link']) $html.= $this->buttontpl['link'];
			$html.= '</div>';
		}

		if($this->buttons['smile']) $html.= $this->buttontpl['smile'];

		if($this->buttons['source']) $html.= $this->buttontpl['source'];

		$html.= '</div></div></div>';

		if($this->buttons['code']) $html.= $this->buttontpl['code-modal'];
		if($this->buttons['quote']) $html.= $this->buttontpl['quote-modal'];
		if($this->buttons['image']) $html.= $this->buttontpl['image-modal'];
		if($this->buttons['link']) $html.= $this->buttontpl['link-modal'];

		return $html;
	}
}
?>
