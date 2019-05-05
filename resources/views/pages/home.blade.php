@extends('layout.app')
@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header bootstrap-admin-content-title">
            </div>
        </div>
    </div>
    <div class="row">        
        <div class="col-md-12">
            <div class="alert-message"></div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title"><strong>Session Table</strong> </div>
                </div>                
                <div class="panel-body">
                 <table id="example" class="table-responsive table-hover">
                        <thead>
                            <tr>                               
                                <th>Session ID</th>                                
                                <th>Phone Number</th>
                                <th>Full Name</th>
                                <th>Mobile Network</th>
                                <th>Request Status</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        @foreach($sessions as $session)
                        <tbody>   
                            <tr>
                             <td>{{$session->sessionid}}</td>
                             <td>{{$session->msisdn}}</td>
                             <td>{{$session->name.' '.$session->surname}}</td>
                             <td>{{$session->mno}}</td>
                             <td>{{$session->type}}</td>
                             <td>{{$session->created_at}}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>  
                </div>            
            </div>
        </div>
        <div class="col-md-12">
            <div class="alert-message"></div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title"><strong>Session Graph</strong> </div>
                </div>
                <div class="panel-body">
                    <div id="container" style="width:100%; height:210px;">

                    </div>
                </div
                <div class="panel-footer">

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
        //Load highchart
        $.ajax({
            //url: ,
            //type: "GET",
            //async: true,
            //dataType: 'json',
            cache: false,
            beforeSend: function () {
                    $("#container").html("<button class='btn btn-default btn-lg'>Loading...</button>");
                },
            success: function (results) {
                Highcharts.setOptions({
                    global: {
                         timezone: 'Africa/Harare'
                    }
                });
                var myChart = Highcharts.chart('container', {
                    chart: {
                        renderTo: 'Some NAME',
                        type: 'columnrange',
                        inverted: true
                    },
                    title: {
                        text: results.hrs
                    },
                    
                    yAxis: {
                        type: 'datetime',
                        title: {
                            text: 'time'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    tooltip: {
                        shared: true,
                        valueSuffix: '',
                        formatter: function () {
                            return '</b> From:<b>' + Highcharts.dateFormat('%H:%M', this.points[0].point.low) + '</b> To:<b>' + Highcharts.dateFormat('%H:%M', this.points[0].point.high);
                        }
                    },
                    series: [{
                            name: 'Testtime',
                            data: results.data
                        }]
                });

            },
            error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    //location.reload();
                }
        });
        
    });
</script>    
@endsection