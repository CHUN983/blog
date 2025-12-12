@extends("frontend/layouts/master")
@section('title', 'Products')
@section('content')

<style>
  .products-section {
    background-color: rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(10px);
  }
  .coffee-card {
    margin-bottom: 3rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
  }
  .coffee-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
  }
  .award-badge {
    font-size: 0.85rem;
    padding: 0.5rem 1rem;
    margin-bottom: 1rem;
  }
  .flavor-section {
    background-color: #f8f9fa;
    padding: 1rem;
    border-radius: 0.5rem;
    margin-bottom: 1rem;
  }
  .flavor-label {
    font-weight: bold;
    color: #6c757d;
    font-size: 0.9rem;
  }
  .price-option {
    border-left: 3px solid #d4a373;
    padding-left: 1rem;
    margin-bottom: 0.5rem;
  }
  .estate-info {
    font-size: 0.9rem;
    line-height: 1.8;
  }
  .coffee-36 {
    display: inline-block;
    background-color: #e9ecef;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    margin: 0.25rem;
    font-size: 0.85rem;
  }
  .product-image {
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 0.5rem;
  }
</style>

<section class="page-section products-section py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h1 class="display-4">臺灣阿里山精品咖啡</h1>
      <p class="lead text-muted">探索得獎莊園，品味高海拔風土</p>
    </div>

    <!-- Product 1: 鄒築園 藝伎 日曬 (2024特等獎) -->
    <div class="card coffee-card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <img src="img/tsou-chu-yuan-geisha-natural-2024.png" alt="鄒築園 藝伎 日曬" class="product-image" onerror="this.src='img/coffee-placeholder.jpg'">
          </div>
          <div class="col-md-8">
            <span class="badge bg-danger award-badge">🏆 2024 阿里山咖啡菁英交流賽 日曬組 特等獎</span>
            <h3 class="card-title mb-3">臺灣 阿里山 樂野 鄒築園 藝伎 日曬</h3>

            <div class="mb-3">
              <h5>價格選項：</h5>
              <div class="price-option">
                <strong>濾泡式掛耳 (10g)</strong> - NT$180
              </div>
              <div class="price-option">
                <strong>半磅咖啡豆 (227g)</strong> - NT$3,500
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <div class="estate-info">
                  <p class="mb-1"><strong>產區：</strong>樂野</p>
                  <p class="mb-1"><strong>種植海拔：</strong>1,300公尺</p>
                  <p class="mb-1"><strong>品種：</strong>藝伎</p>
                  <p class="mb-1"><strong>處理法：</strong>日曬處理</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="estate-info">
                  <p class="mb-1"><strong>土壤種類：</strong>黑黃土</p>
                  <p class="mb-1"><strong>莊園成立：</strong>1996年</p>
                  <p class="mb-1"><strong>種植面積：</strong>5公頃</p>
                  <p class="mb-1"><strong>年均溫/雨量：</strong>18℃ / 2,300公厘</p>
                </div>
              </div>
            </div>

            <div class="flavor-section">
              <h5 class="mb-3">黃金烘焙 - 風味描述</h5>
              <p class="mb-2"><span class="flavor-label">乾香：</span>花香、蘋果、芒果</p>
              <p class="mb-2"><span class="flavor-label">濕香：</span>白葡萄、奶油、香草</p>
              <p class="mb-3"><span class="flavor-label">啜吸：</span>清新的花香及蘋果的香甜滋味，芒果的香氣、白葡萄的微酸及奶油的甜香。</p>
              <div>
                <strong>咖啡36香：</strong>
                <span class="coffee-36">奶油味</span>
                <span class="coffee-36">咖啡花味</span>
                <span class="coffee-36">香草味</span>
                <span class="coffee-36">蘋果味</span>
              </div>
            </div>

            <a href="https://www.oklaocoffee.com/coffee/MTExNg/detail" target="_blank" class="btn btn-lg btn-primary w-100">
              <i class="bi bi-cart-fill"></i> 前往購買
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Product 2: 鄒築園 藝伎 日曬 (2023 COE第9名) -->
    <div class="card coffee-card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <img src="img/tsou-chu-yuan-geisha-natural-2024.png" alt="鄒築園 藝伎 日曬 2023" class="product-image" onerror="this.src='img/coffee-placeholder.jpg'">
          </div>
          <div class="col-md-8">
            <span class="badge bg-warning text-dark award-badge">🏆 2023 Best of Taiwan COE Pilot 第 9 名</span>
            <h3 class="card-title mb-3">臺灣 阿里山 樂野 鄒築園 藝伎 日曬</h3>

            <div class="mb-3">
              <h5>價格選項：</h5>
              <div class="price-option">
                <strong>半磅咖啡豆 (227g)</strong> - NT$5,000
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <div class="estate-info">
                  <p class="mb-1"><strong>產區：</strong>樂野</p>
                  <p class="mb-1"><strong>種植海拔：</strong>1,300公尺</p>
                  <p class="mb-1"><strong>品種：</strong>藝伎</p>
                  <p class="mb-1"><strong>處理法：</strong>日曬處理</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="estate-info">
                  <p class="mb-1"><strong>土壤種類：</strong>黑黃土</p>
                  <p class="mb-1"><strong>莊園成立：</strong>1996年</p>
                  <p class="mb-1"><strong>種植面積：</strong>5公頃</p>
                  <p class="mb-1"><strong>年均溫/雨量：</strong>18℃ / 2,300公厘</p>
                </div>
              </div>
            </div>

            <div class="flavor-section">
              <h5 class="mb-3">黃金烘焙 - 風味描述</h5>
              <p class="mb-2"><span class="flavor-label">乾香：</span>櫻桃、咖啡花</p>
              <p class="mb-2"><span class="flavor-label">濕香：</span>百香果、蘋果、柳橙</p>
              <p class="mb-3"><span class="flavor-label">啜吸：</span>百香果、櫻桃的酸甜滋味、蘋果的甜香氣帶有些許的咖啡花香，餘韻帶有柳橙些許的酸甜感。</p>
              <div>
                <strong>咖啡36香：</strong>
                <span class="coffee-36">咖啡花味</span>
                <span class="coffee-36">檸檬柑橘味</span>
                <span class="coffee-36">蘋果味</span>
              </div>
            </div>

            <a href="https://www.oklaocoffee.com/coffee/MTAzMw/detail" target="_blank" class="btn btn-lg btn-primary w-100">
              <i class="bi bi-cart-fill"></i> 前往購買
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Product 3: 鄒築園 SL34 日曬 -->
    <div class="card coffee-card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <img src="img/tsou-chu-yuan-geisha-natural-2024.png" alt="鄒築園 SL34 日曬" class="product-image" onerror="this.src='img/coffee-placeholder.jpg'">
          </div>
          <div class="col-md-8">
            <span class="badge bg-info text-dark award-badge">🏆 2025 Best of Cou 鄒族部落咖啡品鑑批次</span>
            <h3 class="card-title mb-3">臺灣 阿里山 樂野 鄒築園 SL34 日曬</h3>

            <div class="mb-3">
              <h5>價格選項：</h5>
              <div class="price-option">
                <strong>半磅咖啡豆 (227g)</strong> - NT$2,500
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <div class="estate-info">
                  <p class="mb-1"><strong>產區：</strong>樂野</p>
                  <p class="mb-1"><strong>種植海拔：</strong>1,300公尺</p>
                  <p class="mb-1"><strong>品種：</strong>SL34</p>
                  <p class="mb-1"><strong>處理法：</strong>日曬處理</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="estate-info">
                  <p class="mb-1"><strong>土壤種類：</strong>黑黃土</p>
                  <p class="mb-1"><strong>莊園成立：</strong>1996年</p>
                  <p class="mb-1"><strong>種植面積：</strong>5公頃</p>
                  <p class="mb-1"><strong>年均溫/雨量：</strong>18℃ / 2,300公厘</p>
                </div>
              </div>
            </div>

            <div class="flavor-section">
              <h5 class="mb-3">黃金烘焙 - 風味描述</h5>
              <p class="mb-2"><span class="flavor-label">乾香：</span>波羅蜜、百香果、蜜漬鳳梨、甜桃</p>
              <p class="mb-2"><span class="flavor-label">濕香：</span>甜棗、蘋果、奶油威化餅</p>
              <p class="mb-3"><span class="flavor-label">啜吸：</span>波羅蜜與百香果的奔放果香在舌尖綻放，伴隨著蜜漬鳳梨的熟成甜感，使酸甜之間取得完美平衡，甜桃的柔和果香為整體風味增添細膩層次。</p>
              <div>
                <strong>咖啡36香：</strong>
                <span class="coffee-36">奶油味</span>
                <span class="coffee-36">黑醋栗味</span>
                <span class="coffee-36">檸檬柑橘味</span>
                <span class="coffee-36">蘋果味</span>
              </div>
            </div>

            <a href="https://www.oklaocoffee.com/coffee/MTE5NA/detail" target="_blank" class="btn btn-lg btn-primary w-100">
              <i class="bi bi-cart-fill"></i> 前往購買
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Product 4: 雅慕伊莊園 藝伎 蜜處理 -->
    <div class="card coffee-card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <img src="img/yamuyi-geisha-honey.png" alt="雅慕伊莊園 藝伎 蜜處理" class="product-image" onerror="this.src='img/coffee-placeholder.jpg'">
          </div>
          <div class="col-md-8">
            <span class="badge bg-info text-dark award-badge">🏆 2025 Best of Cou 鄒族部落咖啡品鑑批次</span>
            <h3 class="card-title mb-3">臺灣 阿里山 特富野 雅慕伊莊園 藝伎 蜜處理</h3>

            <div class="mb-3">
              <h5>價格選項：</h5>
              <div class="price-option">
                <strong>半磅咖啡豆 (227g)</strong> - 請洽詢
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <div class="estate-info">
                  <p class="mb-1"><strong>產區：</strong>特富野</p>
                  <p class="mb-1"><strong>種植海拔：</strong>1,250公尺</p>
                  <p class="mb-1"><strong>品種：</strong>藝伎</p>
                  <p class="mb-1"><strong>處理法：</strong>蜜處理</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="estate-info">
                  <p class="mb-1"><strong>土壤種類：</strong>黑土</p>
                  <p class="mb-1"><strong>莊園成立：</strong>2012年</p>
                  <p class="mb-1"><strong>種植面積：</strong>3公頃</p>
                  <p class="mb-1"><strong>年均溫/雨量：</strong>20℃ / 2,200公厘</p>
                </div>
              </div>
            </div>

            <div class="flavor-section">
              <h5 class="mb-3">黃金烘焙 - 風味描述</h5>
              <p class="mb-2"><span class="flavor-label">乾香：</span>烏龍茶、香草、蜜蘋果</p>
              <p class="mb-2"><span class="flavor-label">濕香：</span>奶油、甜橙</p>
              <p class="mb-3"><span class="flavor-label">啜吸：</span>烏龍茶的淡雅茶韻帶來乾淨清爽的口感，香草的細膩甜香使風味更加柔和且富有層次，蜜蘋果的自然甜感為整體增添一抹圓潤果香、奶油的細膩質地、甜橙的明亮酸甜在口中綻放，增添一絲活潑的果酸調性。</p>
              <div>
                <strong>咖啡36香：</strong>
                <span class="coffee-36">奶油味</span>
                <span class="coffee-36">香草味</span>
                <span class="coffee-36">檸檬柑橘味</span>
                <span class="coffee-36">蘋果味</span>
              </div>
            </div>

            <a href="https://www.oklaocoffee.com/coffee/MTE5Mw/detail" target="_blank" class="btn btn-lg btn-primary w-100">
              <i class="bi bi-cart-fill"></i> 前往購買
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Product 5: 雅慕伊莊園 藝伎 日曬 (2024 CoE第五名) -->
    <div class="card coffee-card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <img src="img/yamuyi-geisha-honey.png" alt="雅慕伊莊園 藝伎 日曬" class="product-image" onerror="this.src='img/coffee-placeholder.jpg'">
          </div>
          <div class="col-md-8">
            <span class="badge bg-warning text-dark award-badge">🏆 2024 Taiwan CoE 第五名</span>
            <h3 class="card-title mb-3">臺灣 阿里山 特富野 雅慕伊莊園 藝伎 日曬</h3>

            <div class="mb-3">
              <h5>價格選項：</h5>
              <div class="price-option">
                <strong>半磅咖啡豆 (227g)</strong> - NT$7,000
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <div class="estate-info">
                  <p class="mb-1"><strong>產區：</strong>特富野</p>
                  <p class="mb-1"><strong>種植海拔：</strong>1,250公尺</p>
                  <p class="mb-1"><strong>品種：</strong>藝伎</p>
                  <p class="mb-1"><strong>處理法：</strong>日曬處理</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="estate-info">
                  <p class="mb-1"><strong>土壤種類：</strong>黑土</p>
                  <p class="mb-1"><strong>莊園成立：</strong>2012年</p>
                  <p class="mb-1"><strong>種植面積：</strong>3公頃</p>
                  <p class="mb-1"><strong>年均溫/雨量：</strong>20℃ / 2,200公厘</p>
                </div>
              </div>
            </div>

            <div class="flavor-section">
              <h5 class="mb-3">黃金烘焙 - 風味描述</h5>
              <p class="mb-2"><span class="flavor-label">乾香：</span>百香果、藍莓、桃子、深色莓果</p>
              <p class="mb-2"><span class="flavor-label">濕香：</span>柑橘、楓糖、蘋果、奶油、烏龍茶</p>
              <p class="mb-3"><span class="flavor-label">啜吸：</span>百香果及藍莓的酸甜滋味、桃子及蘋果的清新香氣帶有奶油及柑橘的甜，烏龍茶的尾韻讓整體風味增添了許多層次。</p>
              <div>
                <strong>咖啡36香：</strong>
                <span class="coffee-36">奶油味</span>
                <span class="coffee-36">檸檬柑橘味</span>
                <span class="coffee-36">焦糖味</span>
                <span class="coffee-36">蘋果味</span>
              </div>
            </div>

            <a href="https://www.oklaocoffee.com/coffee/MTE1NA/detail" target="_blank" class="btn btn-lg btn-primary w-100">
              <i class="bi bi-cart-fill"></i> 前往購買
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Product 6: 豆御香藝妓咖啡莊園 藝伎 水洗 (2023 COE第2名) -->
    <div class="card coffee-card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <img src="img/royal-bean-geisha-washed.png" alt="豆御香藝妓咖啡莊園 藝伎 水洗" class="product-image" onerror="this.src='img/coffee-placeholder.jpg'">
          </div>
          <div class="col-md-8">
            <span class="badge bg-danger award-badge">🏆 2023 Best of Taiwan COE Pilot 第 2 名</span>
            <h3 class="card-title mb-3">臺灣 阿里山 特富野 豆御香藝妓咖啡莊園 藝伎 水洗</h3>

            <div class="mb-3">
              <h5>價格選項：</h5>
              <div class="price-option">
                <strong>半磅咖啡豆 (227g)</strong> - NT$7,000
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <div class="estate-info">
                  <p class="mb-1"><strong>產區：</strong>特富野</p>
                  <p class="mb-1"><strong>種植海拔：</strong>1,200公尺</p>
                  <p class="mb-1"><strong>品種：</strong>藝伎</p>
                  <p class="mb-1"><strong>處理法：</strong>水洗處理</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="estate-info">
                  <p class="mb-1"><strong>土壤種類：</strong>黑沃土</p>
                  <p class="mb-1"><strong>莊園成立：</strong>2018年</p>
                  <p class="mb-1"><strong>種植面積：</strong>7公頃</p>
                  <p class="mb-1"><strong>年均溫/雨量：</strong>20-22℃ / 2,300公厘</p>
                </div>
              </div>
            </div>

            <div class="flavor-section">
              <h5 class="mb-3">黃金烘焙 - 風味描述</h5>
              <p class="mb-2"><span class="flavor-label">乾香：</span>茉莉花、綠茶</p>
              <p class="mb-2"><span class="flavor-label">濕香：</span>香草、蜂蜜、檸檬紅茶</p>
              <p class="mb-3"><span class="flavor-label">啜吸：</span>濃郁的花香、豐富的層次感、香草及蜂蜜的甜香氣，尾韻帶有檸檬紅茶的清新風味。</p>
              <div>
                <strong>咖啡36香：</strong>
                <span class="coffee-36">蜂蜜味</span>
                <span class="coffee-36">咖啡花味</span>
                <span class="coffee-36">香草味</span>
                <span class="coffee-36">檸檬柑橘味</span>
              </div>
            </div>

            <a href="https://www.oklaocoffee.com/coffee/MTAyOQ/detail" target="_blank" class="btn btn-lg btn-primary w-100">
              <i class="bi bi-cart-fill"></i> 前往購買
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Product 7: 飲山郁 日曬 -->
    <div class="card coffee-card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <img src="img/yinshanyu-natural.png" alt="飲山郁 日曬" class="product-image" onerror="this.src='img/coffee-placeholder.jpg'">
          </div>
          <div class="col-md-8">
            <h3 class="card-title mb-3">台灣 阿里山 達邦村 飲山郁 日曬</h3>

            <div class="mb-3">
              <h5>價格選項：</h5>
              <div class="price-option">
                <strong>咖啡豆 1/4磅 (115g)</strong> - 特價 NT$790 <small class="text-muted">(原價$850)</small>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <div class="estate-info">
                  <p class="mb-1"><strong>產區：</strong>達邦村</p>
                  <p class="mb-1"><strong>種植海拔：</strong>1,450公尺</p>
                  <p class="mb-1"><strong>品種：</strong>100% 阿拉比卡 SL34</p>
                  <p class="mb-1"><strong>處理法：</strong>日曬</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="estate-info">
                  <p class="mb-1"><strong>焙度：</strong>淺焙</p>
                  <p class="mb-1"><strong>保存期限：</strong>4個月（自烘焙日起）</p>
                  <p class="mb-1"><strong>包裝方式：</strong>單向排氣閥+保鮮夾鏈立袋</p>
                </div>
              </div>
            </div>

            <div class="flavor-section">
              <h5 class="mb-3">風味描述</h5>
              <p class="mb-3"><span class="flavor-label">風味：</span>蜜蘋果、藍莓、百香果、桂花、香瓜、甜桃、水果酒香，酸質明亮圓潤，水果甜感綿密細緻</p>
            </div>

            <a href="https://www.justincoffee.com.tw/zh-TW/products/taiwan_alishan_dabang?srsltid=AfmBOopzmXCw3vcBbzkWljGjKIzOR-vO0mvcNajl_A4vEggBeaFW-1fg" target="_blank" class="btn btn-lg btn-primary w-100">
              <i class="bi bi-cart-fill"></i> 前往購買
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Product 8: 飲山郁 厭氧日曬 -->
    <div class="card coffee-card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <img src="img/yinshanyu-natural.png" alt="飲山郁 厭氧日曬" class="product-image" onerror="this.src='img/coffee-placeholder.jpg'">
          </div>
          <div class="col-md-8">
            <span class="badge bg-success award-badge">🏆 TCAGs 優選獎批次</span>
            <h3 class="card-title mb-3">台灣 阿里山 達邦村 飲山郁 厭氧日曬</h3>

            <div class="mb-3">
              <h5>價格選項：</h5>
              <div class="price-option">
                <strong>咖啡豆 1/4磅 (115g)</strong> - 特價 NT$1,090 <small class="text-muted">(原價$1,150)</small>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <div class="estate-info">
                  <p class="mb-1"><strong>產區：</strong>達邦村</p>
                  <p class="mb-1"><strong>種植海拔：</strong>1,450公尺</p>
                  <p class="mb-1"><strong>品種：</strong>100% 阿拉比卡 SL34</p>
                  <p class="mb-1"><strong>處理法：</strong>厭氧日曬</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="estate-info">
                  <p class="mb-1"><strong>焙度：</strong>淺焙</p>
                  <p class="mb-1"><strong>保存期限：</strong>4個月（自烘焙日起）</p>
                  <p class="mb-1"><strong>包裝方式：</strong>單向排氣閥+保鮮夾鏈立袋</p>
                </div>
              </div>
            </div>

            <div class="flavor-section">
              <h5 class="mb-3">風味描述</h5>
              <p class="mb-3"><span class="flavor-label">風味：</span>草莓、奶酪、熟桃、橘汁、熱帶水果，尾韻水果紅茶香，草莓酸質，熟桃甜感</p>
            </div>

            <a href="https://www.justincoffee.com.tw/zh-TW/products/taiwan_alishan_dabang?srsltid=AfmBOopzmXCw3vcBbzkWljGjKIzOR-vO0mvcNajl_A4vEggBeaFW-1fg" target="_blank" class="btn btn-lg btn-primary w-100">
              <i class="bi bi-cart-fill"></i> 前往購買
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Product 9: 飲山郁 水洗 -->
    <div class="card coffee-card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <img src="img/yinshanyu-natural.png" alt="飲山郁 水洗" class="product-image" onerror="this.src='img/coffee-placeholder.jpg'">
          </div>
          <div class="col-md-8">
            <h3 class="card-title mb-3">台灣 阿里山 達邦村 飲山郁 水洗</h3>

            <div class="mb-3">
              <h5>價格選項：</h5>
              <div class="price-option">
                <strong>咖啡豆 1/4磅 (115g)</strong> - 特價 NT$690 <small class="text-muted">(原價$750)</small>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <div class="estate-info">
                  <p class="mb-1"><strong>產區：</strong>達邦村</p>
                  <p class="mb-1"><strong>種植海拔：</strong>1,450公尺</p>
                  <p class="mb-1"><strong>品種：</strong>100% 阿拉比卡 SL34</p>
                  <p class="mb-1"><strong>處理法：</strong>水洗</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="estate-info">
                  <p class="mb-1"><strong>焙度：</strong>淺焙</p>
                  <p class="mb-1"><strong>保存期限：</strong>4個月（自烘焙日起）</p>
                  <p class="mb-1"><strong>包裝方式：</strong>單向排氣閥+保鮮夾鏈立袋</p>
                </div>
              </div>
            </div>

            <div class="flavor-section">
              <h5 class="mb-3">風味描述</h5>
              <p class="mb-3"><span class="flavor-label">風味：</span>花香、柑橘、甜梅、柳橙、蔗糖，尾韻花蜜橙香，甜梅生津，清甜水果調，明亮滑順細膩</p>
            </div>

            <a href="https://www.justincoffee.com.tw/zh-TW/products/taiwan_alishan_dabang?srsltid=AfmBOopzmXCw3vcBbzkWljGjKIzOR-vO0mvcNajl_A4vEggBeaFW-1fg" target="_blank" class="btn btn-lg btn-primary w-100">
              <i class="bi bi-cart-fill"></i> 前往購買
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

@endsection
