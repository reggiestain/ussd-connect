@extends('layout.app')
@section('content')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
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
                    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

                    <table id="datatable">
                        <thead>
                            <tr>
                                                               
                            </tr>
                        </thead>
                        @foreach($chart as $chart)                               
                        <tbody>
                            <tr>
                                <th>{{$chart->mno}}</th>
                                <td>{{$chart->network_count}}</td>
                                
                            </tr>                            
                        </tbody>
                        @endforeach
                    </table>
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
    
            var myChart = Highcharts.chart('container', {
                data: {
                    table: 'datatable'
                },
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Mobile Network Session Aggregate'
                },
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: 'Units'
                    }
                },
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.series.name + '</b><br/>' +
                                this.point.y + ' ' + this.point.name.toLowerCase();
                    }
                }
            });

       
});
</script>    
@endsection