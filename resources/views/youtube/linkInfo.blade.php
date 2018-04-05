
@extends('layouts.main')

@section('content')


@if ($info->response_type == "video")

<!-- Video / card View section-->

{{dd($info)}}

<div class="container text-center">
	<div class="row">
		<div class="col-sm-12"> 
			<div class="card mb-3" id="myCard">

				<img class="card-img-top" id="mycard-img" src="{{($info->image['max_resolution'])}}" alt="{{ ($info->title) }}">      

				<div class="card-body">

					<h5 class="card-title" id="myCard-title">{{ ($info->title) }}</h5>

					<ul class="list-inline">
						<li class="list-inline-item card-text card-details"><b>Author:</b> {{ ($info->author) }}</li>
						<li class="list-inline-item card-text card-details"><b>Duration:</b> {{ ($info->duration) }}</li>
						<li class="list-inline-item card-text card-details"><b>Views:</b> {{ ($info->views) }}</li>
					</ul>
                    
				</div>
				<div class="col-md-2 offset-md-10">
					<a class="btn btn-primary btn-block" href="{{ url('video/'.$info->video_code.'/download') }}">Download</a>
				</div>
			</div>
		</div>
	</div>
</div>             


<!-- End of Video / card View section-->

@elseif ($info->response_type == "playlist")

{{dd($info)}}

<!-- list / playlist View -->
<div class="container">
	<div class="row">
		<div class="col-sm-8 offset-sm-2">		

			<ul class="list-unstyled">

				@for ($i = 0; $i < count($info->video); $i++)



				<li class="media">
					<img class="mr-3" src="{{$info->video[$i]->thumbnail}}" alt="Generic placeholder image">
					<div class="media-body">
						<h5 class="mt-0 mb-1">{{$info->video[$i]->title}}</h5>
						<ul class="card-text list-inline" id="playlist-ul">
							<li class="list-inline-item card-text card-details"><b>Likes:</b> {{$info->video[$i]->likes}}</li>
							<li class="list-inline-item card-text card-details"><b>Duration:</b> {{$info->video[$i]->duration}}</li>
							<li class="list-inline-item card-text card-details"><b>Rating:</b> {{$info->video[$i]->rating}}</li>
						</ul>
						
					</div>

				</li>
				<div class="col-md-2 offset-md-10">
					<a class="btn btn-primary btn-block" href="{{ url('video/'.$info->video[$i]->video_code.'/download') }}">Download</a>
				</div>
				<hr>

				@endfor

			</ul>
		</div>
	</div> 
</div> 

<!-- End of list / playlist View section -->

@elseif ($info->response_type == "null" )

<!--Not a video error section-->

<p text-center id="error-paragraph">Error</p>


<!--End of error section-->

@endif


@endsection

