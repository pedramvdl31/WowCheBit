@extends($layout)
@section('stylesheets')
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
{!! Html::style('packages/jQuery-File-Upload-9.11.2/css/jquery.fileupload.css') !!}
{!! Html::style('packages/jQuery-File-Upload-9.11.2/css/jquery.fileupload-ui.css') !!}
<noscript>{!! Html::style('packages/jQuery-File-Upload-9.11.2/css/jquery.fileupload-noscript.css') !!}</noscript>
<noscript>{!! Html::style('packages/jQuery-File-Upload-9.11.2/css/jquery.fileupload-ui-noscript.css') !!}</noscript>
@stop
@section('scripts')
<script src="/packages/tinymce/js/tinymce/tinymce.min.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- blueimp Gallery script -->
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script type="text/javascript" src="/packages/jQuery-File-Upload-9.11.2/js/vendor/jquery.ui.widget.js"></script>
<script type="text/javascript" src="/packages/jQuery-File-Upload-9.11.2/js/jquery.iframe-transport.js"></script>
<script type="text/javascript" src="/packages/jQuery-File-Upload-9.11.2/js/jquery.fileupload.js"></script>
<script type="text/javascript" src="/packages/jQuery-File-Upload-9.11.2/js/jquery.fileupload-process.js"></script>
<script type="text/javascript" src="/packages/jQuery-File-Upload-9.11.2/js/jquery.fileupload-image.js"></script>
<script type="text/javascript" src="/packages/jQuery-File-Upload-9.11.2/js/jquery.fileupload-audio.js"></script>
<script type="text/javascript" src="/packages/jQuery-File-Upload-9.11.2/js/jquery.fileupload-video.js"></script>
<script type="text/javascript" src="/packages/jQuery-File-Upload-9.11.2/js/jquery.fileupload-validate.js"></script>
<script type="text/javascript" src="/packages/jQuery-File-Upload-9.11.2/js/jquery.fileupload-jquery-ui.js"></script>
<script type="text/javascript" src="/packages/jQuery-File-Upload-9.11.2/js/jquery.fileupload-ui.js"></script>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>

        </td>
        <td>
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
              <button type="button" class="btn btn-danger remove hide" imgSrc="">
                  <i class="glyphicon glyphicon-trash"></i>
                  <span>Delete</span>
              </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<script src="/assets/js/articles/add.js"></script>
@stop

@section('content')
<div class="jumbotron">
  <h1>Articles Add</h1>
</div>
<div class="panel panel-default">

  <div class="panel-body">
  {!! Form::open(array('action' => 'ArticlesController@postEdit', 'class'=>'','id'=>'fileupload','role'=>"form")) !!}
        <input type="hidden" name="article_id" value="{{$articles['id']}}">

    <div class="form-group {{ $errors->has('title') ? 'has-error' : false }}">
      <label class="control-label" for="title">Title</label>
      {!! Form::text('title', $articles['title'], array('class'=>'form-control', 'placeholder'=>'Title')) !!}
        @foreach($errors->get('title') as $message)
            <span class='help-block'>{{ $message }}</span>
        @endforeach
    </div>

    <div class="form-group {{ $errors->has('description') ? 'has-error' : false }}">
      <label class="control-label" for="description">Description</label>
          {!! Form::textarea('content', $articles['description_html'], ['class' => 'des field form-control','size' => '30x8', 'placeholder'=>'Description']) !!}
    </div>

    <hr>
      <div class="form-group">
        <label class="control-label" for="">Image Upload</label>
      </div>    
      <div class="panel panel-default">
        
        <div class="panel-heading"><h4>Avatar Image</h4></div>
            <!-- The global progress state -->
            <div class="col-lg-12 fileupload-progress fade">
                <!-- The global progress bar -->
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                </div>
                <!-- The extended global progress state -->
                <div class="progress-extended">&nbsp;</div>
            </div>
        <div id="step1_panel" class="panel-body">
          <!-- The table listing the files available for upload/download -->
              <table id="displayImagesTable" role="presentation" class="table table-striped"><tbody class="files">
              <tr>
                @if(isset($articles['avatar']))
                  <div class="col-xs-6 col-md-3 template-upload">
                    <a href="#" class="thumbnail">
                      <img src="{!!DIRECTORY_SEPARATOR!!}assets{!!DIRECTORY_SEPARATOR!!}images{!!DIRECTORY_SEPARATOR!!}articles{!!DIRECTORY_SEPARATOR!!}perm/{!!$articles['avatar']!!}" alt="...">
                    </a>
                  </div>
                @endif
              </tr>
              </tbody></table>
        </div>
        <div class="panel-footer clearfix">
          <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
              <div class="fileupload-buttonbar">
                  <div class="col-lg-7">
                      <!-- The fileinput-button span is used to style the file input field as button -->
                      <span class="btn btn-success fileinput-button">
                          <i class="glyphicon glyphicon-plus"></i>
                          <span>Add Image</span>
                          <input type="file" name="files">
                      </span>
                      <!-- The global file processing state -->
                      <span class="fileupload-process"></span>
                  </div>
              </div>
          </div>
      </div>  
      <div id="imageDiv" class="hide">
        @if(isset($articles['avatar']))
          <input class="images" name="files[0][path]" type="hidden" value="{!!$articles['avatar']!!}"/>
        @endif
      </div>


  </div>
  <div class="panel-footer clearfix">
    <a href="{!! route('articles_index') !!} " class="btn btn-info">Back</a>
    <button class="btn btn-primary pull-right">Add</button>
  </div>
    {!! Form::close() !!}
</div>
@stop