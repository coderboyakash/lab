@extends('layouts.pdf')
@section('content')
<style>
    .test_title{
        font-size: 20px;
        background-color: #dddddd;
        border: 1px solid black!important;
    }
    .beak-page{
        page-break-inside: avoid;
    }
    .subtitle{
        font-size: 15px;
    }
   .comment{
       margin-top: 20px;
   }
   
   .test{
       /* page-break-inside: avoid; */
       margin-top: 20px;
    }
    .transparent{
        border-color: white;
    }
    .transparent th{
        border-color: white;
    }
    .test_head td,th{
        border: 1px solid #dee2e6;
    }
    .no-border{
        border-color: white;
    }
    .sensitivity{
        margin-top: 20px;
    }
</style>
<div class="printable">
    @php 
        $count=0;
    @endphp
    @if(count($group['tests']))
        @foreach($group['tests'] as $test)
            @php 
                $count++;
            @endphp
        <table class="table test">
            <thead>
                <tr>
                    <th  class="test_title" align="center" colspan="5">
                        <h5>{{$test['test']['name']}}</h5>
                    </th>
                </tr>
                <tr class="transparent">
                    <th colspan="5"></th>
                </tr>
                <tr class="test_head">
                    <th width="30%" class="text-left">Test</th>
                    <th width="17.5%">Result</th>
                    <th width="17.5%">Unit</th>
                    <th width="17.5%">Normal Range</th>
                    <th width="17.5%">Status</th>
                </tr>
            </thead>
            <tbody class="table-bordered">
                @foreach($test["results"] as $result)
                    <!-- Title -->
                    @if(isset($result['component']))
                        @if($result['component']['title'])
                            <tr>
                                <td colspan="5" class="component_title">
                                    <b>{{$result['component']['name']}}</b>
                                </td>
                            </tr>
                        @else
                        <tr>
                            <td class="text-captitalize">{{$result["component"]["name"]}}</td>
                            <td align="center">{{$result["result"]}}</td>
                            <td align="center">{{$result["component"]["unit"]}}</td>
                            <td align="center">{!! $result["component"]["reference_range"] !!}</td>
                            <td align="center">
                                {{$result['status']}}
                            </td>
                        </tr>
                        @endif
                    @endif
                @endforeach
                <!-- Comment -->
                @if(isset($test['comment']))
                    <tr>
                        <td colspan="5">
                            <b>Comment :</b>
                            {{$test['comment']}}
                        </td>
                    </tr>
                @endif 
                <!-- /comment -->
            </tbody>
        </table>
        @endforeach
    @endif

    @foreach($group['cultures'] as $culture)
    @php 
        $count++;
    @endphp
    @if($count>1)
    <pagebreak>
    @endif
        <!-- culture title -->
        <h5 class="test_title" align="center">
            {{$culture['culture']['name']}}
        </h5>
        <!-- /culture title -->

        <!-- culture options -->
        <table class="table" width="100%">
            <tbody>
                @foreach($culture['culture_options'] as $culture_option)
                    @if(isset($culture_option['value'])&&isset($culture_option['culture_option']))
                        <tr>
                            <th class="no-border" width="10px" nowrap="nowrap" align="left">
                                <span class="option_title">{{$culture_option['culture_option']['value']}} :</span>
                            </th>
                            <td class="no-border">
                                {{$culture_option['value']}}
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        <!-- /culture options -->

        <!-- sensitivity -->
        <table class="table table-bordered sensitivity" width="100%">
            <thead>
                <tr>
                    <th align="left">Name</th>
                    <th align="center">Sensitivity</th>
                    <th align="left">Commercial name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($culture['high_antibiotics'] as $antibiotic)
                    <tr>
                        <td width="200px" nowrap="nowrap" align="left">
                            {{$antibiotic['antibiotic']['name']}}
                        </td>
                        <td width="120px" nowrap="nowrap" align="center">
                            {{$antibiotic['sensitivity']}}
                        </td>
                        <td>
                            {{$antibiotic['antibiotic']['commercial_name']}}
                        </td>
                    </tr>
                @endforeach

                @foreach($culture['moderate_antibiotics'] as $antibiotic)
                    <tr>
                        <td width="200px" nowrap="nowrap" align="left">
                            {{$antibiotic['antibiotic']['name']}}
                        </td>
                        <td width="120px" nowrap="nowrap" align="center">
                            {{$antibiotic['sensitivity']}}
                        </td>
                        <td>
                            {{$antibiotic['antibiotic']['commercial_name']}}
                        </td>
                    </tr>
                @endforeach

                @foreach($culture['resident_antibiotics'] as $antibiotic)
                <tr>
                    <td width="200px" nowrap="nowrap" align="left">
                        {{$antibiotic['antibiotic']['name']}}
                    </td>
                    <td width="120px" nowrap="nowrap" align="center">
                        {{$antibiotic['sensitivity']}}
                    </td>
                    <td>
                        {{$antibiotic['antibiotic']['commercial_name']}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Comment -->
        @if(isset($culture['comment']))
        <table width="100%"  class="comment">
            <tbody>
                <tr>
                    <td width="10px" nowrap="nowrap no-border"><b>Comment</b> :</td>
                    <td>{{$culture['comment']}}</td>
                </tr>
            </tbody>
        </table>     
        @endif
        <!-- /comment -->
    @if($count>1)
    </pagebreak>
    @endif
    @endforeach

</div>

@endsection