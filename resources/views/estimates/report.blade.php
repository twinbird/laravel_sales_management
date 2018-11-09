<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>御見積書</title>

    <!-- Styles -->
    <link href="{{ asset('css/report.css') }}" rel="stylesheet">
</head>
<body>
    <h1><span id="estimate-title">御見積書</span></h1>

    <div id="header-container">
      <div id="left-block">
        <div id="left-block-strong-area">
		  <div id="customer-name-block"><span id="customer-name">{{ $estimate->customer_name }}</span>御中</div>
          <div id="title">件名: {{ $estimate->title }}</div>
          <div id="greeting-message">下記の通り、御見積申し上げます。</div>
        </div>
  
        <div class="left-block-elements">納期: {{ $estimate->due_date->format('Y/m/d') }}</div>
        <div class="left-block-elements">支払条件: {{ $estimate->payment_term }}</div>
        <div class="left-block-elements">見積有効期限: {{ $estimate->effective_date->format('Y/m/d') }}</div>
        <div id="total-price">御見積金額:<span id="total-price-num" class="left-block-elements">{{ number_format($estimate->total_price) }} 円</span></div>
      </div>
  
      <div id="right-block">
        <div class="right-block-elements">見積番号: {{ $estimate->estimate_no }}</div>
        <div class="right-block-elements">発行日: {{ $estimate->issue_date->format('Y/m/d') }}</div>
    
        <div class="right-block-elements">{{ $estimate->self_company_name}}</div>
        <div class="right-block-elements">〒 {{ $estimate->self_postal_code }}</div>
        <div class="right-block-elements">{{ $estimate->self_address1 }}</div>
        <div class="right-block-elements">{{ $estimate->self_address2 }}</div>
        <div class="right-block-elements">TEL: {{ $estimate->self_tel }}</div>
        <div class="right-block-elements">FAX: {{ $estimate->self_fax }}</div>
      </div>
    </div>

    <div id="details-area">
      <table id="details">
        <thead>
          <tr>
            <th class="detail-no">No</th>
            <th class="detail-item-name">品名</th>
            <th class="detail-quantity">数量</th>
            <th class="detail-unit-price">単価</th>
            <th class="detail-price">金額</th>
          </tr>
        </thead>
        <tbody>
		@foreach ($estimate->estimate_details as $detail)
          <tr>
            <td class="detail-no">{{ $loop->iteration }}</td>
            <td class="detail-item-name">{{ $detail->item_name }}</td>
            <td class="detail-quantity">{{ number_format($detail->quantity) }}</td>
            <td class="detail-unit-price">{{ number_format($detail->unit_price) }}</td>
            <td class="detail-price">{{ number_format($detail->price) }}</td>
          </tr>
		@endforeach
		{{-- 最低10明細は作っておく --}}
		@for ($i = $estimate->estimate_details->count(); $i < 10; $i++)
          <tr>
            <td class="detail-no"></td>
            <td class="detail-item-name"></td>
            <td class="detail-quantity"></td>
            <td class="detail-unit-price"></td>
            <td class="detail-price"></td>
          </tr>
		@endfor
        </tbody>
      </table>
    </div>

    <div id="remarks-area">
      <div>備考:</div>
      <div id="remarks">{{ $estimate->remarks }}</div>
    </div>
</body>
</html>
