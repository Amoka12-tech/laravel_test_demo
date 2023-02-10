<x-welcome>
    <!--Container Main start-->
    <x-createmodal />
    
    <div class="height-100 bg-light" style="height: 100vh; padding:2%">
        <h4 style="color: black; margin-top: 50px">Welcome! {{ Auth::user()->name }}</h4>

        @include('layouts.partials.__tableview')
    </div>
    <!--Container Main end-->
</x-welcome>