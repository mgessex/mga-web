@extends('layouts.app')

@section('pagetitle')
                <div class="title-env">
                    <h1 class="title">Events Calendar</h1>
                    <p class="description">This page displays events in an interactive calendar.</p>
                </div>
@endsection

@section('content')

            <script type="text/javascript">
            // Calendar Initialization
            jQuery(document).ready(function($)
            {
                // Color Initialization
                var colors = [ 'green','red','orange' ];

                // Calendar Initialization
                $('#calendar').fullCalendar({
                    header: {
                        left: 'title',
                        center: '',
                        right: 'month,agendaWeek,agendaDay,prev,next'
                    },
                    buttonIcons: {
                        prev: 'prev fa-angle-left',
                        next: 'next fa-angle-right',
                    },
                    defaultDate: '2017-01-20',
                    editable: false,
                    eventLimit: true,
                    aspectRatio: 2,
                    
                    eventSources: [

                    @foreach($statuses as $status)
                    {
                        events: [
                            @foreach($events->where('status',$status->status) as $event)
                            {
                                id: {{ $event->id }},
                                title: '{{ $event->name }} {{ $event->attending_adults + $event->attending_youths }}/{{ $event->required_adults + $event->required_youths }}',
                                start: '{{ $event->start_date }}T{{ $event->start_time }}',
                                url: "/home/events/event?id={{ $event->id }}",
                                status: '{{ $event->status }}'
                            } @if(!$loop->last) , @endif
                            @endforeach
                        ], 
                        color: colors[{{ $loop->index }}]
                    },
                    @endforeach

                    ]

                });
            });
            </script>

            <section class="calendar-env">
                
                <div class="col-sm-12 calendar-right">
                    
                    <div class="calendar-main">
                        
                        <div id="calendar"></div>
                        
                    </div>
                    
                </div>
                
            </section>

@endsection

@section('bottomScripts')
    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="/js/fullcalendar/fullcalendar.min.css">

    <!-- Bottom Scripts -->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/TweenMax.min.js"></script>
    <script src="/js/resizeable.js"></script>
    <script src="/js/joinable.js"></script>
    <script src="/js/xenon-api.js"></script>
    <script src="/js/xenon-toggles.js"></script>
    <script src="/js/moment.min.js"></script>


    <!-- Imported scripts on this page -->
    <script src="/js/fullcalendar/fullcalendar.min.js"></script>
    <script src="/js/jquery-ui/jquery-ui.min.js"></script>
@endsection