@extends('site.app')
@section('title', 'Homepage')
@section('content')
<html>
<div class="container">
<img class="centre-fit"src="{{url('frontend/images/misty.jpg')}}" alt="Homepage" width="1300"
         height="450">
         </html>
<div class="content">
<h1>Welcome to Tupande Miti</h1>
<p>Where we make the Earth Greener one tree at a time</p>
</div>
</div>
<style>


.container .content {
  position: absolute; /* Position the background text */
  bottom: 0; /* At the bottom. Use top:0 to append it to the top */
  background: rgb(0, 0, 0); /* Fallback color */
  background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
  color: #f1f1f1; /* Grey text */
  width: 100%; /* Full width */
  padding: 20px; /* Some padding */
}

</style>
</html>
@stop
