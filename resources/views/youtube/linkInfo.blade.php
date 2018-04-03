@extends('layouts.main')

@section('content')


@if ($info->response_type == "video")

<!-- Video / card View section-->

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
             </div>
         </div>
    </div>
</div>             


<!-- End of Video / card View section-->

@elseif ($info->response_type == "playlist")


<!-- list / playlist View -->
<div class="container">
	<div class="row">
        <div class="col-sm-12">		

<ul id="playlist-ul">

@for ($i = 0; $i < count($info->video); $i++)  

 <li>

<div class="card text-white bg-dark" id="playlistCard">
  <div class="card-header">
  	<p class="text-center">{{$info->video[$i]->views}} <b>Views</b></p>
  </div>
  <div class="card-body" id="playlistCard-body">
  	<ul class="card-title list-inline text-center">
  		<li class="list-inline-item card-title card-details">    
  			<img class="img-responsive" id="playlistCard-img" src="{{$info->video[$i]->thumbnail}}" alt="Card image cap"> 
  			</li>



<li class="list-inline-item card-title card-details">  
    <h5 id="playlistCard-title"> 	
    	{{$info->video[$i]->title}}
                      </h5>
                 </li>
                       



                       </ul>
    	 <ul class="card-text list-inline text-center">
    	 	<li class="list-inline-item card-text card-details"><b>Likes:</b> {{$info->video[$i]->likes}}</li>
    	 	<li class="list-inline-item card-text card-details"><b>Duration:</b> {{$info->video[$i]->duration}}</li>
    	 	<li class="list-inline-item card-text card-details"><b>Rating:</b> {{$info->video[$i]->rating}}</li>
                          </ul>

  </div>
</div>
       </li>
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

