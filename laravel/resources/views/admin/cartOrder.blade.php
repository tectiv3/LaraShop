<style>
.input-group-sm>.form-control, .input-group-sm>.input-group-addon, .input-group-sm>.input-group-btn>.btn {
height: 25px;
padding: 0px 10px;
font-size: 11px;
}
.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
padding: 5px;}
</style>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="active">

                <th style=" width: 30px; "><center><small>#</small></center></th>
                <th><center><small>Название</small></center></th>
                <th style=" width: 130px; "><center><small>Количество</small></center></th>
                <th style=" width: 120px; "><center><small>Цена (грн)</small></center></th>
                <th style=" width: 20px; "><center><i class="fa fa-minus-square"></i></center></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach ($order->items as $row)
            @if ($row->product_id == 'np')
            <tr id="tr_" class="warning">

                <td style=" vertical-align: inherit; "><center><small>{{$i}}</small></center></td>
                <td style=" vertical-align: inherit; " colspan="2"><small>Курьерская доставка</small></td>

                <td id="price_" name="cost" val="" colspan="2" style=" vertical-align: inherit; "><center><small>{!! Setting::get('product.np') !!}</small></center></td>

            </tr>
            @elseif ($row->product_id == 'fast')
            <tr id="tr_" class="warning">

                <td style=" vertical-align: inherit; "><center><small>{{$i}}</small></center></td>
                <td style=" vertical-align: inherit; " colspan="2"><small>Быстрая доставка</small></td>

                <td id="price_" name="cost" val=""  style=" vertical-align: inherit; "><center><small>{!! Setting::get('product.fast') !!}</small></center></td>
                <td style=" vertical-align: inherit; "><button id="remove_item" data-id="{{$row->id}}" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></td>
            </tr>
            @elseif ($row->product_id == 'gift')
            <tr id="tr_" class="warning">

                <td style=" vertical-align: inherit; "><center><small>{{$i}}</small></center></td>
                <td style=" vertical-align: inherit; "><small>Подарочная упаковка</small></td>
                <td style=" vertical-align: inherit; "><input id="demo" class="input-sm" type="text" value="{{$row->qty}}" data-id="{{$row->id}}"></td>
                <td id="price_" name="cost" val="" style=" vertical-align: inherit; "><center><small>{!! (Setting::get('product.gift')*$row->qty) !!}</small></center></td>
                <td style=" vertical-align: inherit; "><button id="remove_item" data-id="{{$row->id}}" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></td>
            </tr>
            @else
            <tr id="tr_">

                <td style=" vertical-align: inherit; "><center><small>{{$i}}</small></center></td>
                <td style=" vertical-align: inherit; "><small>{{$row->productName}}</small></td>
                <td style=" vertical-align: inherit; "><input id="demo" class="input-sm" type="text" value="{{$row->qty}}" data-id="{{$row->id}}"></td>
                <td id="price_" name="cost" val="" style=" vertical-align: inherit; "><center><small>{!! ($row->productPrice*$row->qty) !!}</small></center></td>
                <td style=" vertical-align: inherit; "><button id="remove_item" data-id="{{$row->id}}" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></td>
            </tr>
            @endif
            <?php $i++ ?>
            @endforeach
            <tr class="active">
                <td class="text-right" colspan="2"><b><small>Всего товара:</small></b></td>
                <td class="text-left"><b><center><small>{{$totalCount}}</small></center></b></td>
                <td colspan="2"><b><center><small><div id="total_summ">{{$totalSumm}}</div></small></center></b></td>
            </tr>
        </tbody>
    </table>
</div>