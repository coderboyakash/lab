@extends('layouts.pdf')

@section('content')
<style>
    .receipt_title td,th{
        border-color: white;
    }
    .receipt_title .total{
        background-color: #ddd;
    }
</style>

<div class="invoice">
    <b>
        Due date : {{date('d-m-Y')}}
    </b>
    <table class="table table-bordered" width="100%">
        <thead>
            <tr>
                <th colspan="2" width="85%">Test Name</th>
                <th width="15%">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($group['tests'] as $test)
            <tr>
                <td colspan="2" class="print_title">
                    @if(isset($test['test'])) 
                        {{$test['test']['name']}}
                    @endif
                </td>
                <td>{{$test['price']}} {{get_currency()}}</td>
            </tr>
            @endforeach

            @foreach($group['cultures'] as $culture)
            <tr>
                <td colspan="2" class="print_title">
                    @if(isset($culture['culture']))
                        {{$culture['culture']['name']}}
                    @endif
                </td>
                <td>{{$culture['price']}} {{get_currency()}}</td>
            </tr>
            @endforeach

            <tr class="receipt_title border-top">
                <td width="70%" class="no-right-border"></td>
                <td class="total">
                    <b>Subtotal</b>
                </td>
                <td class="total">{{$group['subtotal']}} {{get_currency()}}</td>
            </tr>

            <tr class="receipt_title">
                <td width="70%" class="no-right-border"></td>
                <td class="total">
                   <b>
                        Discount
                        @if(!empty($group['contract'])) <br> 
                            ( {{$group['contract']['title']}} {{$group['contract']['discount']}}% ) 
                        @endif
                   </b>
                </td>
                <td class="total">{{$group['discount']}} {{get_currency()}}</td>
            </tr>

            <tr class="receipt_title">
                <td width="70%" class="no-right-border"></td>
                <td class="total">
                    <b>Total</b>
                </td>
                <td class="total">{{$group['total']}} {{get_currency()}}</td>
            </tr>

            <tr class="receipt_title">
                <td width="70%" class="no-right-border"></td>
                <td class="total">
                    <b>
                        Paid
                    </b>
                </td>
                <td class="total">{{$group['paid']}} {{get_currency()}}</td>
            </tr>

            <tr class="receipt_title">
                <td width="70%" class="no-right-border"></td>
                <td class="total">
                    <b>Due</b>
                </td>
                <td class="total">{{$group['due']}} {{get_currency()}}</td>
            </tr>

        </tbody>
    </table>
</div>

@endsection