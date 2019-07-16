<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    function getMessage(id) {
        const post_data = {_token: '<?=csrf_token()?>',trip_id:id,user_id:'<?=Auth::user()->id?>'}
        $.ajax({
            type:'POST',
            url:'/cancelTrip',
            data:post_data,
            success:function(data) {
                window.location = '/main/trips'
            }
        });
    }
</script>
<!-- Include the above in your HEAD tag -->
<div style="margin-bottom:50px" class="container">
    <h2 style="margin-bottom:20px"><i>My Simple Trip App</i></h2>
    @if(isset(Auth::user()->email))
        <div class="alert alert-success success-block">
            <strong>Welcome{{Auth::user()->name}}</strong>
            <br/>
            <a href="{{url('/main/logout')}}">Logout</a>
        </div>
    @else
        <script>window.location = "/main"; </script>
    @endif
    <form action="{{url('main/newTrip')}}" method="post" name="Trip_Form">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="sel1">Select Destination Country:</label>
                    <select class="form-control" id="sel_country" name="country">
                        @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="sel1">Select Departure Date:</label>
                    <br/>
                    <input class="form-control" id="sel_departure" type="date" name="departure">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label style="visibility:hidden" for="sel1">Select Departure Date:</label>
                    <br/>
                    <button name="Submit" value="Trip" type="Submit" class="btn btn-primary form-control">Add Trip
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<div id="fullscreen_bg" class="fullscreen_bg"/>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel panel-primary">

                    <h3 class="text-center">
                        My Trips</h3>

                    <div class="panel-body">

                        <table class="table table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>Departure Date</th>
                                <th>Destination Country</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($trips))
                                @foreach($trips as $trip)
                                    <tr>
                                        <td>{{$trip->departure_date}}</td>

                                        <td>{{$trip->country->name}}</td>
                                        <td><a href="javascript:getMessage({{$trip->id}});"
                                               class="btn btn-sm btn-danger btn-block"
                                               role="button">Cancel Trip</a></td>

                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

