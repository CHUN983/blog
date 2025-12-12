@extends("frontend/layouts/master")
@section('title', 'Products')
@section('content')

<style>
  @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Noto+Serif+TC:wght@400;700;900&display=swap');

  .products-section {
    background-color: #0F0B09;
    padding: 4rem 0;
    font-family: 'Noto Serif TC', serif;
  }

  /* 標題樣式 - 與首頁一致 */
  .page-header {
    background: rgba(15, 11, 9, 0.9);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(212, 175, 55, 0.3);
    border-radius: 1rem;
    padding: 3rem 2rem;
    margin-bottom: 3rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
    position: relative;
    overflow: hidden;
  }

  .page-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, transparent, #D4AF37, transparent);
    opacity: 0.7;
  }

  .page-header h1 {
    font-family: 'Noto Serif TC', serif;
    font-weight: 700;
    font-size: 3rem;
    background: linear-gradient(
      135deg,
      #BF953F 0%,
      #FCF6BA 25%,
      #B38728 50%,
      #FBF5B7 75%,
      #AA771C 100%
    );
    background-size: 200% auto;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: shine 4s linear infinite;
    filter: drop-shadow(0 2px 10px rgba(0,0,0,0.5));
    letter-spacing: 0.1em;
    margin-bottom: 1rem;
  }

  @keyframes shine {
    to { background-position: 200% center; }
  }

  .page-header .lead {
    color: #E6D2B5;
    font-size: 1.2rem;
    letter-spacing: 0.3em;
    text-shadow: 0 0 10px rgba(230, 210, 181, 0.3);
    margin-bottom: 0.5rem;
  }

  .page-header p {
    color: #8C6B3F;
    font-size: 0.95rem;
    letter-spacing: 0.1em;
  }

  /* 手風琴樣式 - 金色奢華風格 */
  .accordion-item {
    border: none;
    margin-bottom: 2rem;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
    background: linear-gradient(145deg, rgba(62, 39, 35, 0.6), rgba(45, 28, 25, 0.6));
    border: 1px solid rgba(212, 175, 55, 0.2);
    transition: all 0.3s ease;
  }

  .accordion-item:hover {
    border-color: rgba(212, 175, 55, 0.4);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.7);
  }

  .accordion-button {
    background: linear-gradient(135deg, rgba(140, 107, 63, 0.3), rgba(101, 67, 33, 0.3));
    backdrop-filter: blur(5px);
    color: #FFECB3;
    font-weight: 700;
    padding: 2rem;
    border: none;
    border-bottom: 1px solid rgba(212, 175, 55, 0.1);
    transition: all 0.3s ease;
    font-family: 'Noto Serif TC', serif;
    position: relative;
  }

  .accordion-button::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    background: linear-gradient(180deg, #D4AF37, #FFD700, #D4AF37);
    box-shadow: 0 0 10px rgba(212, 175, 55, 0.5);
  }

  .accordion-button:not(.collapsed) {
    background: linear-gradient(135deg, rgba(212, 175, 55, 0.2), rgba(191, 149, 63, 0.2));
    color: #FFD700;
    box-shadow: none;
  }

  .accordion-button:hover {
    background: linear-gradient(135deg, rgba(212, 175, 55, 0.3), rgba(191, 149, 63, 0.3));
    transform: translateX(5px);
  }

  .accordion-button:focus {
    box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.25);
    border-color: #D4AF37;
  }

  .accordion-button::after {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23D4AF37'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    filter: drop-shadow(0 0 3px rgba(212, 175, 55, 0.8));
  }

  .accordion-button h3 {
    margin: 0;
    font-size: 1.8rem;
    letter-spacing: 0.08em;
    display: flex;
    align-items: center;
    gap: 0.8rem;
  }

  .accordion-button h3::before {
    content: '◆';
    color: #D4AF37;
    font-size: 1rem;
  }

  .accordion-button small {
    color: #D7CCC8;
    font-size: 0.9rem;
    letter-spacing: 0.05em;
  }

  .accordion-body {
    background: rgba(15, 11, 9, 0.8);
    padding: 2rem;
    border-top: 1px solid rgba(212, 175, 55, 0.1);
  }

  /* 咖啡卡片 - 奢華深色風格 */
  .coffee-card {
    background: linear-gradient(145deg, rgba(62, 39, 35, 0.5), rgba(45, 28, 25, 0.5));
    border: 1px solid rgba(212, 175, 55, 0.15);
    border-radius: 1rem;
    margin-bottom: 3rem;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
    transition: all 0.3s ease;
    overflow: hidden;
    position: relative;
  }

  .coffee-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(180deg, #D4AF37, #FFD700, #D4AF37);
    box-shadow: 0 0 10px rgba(212, 175, 55, 0.5);
  }

  .coffee-card:hover {
    transform: translateY(-8px);
    border-color: rgba(212, 175, 55, 0.4);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.6);
  }

  .coffee-card .card-title {
    color: #FFECB3;
    font-family: 'Noto Serif TC', serif;
    font-weight: 700;
    letter-spacing: 0.05em;
  }

  .award-badge {
    background: linear-gradient(135deg, #8C6B3F 0%, #D4AF37 50%, #8C6B3F 100%);
    color: #2b1b17;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    margin-bottom: 1rem;
    box-shadow: 0 3px 8px rgba(0,0,0,0.4);
    font-family: 'Noto Serif TC', serif;
    border: 1px solid rgba(255, 248, 225, 0.2);
    transition: all 0.2s ease;
  }

  .award-badge:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 12px rgba(212, 175, 55, 0.4);
  }

  .flavor-section {
    background: rgba(140, 107, 63, 0.15);
    border: 1px solid rgba(212, 175, 55, 0.2);
    padding: 1.5rem;
    border-radius: 0.8rem;
    margin-bottom: 1.5rem;
  }

  .flavor-section h5 {
    color: #D4AF37;
    font-family: 'Noto Serif TC', serif;
    letter-spacing: 0.1em;
    margin-bottom: 1rem;
  }

  .flavor-label {
    font-weight: 700;
    color: #8C6B3F;
    font-size: 0.9rem;
  }

  .flavor-section p {
    color: #D7CCC8;
    line-height: 1.8;
  }

  .price-option {
    border-left: 3px solid #D4AF37;
    padding-left: 1rem;
    margin-bottom: 0.8rem;
    color: #E6D2B5;
  }

  .price-option strong {
    color: #FFECB3;
  }

  .estate-info {
    font-size: 0.9rem;
    line-height: 2;
    color: #D7CCC8;
  }

  .estate-info strong {
    color: #8C6B3F;
    font-weight: 700;
  }

  .coffee-36 {
    display: inline-block;
    background: rgba(140, 107, 63, 0.3);
    border: 1px solid rgba(212, 175, 55, 0.3);
    color: #E6D2B5;
    padding: 0.4rem 0.9rem;
    border-radius: 1rem;
    margin: 0.25rem;
    font-size: 0.85rem;
    transition: all 0.2s ease;
  }

  .coffee-36:hover {
    background: rgba(212, 175, 55, 0.3);
    border-color: rgba(212, 175, 55, 0.5);
  }

  .product-image {
    width: 100%;
    height: 350px;
    object-fit: cover;
    border-radius: 0.8rem;
    border: 1px solid rgba(212, 175, 55, 0.2);
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    transition: all 0.3s ease;
  }

  .product-image:hover {
    border-color: rgba(212, 175, 55, 0.4);
    box-shadow: 0 6px 20px rgba(0,0,0,0.5);
  }

  .btn-primary {
    background: linear-gradient(135deg, #8C6B3F, #D4AF37);
    border: 1px solid #D4AF37;
    color: #2b1b17;
    font-weight: 700;
    letter-spacing: 0.1em;
    padding: 1rem 2rem;
    transition: all 0.3s ease;
    font-family: 'Noto Serif TC', serif;
  }

  .btn-primary:hover {
    background: linear-gradient(135deg, #D4AF37, #FFD700);
    border-color: #FFD700;
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(212, 175, 55, 0.4);
  }

  h5 {
    color: #D4AF37;
    font-family: 'Noto Serif TC', serif;
    letter-spacing: 0.08em;
  }
</style>

<section class="page-section products-section py-5">
  <div class="container">
    <div class="text-center page-header">
      <h1 class="display-4">臺灣阿里山精品咖啡</h1>
      <p class="lead">探索得獎莊園，品味高海拔風土</p>
      <p class="mt-3">選擇產區，探索該區域的精品咖啡</p>
    </div>

    <!-- Region Accordion -->
    <div class="accordion" id="regionAccordion">

      <!-- 樂野 Region -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingLalauya">
          <button class="accordion-button" type="button" data-toggle="collapse" data-target="#collapseLalauya" aria-expanded="true" aria-controls="collapseLalauya">
            <div class="w-100">
              <h3 class="mb-1">樂野 Lalauya</h3>
              <small>鄒築園 - 冠軍咖啡莊園 | 3 款精品咖啡</small>
            </div>
          </button>
        </h2>
        <div id="collapseLalauya" class="collapse show" aria-labelledby="headingLalauya" data-parent="#regionAccordion">
          <div class="accordion-body">

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

          </div>
        </div>
      </div>

      <!-- 特富野 Region -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTfuya">
          <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseTfuya" aria-expanded="false" aria-controls="collapseTfuya">
            <div class="w-100">
              <h3 class="mb-1">特富野 Tfu'ya</h3>
              <small>雅慕伊莊園、豆御香藝妓咖啡莊園 | 3 款精品咖啡</small>
            </div>
          </button>
        </h2>
        <div id="collapseTfuya" class="collapse" aria-labelledby="headingTfuya" data-parent="#regionAccordion">
          <div class="accordion-body">

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

          </div>
        </div>
      </div>

      <!-- 達邦村 Region -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingDabang">
          <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseDabang" aria-expanded="false" aria-controls="collapseDabang">
            <div class="w-100">
              <h3 class="mb-1">達邦村 Tapangu</h3>
              <small>飲山郁 | 3 款精品咖啡</small>
            </div>
          </button>
        </h2>
        <div id="collapseDabang" class="collapse" aria-labelledby="headingDabang" data-parent="#regionAccordion">
          <div class="accordion-body">

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
        </div>
      </div>

    </div>
  </div>
</section>

@endsection
