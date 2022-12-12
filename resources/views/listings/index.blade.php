<x-layout>

@include('partials._hero')
@include('partials._search')



{{-- <h1><?php echo $heading; ?></h1>

<?php foreach($listings as $listing): ?>
<h2>
    <?php echo $listing['title']; ?>
</h2>
  
<p>
    <?php echo $listing['description'];?>
</p>
<?php endforeach; ?> --}}

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

{{-- <h1>{{$heading}}</h1> --}}

{{-- @if(count($listings)==0)
<p>No listings found</p>
@endif --}}

@unless(count($listings)==0)

@foreach($listings as $listing)
   <x-listing-card :listing='$listing'/>
@endforeach

@else
  <p>No listings found</p>
@endunless

</div>

<div class="mt-6 p-4">
  {{$listings->links()}}
</div>


</x-layout>