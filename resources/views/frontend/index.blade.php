@extends("frontend/layouts/master")
@section('title', 'Home')

<style>
    /* --- 0. 引入Google Fonts --- */
    @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Noto+Serif+TC:wght@400;700;900&family=Playfair+Display:ital,wght@1,400;1,700&display=swap');

    /* --- 1. 全局與捲動設定 --- */
    html { scroll-behavior: smooth; }
    body, html { 
        overflow-x: hidden; 
        background-color: #0F0B09; 
        /* 全局字體優先使用 思源宋體 */
        font-family: 'Noto Serif TC', 'Playfair Display', serif;
    } 

    /* --- 2. 主地圖容器 --- */
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
        box-shadow: 0 10px 30px rgba(0,0,0,0.6); 
    }

    /* --- 3. 地圖互動點 --- */
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
        color: #FFF8E1;
        font-size: 15px;
        font-weight: 700;
        letter-spacing: 1px;
        white-space: nowrap;
        opacity: 1;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.9);
        pointer-events: none;
        transition: all 0.3s ease;
    }

    /* --- 4. 台灣定位小地圖 (右上角) --- */
    .locator-map {
        position: absolute;
        top: 20px;  
        right: 20px;    
        width: 200px; 
        height: 220px;
        border: 1px solid #8C6B3F; 
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.7);
        z-index: 20;
        background-color: #1B120F;
    }

    .locator-map iframe {
        width: 100%;
        height: 100%;
        border: 0;
        opacity: 0.75;
        filter: sepia(30%) hue-rotate(350deg);
        transition: opacity 0.3s;
    }
    
    .locator-map:hover iframe {
        opacity: 1;
        filter: none;
    }

    /* --- 5. 字體與標題設計 --- */
    .intro {
        /* 讓文字容器稍微往下推一點，視覺更平衡 */
        padding-top: 3rem !important; 
    }

    .section-heading {
        position: relative;
        padding-bottom: 30px;
        /* 使用 Flex 讓標題置中且垂直排列 */
        display: flex;
        flex-direction: column;
        align_items: center;
        justify-content: center;
    }

    /* 上方小標 */
    .heading-decoration {
        font-family: 'Cinzel', serif;
        font-size: 0.9rem;
        color: #8C6B3F;
        letter-spacing: 0.4em;
        text-transform: uppercase;
        margin-bottom: 10px;
        opacity: 0.8;
    }

    /* 主標題：阿里山 */
    .section-heading-main {
        display: block;
        font-family: 'Noto Serif TC', serif;
        font-weight: 700; /* 極粗體 */
        font-size: 3rem;
        line-height: 1.1;
        letter-spacing: 0.05em;
        
        /* 高級金箔流動漸層 */
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
        
        margin-bottom: 10px;
    }

    /* 副標題：風味地圖 */
    .section-heading-sub {
        display: block;
        font-family: 'Noto Serif TC', serif;
        font-weight: 400;
        font-size: 1.5rem; 
        color: #E6D2B5;
        
        /* 極致的字距拉伸 */
        letter-spacing: 1.2em; 
        text-indent: 1.2em;
        
        text-shadow: 0 0 10px rgba(230, 210, 181, 0.3);
        position: relative;
    }

    /* 裝飾線 */
    .section-heading::after {
        content: '';
        display: block;
        width: 100px;
        height: 2px;
        background: linear-gradient(90deg, transparent, #D4AF37, transparent);
        margin: 25px auto 0;
        opacity: 0.7;
    }

    @keyframes shine {
        to { background-position: 200% center; }
    }

    /* --- 6. 部落詳細資訊區 --- */
    .tribes-detail-container {
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

    /* 部落標題 */
    .tribe-header h2 {
        font-family: 'Noto Serif TC', serif;
        font-weight: 700;
        font-size: 2.5rem;
        color: #E6D2B5;
        text-shadow: 0 2px 4px rgba(0,0,0,0.8);
        text-align: center;
        margin-bottom: 0.5rem;
        letter-spacing: 0.1em;
    }

    .tribe-header .subtitle {
        font-family: 'Noto Serif TC', serif;
        color: #8C6B3F;
        font-size: 1.1rem;
        letter-spacing: 0.1em;
        text-align: center;
        margin-bottom: 3rem;
    }

    .map-embed {
        width: 100%;
        height: 350px;
        border: 1px solid #5D4037;
        border-radius: 8px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.5);
        filter: grayscale(20%);
    }

    .farms-info { color: #d4d4d4; }

    .farm-item {
        background: linear-gradient(145deg, rgba(62, 39, 35, 0.4), rgba(45, 28, 25, 0.4));
        padding: 1.5rem;
        margin-bottom: 1rem;
        border-left: 3px solid #D4AF37;
        border-radius: 6px;
        text-align: left;
        border-top: 1px solid rgba(255,255,255,0.05);
    }

    /* 莊園名稱 */
    .farm-item h3 {
        font-family: 'Noto Serif TC', serif;
        color: #FFECB3;
        margin-bottom: 0.5rem;
        font-size: 1.4rem;
        letter-spacing: 0.05em;
    }
    
    .farm-item p { 
        color: #D7CCC8; 
        font-size: 1rem;
        letter-spacing: 0.02em;
    }

    .award-badge {
        background: linear-gradient(135deg, #BCAAA4 0%, #D4AF37 100%);
        color: #2b1b17;
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: bold;
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        margin-right: 5px;
        margin-top: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.3);
        font-family: 'Noto Serif TC', serif;
    }
    .award-badge::before { content: "🏆"; }

    .back-button {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        background: rgba(30, 20, 15, 0.9);
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
        font-family: 'Cinzel', serif;
    }
    .back-button.visible {
        opacity: 1;
        pointer-events: auto;
    }
    .back-button:hover {
        background: #D4AF37;
        color: #2b1b17;
    }

    /* 手機版適配 */
    @media (max-width: 768px) {
        .map-container { max-width: 100%; }
        .locator-map { width: 120px; height: 90px; top: 10px; right: 10px; }
        .section-heading-main { font-size: 3rem; }
        .section-heading-sub { font-size: 1rem; letter-spacing: 0.5em; text-indent: 0.5em; }
        .tribe-header h2 { font-size: 2rem; }
    }
</style>

@section('content')

  {{-- 1. Hero Map 區塊 --}}
  <div class="intro text-center" style="background-color: rgba(15, 11, 9, 0.85); backdrop-filter: blur(10px); border: 1px solid rgba(212, 175, 55, 0.2); border-radius: 1rem; padding: 2rem; margin-bottom: 0;">
    
    {{-- 標題區 --}}
    <div class="section-heading mb-4">
        <span class="heading-decoration">EST. TAIWAN</span>
        
        <span class="section-heading-main">阿里山</span>
        
        <span class="section-heading-sub">風味地圖</span>
    </div>

    <div class="map-container" id="topMap">
        <img class="map-image rounded" src="{{ asset('img/map.png') }}" alt="阿里山地圖">

        <a href="#leye" class="map-point" style="top: 45.9%; left: 17.4%;"><span class="point-label">樂野 Leye</span></a>
        <a href="#dabang" class="map-point" style="top: 50.6%; left: 29.6%"><span class="point-label">達邦 Tapangʉ</span></a>
        <a href="#tfuya" class="map-point" style="top: 46.7%; left: 33.7%;"><span class="point-label">特富野 Tfuya</span></a>

        <div class="locator-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1612367.2104007208!2d119.27509921556039!3d24.228330365424824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346edea144acf379%3A0x7e289d76b64185fb!2zNjA15ZiJ576p57ij6Zi_6YeM5bGx6YSJ6Zi_6YeM5bGx!5e0!3m2!1szh-TW!2stw!4v1765384310310!5m2!1szh-TW!2stw" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>

{{-- 2. 部落詳細介紹 --}}
<div class="tribes-detail-container">
    <div class="container">

        <div class="tribe-section" id="leye">
            <div class="tribe-header">
                <h2>樂野部落 Leye</h2>
                <p class="subtitle">海拔 1200m | 楓香與蜜處理的故鄉</p>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <iframe class="map-embed" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3659.7792205815686!2d120.69936207532733!3d23.46842697886377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346ee804a44b0995%3A0x1daf94114ab482b5!2z5qiC6YeO6YOo6JC9!5e0!3m2!1szh-TW!2stw!4v1765382969730!5m2!1szh-TW!2stw" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col-lg-6">
                    <div class="farms-info">
                        <div class="farm-item">
                            <h3>鄒築園</h3>
                            <p>主人: 方政倫(被稱為「咖啡王子」)</p>
                            <p>位置: 嘉義縣阿里山鄉樂野村二鄰七十一號</p>
                            <div class="awards">
                                <span class="award-badge">2017十大神農獎</span>
                                <span class="award-badge">2018亞洲咖啡生豆評鑑冠軍</span>
                                <span class="award-badge">2019兩岸咖啡三十強精品咖啡冠軍</span>
                                <span class="award-badge">2018亞洲咖啡年會生豆組第一名</span>
                                <span class="award-badge">2018年台灣國產精品咖啡豆評鑑金質獎</span>
                                <span class="award-badge">2024年台灣卓越盃咖啡國際競標總統獎認證</span>
                                <span class="award-badge">阿里山莊園咖啡精英交流賽多個獎項</span>
                            </div>
                        </div>
                        <div class="farm-item">
                            <h3>優遊吧斯瑪翡咖啡莊園</h3>
                            <p>主人: 董事長鄭虞坪</p>
                            <p>位置: 嘉義縣阿里山鄉樂野村4 鄰127-2 號</p>
                            <div class="awards">
                                <span class="award-badge">「2019臺灣國產精品咖啡豆評鑑」金質獎</span>
                                <span class="award-badge">銀質獎「2020臺灣國產精品咖啡豆評鑑」頭等獎</span>
                                <span class="award-badge">阿里山莊園咖啡精英交流賽多個獎項</span>
                                <span class="award-badge">全台第一通過國際雨林認證咖啡莊園</span>
                            </div>
                        </div>
                        <div class="farm-item">
                            <h3>鄒讚咖啡</h3>
                            <p>主人: 陳忠明</p>
                            <p>位置: 嘉義縣阿里山鄉樂野村2鄰58號</p>
                            <div class="awards">
                                <span class="award-badge">2024年阿里山莊園咖啡精英交流賽日曬組銀質獎</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tribe-section" id="dabang">
            <div class="tribe-header">
                <h2>達邦部落 Tapangʉ</h2>
                <p class="subtitle">海拔 900m | 鄒族文化的起源地</p>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <iframe class="map-embed" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3660.1852920640576!2d120.74717907478308!3d23.453779900100145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346ee784da2cdd9d%3A0x3188cc9c3afa7e6e!2z6Zi_6YeM5bGx6YSJ6YGU6YKm6YOo6JC9!5e0!3m2!1szh-TW!2stw!4v1765383102230!5m2!1szh-TW!2stw" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col-lg-6">
                    <div class="farms-info">
                        <div class="farm-item">
                            <h3>七彩琉璃咖啡莊園</h3>
                            <p>主人: 莊家榮</p>
                            <p>位置: 嘉義縣阿里山鄉達邦村七鄰</p>
                            <div class="awards">
                                <span class="award-badge">2025 COE 臺灣卓越盃咖啡國際競標」 第一名</span>
                                <span class="award-badge">全國精品咖啡豆評鑑特等獎</span>
                                <span class="award-badge">台灣咖啡節烘培大師冠軍</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tribe-section" id="tfuya">
            <div class="tribe-header">
                <h2>特富野部落 Tfuya</h2>
                <p class="subtitle">海拔 1050m | 原始林中的水洗精粹</p>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <iframe class="map-embed" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14639.590062318317!2d120.74860824436239!3d23.464160945326235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346edd8033a96bd7%3A0x7395e9f399139c2d!2zNjA15ZiJ576p57ij6Zi_6YeM5bGx6YSJ54m55a-M6YeO!5e0!3m2!1szh-TW!2stw!4v1765383149480!5m2!1szh-TW!2stw" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col-lg-6">
                    <div class="farms-info">
                        <div class="farm-item">
                            <h3>飛鼠咖啡Peisu coffee</h3>
                            <p>主人: 陳瑜安</p>
                            <p>位置: 嘉義縣阿里山鄉達邦村特富野社9鄰228號附6</p>
                            <div class="awards">
                                <span class="award-badge">2025年第二屆臺灣咖啡分類分級 TCAGs 評鑑</span>
                                <span class="award-badge">飛鼠咖啡 其他處理組 優選 (藝伎/日曬)</span>
                            </div>
                        </div>
                        <div class="farm-item">
                            <h3>他扶芽 tfu'ya有機農園</h3>
                            <p>主人: 陳清龍(龍哥)</p>
                            <p>位置: 嘉義縣阿里山鄉達邦村10鄰281-1號</p>
                            <div class="awards">
                                <span class="award-badge">阿里山莊園咖啡精英交流賽多個獎項</span>
                                <span class="award-badge">有機認證咖啡莊園</span>
                                <span class="award-badge">2017年台灣精品咖啡生豆評鑑傳統水洗組銀質獎</span>
                                <span class="award-badge">2018年台灣有機咖啡評鑑大賞水洗組與其他處理組一等獎</span>
                                <span class="award-badge">台灣國產精品咖啡豆評鑑銀質獎</span>
                                <span class="award-badge">兩岸盃30強精品咖啡交流賽 優等獎</span>
                            </div>
                        </div>
                        <div class="farm-item">
                            <h3>雅慕伊咖啡莊園</h3>
                            <p>主人: 浦瀚文</p>
                            <p>位置: 達邦村247附8號雅慕伊咖啡莊園</p>
                            <div class="awards">
                                <span class="award-badge">阿里山莊園咖啡精英交流賽多個獎項</span>
                                <span class="award-badge">2025 COE 臺灣卓越盃咖啡國際競標得主之一</span>
                                <span class="award-badge">臺灣咖啡TCAGs分級分類評鑑 精選</span>
                                <span class="award-badge">竹梅源台灣精品咖啡大賞 金賞</span>
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