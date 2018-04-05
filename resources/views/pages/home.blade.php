@extends('layouts.main')


@section('content')

<!--Search Box-->
<div class="container text-center">
 <div class="row">
  <div class="col-sm-12">
    <div id="homeCard" class="card bg-light">
      <div class="card-body">
        <div class="form-group">
         <img id="homeCard-img" class="img-responsive" src="https://i.imgur.com/fJc8aAG.png">	         	          
         <h2 id="card-header">Download youtube videos with ease!</h2>

         <form action="{{ url('/youtube/link/info') }}" method="GET">
           <input name="url" type="url" required placeholder="Enter your video or playlist url here..." class="form-control">
           <button class="btn btn-outline-danger btn-lg" type="submit" id="submit">Get Info</button>
         </form>

       </div>
     </div>
   </div>
 </div>
</div>
</div>
<!--End of Search Box-->
@endsection
