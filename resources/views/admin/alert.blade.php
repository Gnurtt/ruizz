@if ( Session::has('warning') )
	<div class="alert alert-warning alert-dismissible fade show">
        <span class="alert-icon">
            <i class="anticon anticon-check-o"></i>
        </span>
        <span>{{ Session::get('warning') }}</span>
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	    </button>
	</div>
@endif
@if ( Session::has('success') )
	<div class="alert alert-success alert-dismissible fade show">
        <span class="alert-icon">
            <i class="anticon anticon-check-o"></i>
        </span>
        <span>{{ Session::get('success') }}</span>
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	    </button>
	</div>
@endif
@if ( Session::has('error') )
	<div class="alert alert-danger alert-dismissible fade show">
        <span class="alert-icon">
            <i class="anticon anticon-check-o"></i>
        </span>
        <span>{{ Session::get('error') }}</span>
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	    </button>
	</div>
@endif