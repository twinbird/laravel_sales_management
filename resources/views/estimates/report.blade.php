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
          <div id="customer-name-block"><span id="customer-name">テスト顧客1</span>御中</div>
          <div id="title">件名:案件1</div>
          <div id="greeting-message">下記の通り、御見積申し上げます。</div>
        </div>
  
        <div class="left-block-elements">納期:</div>
        <div class="left-block-elements">支払条件:月末締め翌月25日払い</div>
        <div class="left-block-elements">見積有効期限:2018/11/17</div>
        <div id="total-price">御見積金額:<span id="total-price-num" class="left-block-elements">5,000.0円</span></div>
      </div>
  
      <div id="right-block">
        <div class="right-block-elements">見積番号: 00000000000001</div>
        <div class="right-block-elements">発行日: 2018/11/09</div>
    
        <div class="right-block-elements">test</div>
        <div class="right-block-elements">〒</div>
        <div class="right-block-elements"></div>
        <div class="right-block-elements"></div>
        <div class="right-block-elements">Email:</div>
        <div class="right-block-elements">TEL:</div>
        <div class="right-block-elements">FAX:</div>
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
          <tr>
            <td class="detail-no">1</td>
            <td class="detail-item-name">サンプルA</td>
            <td class="detail-quantity">10.0</td>
            <td class="detail-unit-price">100.0</td>
            <td class="detail-price">1,000.0</td>
          </tr>
          <tr>
            <td class="detail-no">2</td>
            <td class="detail-item-name">サンプルB</td>
            <td class="detail-quantity">20.0</td>
            <td class="detail-unit-price">200.0</td>
            <td class="detail-price">4,000.0</td>
          </tr>
          <tr>
            <td class="detail-no"></td>
            <td class="detail-item-name"></td>
            <td class="detail-quantity"></td>
            <td class="detail-unit-price"></td>
            <td class="detail-price"></td>
          </tr>
          <tr>
            <td class="detail-no"></td>
            <td class="detail-item-name"></td>
            <td class="detail-quantity"></td>
            <td class="detail-unit-price"></td>
            <td class="detail-price"></td>
          </tr>
          <tr>
            <td class="detail-no"></td>
            <td class="detail-item-name"></td>
            <td class="detail-quantity"></td>
            <td class="detail-unit-price"></td>
            <td class="detail-price"></td>
          </tr>
          <tr>
            <td class="detail-no"></td>
            <td class="detail-item-name"></td>
            <td class="detail-quantity"></td>
            <td class="detail-unit-price"></td>
            <td class="detail-price"></td>
          </tr>
          <tr>
            <td class="detail-no"></td>
            <td class="detail-item-name"></td>
            <td class="detail-quantity"></td>
            <td class="detail-unit-price"></td>
            <td class="detail-price"></td>
          </tr>
          <tr>
            <td class="detail-no"></td>
            <td class="detail-item-name"></td>
            <td class="detail-quantity"></td>
            <td class="detail-unit-price"></td>
            <td class="detail-price"></td>
          </tr>
          <tr>
            <td class="detail-no"></td>
            <td class="detail-item-name"></td>
            <td class="detail-quantity"></td>
            <td class="detail-unit-price"></td>
            <td class="detail-price"></td>
          </tr>
          <tr>
            <td class="detail-no"></td>
            <td class="detail-item-name"></td>
            <td class="detail-quantity"></td>
            <td class="detail-unit-price"></td>
            <td class="detail-price"></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div id="remarks-area">
      <div>備考:</div>
      <div id="remarks">これは備考です。</div>
    </div>
</body>
</html>
