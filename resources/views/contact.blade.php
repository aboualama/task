@extends('layouts.app')
  
@section('title')
 Mail us
@endsection

@push('css')
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map { height: 50%; margin : 50px; margin-top: 0; }
      /* Optional: Makes the sample page fill the window. */
      html, body { height: 100%;  margin: 0;  padding: 0; }

      #bodyContent{ font-size: 18px;  margin: 4px;  text-align: justify; }

    </style>
@endpush

@section('content')


 
<!-- banner -->
    <div class="banner10" id="home1">
        <div class="container">
            <h2>Mail Us</h2>
        </div>
    </div>
<!-- //banner -->

<!-- breadcrumbs -->
    <div class="breadcrumb_dress">
        <div class="container">
            <ul>
                <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
                <li>Mail Us</li>
            </ul>
        </div>
    </div>
<!-- //breadcrumbs -->

<!-- mail -->
    <div class="mail">
        <div class="container">
            <h3>Mail Us</h3>
            <div class="agile_mail_grids">
                <div class="col-md-5 contact-left">
                    <h4>Address</h4>
                    <p>est eligendi optio cumque nihil impedit quo minus id quod maxime
                        <span>26 56D Rescue,US</span></p>
                    <ul>
                        <li>Free Phone :+1 078 4589 2456</li>
                        <li>Telephone :+1 078 4589 2456</li>
                        <li>Fax :+1 078 4589 2456</li>
                        <li><a href="mailto:info@example.com">info@example.com</a></li>
                    </ul>
                </div>
                <div class="col-md-7 contact-left">
                    @include('errors.error')
                    <h4>Contact Form</h4>
                    <form action="{{url('/contact')}}" method="post">
                        {{ csrf_field() }} 
                        <input type="text" name="name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
                        <input type="email" name="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                        <input type="text" name="telephone" value="Telephone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone';}" required="">
                        <input style="width: 99.6%; margin-top: 10px" type="text" name="subject" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}" required="">
                        <textarea name="message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
                        <input type="submit" value="Submit" >
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div> 

        </div>
    </div>
<!-- //mail -->
 
<div id="map">  </div> 
 
@endsection

 
@push('js')  
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat:  {{ $contact['lat'] }} , lng: {{ $contact['lan'] }} },
          zoom: 15 
        }); 

        var location =  {lat:  {{ $contact['lat'] }} , lng: {{ $contact['lan'] }} };
        var marker = new google.maps.Marker({
        position: location,
        map: map,
        }); 


      var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">Lorem Ipsum</h1>'+
      '<div id="bodyContent" class="row">'+
      '<div class=" col-md-8">'+
      '<p><b>Lorem Ipsum</b>, is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>'+
      '<p>Attribution: Uluru'+
      '(last visited June 22, 2009).</p>'+
      '</div>'+
      '<div class=" col-md-4">'+ 'desktop publishing '+'</div>'+
      '</div>'+
      '</div>';

      var infowindow = new google.maps.InfoWindow({
        content: contentString
      });
 
      marker.addListener('click', function() {
        infowindow.open(map, marker);
      });
      }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwxuW2cdXbL38w9dcPOXfGLmi1J7AVVB8&callback=initMap&language=ar"
    async defer></script> 
@endpush  




{{-- 
 @push('js')

 <script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyBwxuW2cdXbL38w9dcPOXfGLmi1J7AVVB8'></script>
 <script type="text/javascript" src='{{ url('cpanel/dist/js/locationpicker.jquery.js') }}'></script>
 
 <script>
  $('#map').locationpicker({
      location: {
          latitude: {{ $contact['lat'] }},
          longitude:{{ $contact['lan'] }} 
      },
      radius: 0, 
      zoom: 15 
  });        
 
 </script>
 @endpush --}}