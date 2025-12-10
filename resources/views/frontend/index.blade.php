@extends("frontend/layouts/master")
@section('title', 'Home')

<style>
    /* --- 1. 全局與捲動設定 --- */
    html { scroll-behavior: smooth; }
    body, html { 
        overflow-x: hidden; 
        /* 全局背景改為深咖啡黑，避免滑動時露出白底 */
        background-color: #0F0B09; 
    } 

    /* --- 2. 主地圖容器 (Hero Map) --- */
    .map-container {
        position: relative;
        display: inline-block;
        width: 100%;
        max-width: 70%;
        margin: 0 auto;
    }

    .map-image {
        width: 100%;
        height: auto;
        display: block;
        box-shadow: 0 10px 30px rgba(0,0,0,0.6); /* 陰影加深 */
    }

    /* --- 3. 地圖互動點 (維持金色) --- */
    .map-point {
        position: absolute;
        width: 20px;
        height: 20px;
        background-color: #D4AF37; 
        border: 2px solid #FFF8E1;
        border-radius: 50%;
        cursor: pointer;
        z-index: 10;
        transform: translate(-50%, -50%);
        box-shadow: 0 0 15px rgba(212, 175, 55, 0.4);
        transition: all 0.3s ease;
        display: block;
    }

    .map-point:hover {
        transform: translate(-50%, -50%) scale(1.3);
        background-color: #FFD700;
        border-color: #fff;
    }

    /* 呼吸燈動畫 */
    .map-point::after {
        content: '';
        position: absolute;
        top: 50%; left: 50%;
        width: 100%; height: 100%;
        background-color: rgba(212, 175, 55, 0.6);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        animation: pulse-gold 2s infinite;
    }

    @keyframes pulse-gold {
        0% { width: 100%; height: 100%; opacity: 0.8; }
        100% { width: 250%; height: 250%; opacity: 0; }
    }

    .point-label {
        position: absolute;
        left: 25px; 
        top: 50%;
        transform: translateY(-50%);
        color: #FFF8E1; /* 奶油白 */
        font-size: 14px;
        font-weight: bold;
        white-space: nowrap;
        opacity: 1;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.9);
        pointer-events: none;
        transition: all 0.3s ease;
    }

    /* --- 4. 右上角 Google Map 定位小地圖 (配色修改) --- */
    .locator-map {
        position: absolute;
        top: 20px;  
        right: 20px;    
        width: 200px; 
        height: 150px;
        
        /* 邊框改為低調的古銅金 */
        border: 1px solid #8C6B3F; 
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.7);
        z-index: 20;
        background-color: #1B120F; /* 深咖啡底 */
    }

    .locator-map iframe {
        width: 100%;
        height: 100%;
        border: 0;
        opacity: 0.75; /* 讓 Google Map 暗一點，更有質感 */
        filter: sepia(30%) hue-rotate(350deg); /* 微調地圖色調偏暖 */
        transition: opacity 0.3s;
    }
    
    .locator-map:hover iframe {
        opacity: 1;
        filter: none; /* 滑鼠移過去恢復原色 */
    }

    /* [修改] 阿里山標籤配色：金色底 + 深褐字 */
    .map-overlay-label {
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #D4AF37;
        color: #2b1b17; /* ★ 改成深咖啡色字，不要綠色 */
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
        white-space: nowrap;
        box-shadow: 0 2px 5px rgba(0,0,0,0.5);
        pointer-events: none;
    }
    
    .map-overlay-label::after {
        content: '';
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #D4AF37 transparent transparent transparent;
    }

    /* --- 5. [重點修改] 下方部落詳細資訊區配色 --- */
    .tribes-detail-container {
        /* 背景改為極深咖啡黑 */
        background-color: #0F0B09; 
        padding-top: 4rem;
        padding-bottom: 4rem;
        width: 100%;
    }

    .tribe-section {
        margin-bottom: 5rem;
        scroll-margin-top: 100px; 
        opacity: 0;
        transform: translateY(50px);
        transition: all 0.8s ease;
    }

    .tribe-section.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .tribe-header h2 {
        font-size: 2.5rem;
        color: #E6D2B5; /* 拿鐵色標題 */
        text-shadow: 0 2px 4px rgba(0,0,0,0.8);
        text-align: center;
        margin-bottom: 0.5rem;
    }

    .tribe-header .subtitle {
        color: #8C6B3F; /* 古銅金副標 */
        font-size: 1.1rem;
        letter-spacing: 0.1em;
        text-align: center;
        margin-bottom: 3rem;
    }

    /* Google Map Embed 外框 */
    .map-embed {
        width: 100%;
        height: 350px;
        border: 1px solid #5D4037; /* 深棕色邊框 */
        border-radius: 8px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.5);
        filter: grayscale(20%); /* 降低地圖飽和度，比較不搶眼 */
    }

    .farms-info { color: #d4d4d4; }

    /* [修改] 莊園卡片：改成半透明深棕色背景 */
    .farm-item {
        /* 使用漸層深棕色，更有高級感 */
        background: linear-gradient(145deg, rgba(62, 39, 35, 0.4), rgba(45, 28, 25, 0.4));
        padding: 1.5rem;
        margin-bottom: 1rem;
        border-left: 3px solid #D4AF37; /* 左側金線 */
        border-radius: 6px;
        text-align: left;
        border-top: 1px solid rgba(255,255,255,0.05); /* 上方微光 */
    }

    .farm-item h3 {
        color: #FFECB3; /* 淡金色標題 */
        margin-bottom: 0.5rem;
        font-size: 1.2rem;
    }
    
    .farm-item p {
        color: #D7CCC8; /* 淺灰咖文字 */
    }

    /* [修改] 獎章：文字改成深咖啡色 */
    .award-badge {
        background: linear-gradient(135deg, #BCAAA4 0%, #D4AF37 100%);
        color: #2b1b17; /* ★ 深咖啡字 */
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: bold;
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        margin-right: 5px;
        margin-top: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.3);
    }
    .award-badge::before { content: "🏆"; }

    /* 回到頂端按鈕 */
    .back-button {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        background: rgba(30, 20, 15, 0.9); /* 深咖啡底 */
        border: 1px solid #D4AF37;
        color: #D4AF37;
        padding: 0.8rem 1.2rem;
        border-radius: 50px;
        cursor: pointer;
        opacity: 0;
        pointer-events: none;
        transition: all 0.3s ease;
        z-index: 1000;
        font-weight: bold;
        box-shadow: 0 4px 10px rgba(0,0,0,0.5);
    }
    .back-button.visible {
        opacity: 1;
        pointer-events: auto;
    }
    .back-button:hover {
        background: #D4AF37;
        color: #2b1b17; /* Hover 變深色字 */
    }

    /* 手機版適配 */
    @media (max-width: 768px) {
        .map-container { max-width: 100%; }
        .locator-map { width: 120px; height: 90px; top: 10px; right: 10px; }
        .map-overlay-label { font-size: 10px; padding: 2px 8px; }
        .tribe-header h2 { font-size: 2rem; }
    }
</style>

@section('content')

  {{-- 1. Hero Map 區塊 --}}
  <div class="intro text-center" style="background-color: rgba(15, 11, 9, 0.85); backdrop-filter: blur(10px); border: 1px solid rgba(212, 175, 55, 0.2); border-radius: 1rem; padding: 2rem; margin-bottom: 0;">
    
    <h2 class="section-heading mb-4">
        <span class="section-heading-upper" style="color: #D4AF37;">Alishan Origin</span>
        <span class="section-heading-lower" style="color: #E6D2B5;">Mapping the Flavor</span>
    </h2>

    <div class="map-container" id="topMap">
        <img class="map-image rounded" src="{{ asset('img/map.png') }}" alt="阿里山地圖">

        <a href="#leye" class="map-point" style="top: 45%; left: 30%;"><span class="point-label">Leye 樂野</span></a>
        <a href="#dabang" class="map-point" style="top: 55%; left: 50%;"><span class="point-label">Dabang 達邦</span></a>
        <a href="#tfuya" class="map-point" style="top: 52%; left: 55%;"><span class="point-label">Tfuya 特富野</span></a>

        <div class="locator-map">
            <iframe 
                src="https://maps.google.com/maps?q=Alishan&t=p&z=6&ie=UTF8&iwloc=&output=embed" 
                loading="lazy">
            </iframe>
            <div class="map-overlay-label">阿里山抵嘉</div>
        </div>
    </div>
</div>

{{-- 2. 部落詳細介紹 (配色已更新) --}}
<div class="tribes-detail-container">
    <div class="container">

        <div class="tribe-section" id="leye">
            <div class="tribe-header">
                <h2>樂野部落 Leye</h2>
                <p class="subtitle">海拔 1200m | 楓香與蜜處理的故鄉</p>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <iframe class="map-embed" src="https://maps.google.com/maps?q=Leye+Alishan&t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col-lg-6">
                    <div class="farms-info">
                        <div class="farm-item">
                            <h3>天鵝湖咖啡莊園</h3>
                            <p>位於樂野部落核心區域，以獨特的蜜處理法聞名。莊園海拔1200公尺，終年雲霧繚繞，孕育出帶有楓糖與熟果香氣的精品咖啡豆。</p>
                            <div class="awards">
                                <span class="award-badge">2023 金獎</span>
                                <span class="award-badge">CQI 85分</span>
                            </div>
                        </div>
                        <div class="farm-item">
                            <h3>鄒築園咖啡</h3>
                            <p>傳承三代的家族莊園，堅持有機栽培。咖啡豆經日曬處理，風味層次豐富，帶有莓果與可可的尾韻。</p>
                            <div class="awards">
                                <span class="award-badge">產銷履歷</span>
                                <span class="award-badge">有機認證</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tribe-section" id="dabang">
            <div class="tribe-header">
                <h2>達邦部落 Dabang</h2>
                <p class="subtitle">海拔 1300m | 鄒族文化的起源地</p>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <iframe class="map-embed" src="https://maps.google.com/maps?q=Dabang+Alishan&t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col-lg-6">
                    <div class="farms-info">
                        <div class="farm-item">
                            <h3>山美咖啡工坊</h3>
                            <p>結合鄒族傳統智慧與現代精品咖啡技術，採用水洗與日曬混合處理法，創造出乾淨明亮且帶有花香的獨特風味。</p>
                            <div class="awards">
                                <span class="award-badge">阿里山評鑑頭等獎</span>
                            </div>
                        </div>
                        <div class="farm-item">
                            <h3>勇士咖啡莊園</h3>
                            <p>以鄒族勇士精神命名，莊園採用友善環境的耕作方式。咖啡豆經厭氧發酵處理，展現複雜的水果發酵香氣。</p>
                            <div class="awards">
                                <span class="award-badge">SCA 精品認證</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tribe-section" id="tfuya">
            <div class="tribe-header">
                <h2>特富野部落 Tfuya</h2>
                <p class="subtitle">海拔 1400m | 原始林中的水洗精粹</p>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <iframe class="map-embed" src="https://maps.google.com/maps?q=Tefuye+Alishan&t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col-lg-6">
                    <div class="farms-info">
                        <div class="farm-item">
                            <h3>雲頂咖啡園</h3>
                            <p>位於海拔最高的特富野部落，莊園被原始森林環繞。採用傳統水洗法，保留咖啡豆最純粹的風土特色，口感清新細膩。</p>
                            <div class="awards">
                                <span class="award-badge">特等獎</span>
                                <span class="award-badge">CQI 88分</span>
                            </div>
                        </div>
                        <div class="farm-item">
                            <h3>古道咖啡</h3>
                            <p>沿著舊鄒族古道建立的咖啡園，得天獨厚的微型氣候與豐富的生態系統，孕育出帶有山林氣息的精品咖啡。</p>
                            <div class="awards">
                                <span class="award-badge">雨林聯盟</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<button class="back-button" id="backButton" onclick="scrollToTop()">↑ Top</button>

<script>
    function scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    window.addEventListener('scroll', () => {
        const backButton = document.getElementById('backButton');
        const scrollY = window.scrollY;
        
        if (scrollY > 500) {
            backButton.classList.add('visible');
        } else {
            backButton.classList.remove('visible');
        }

        document.querySelectorAll('.tribe-section').forEach(section => {
            const rect = section.getBoundingClientRect();
            if (rect.top < window.innerHeight * 0.8) {
                section.classList.add('visible');
            }
        });
    });
</script>

@endsection