@extends("frontend/layouts/master")
@section('title', 'About')
@section('content')

<style>
/* 自訂樣式 */
.coffee-section {
    background-color: #f8f5f0;
    padding: 60px 0;
}

.coffee-section h2 {
    color: #7a5c3e;
    font-family: 'Lora', serif;
    font-weight: 700;
    margin-bottom: 30px;
}

.coffee-section h3 {
    color: #8b6f47;
    font-family: 'Lora', serif;
    font-weight: 600;
    margin-top: 30px;
    margin-bottom: 20px;
}

.coffee-section h4 {
    color: #9d7f5a;
    font-family: 'Raleway', sans-serif;
    font-weight: 600;
    margin-top: 25px;
    margin-bottom: 15px;
}

.coffee-intro {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #5a4a3a;
    margin-bottom: 40px;
}

/* 互動式處理法標籤 */
.process-tabs {
    border-bottom: 3px solid #7a5c3e;
    margin-bottom: 30px;
}

.process-tabs .nav-link {
    color: #8b6f47;
    font-weight: 600;
    font-size: 1.1rem;
    border: none;
    border-bottom: 3px solid transparent;
    padding: 15px 30px;
    transition: all 0.3s;
}

.process-tabs .nav-link:hover {
    color: #7a5c3e;
    background-color: #f0e8dc;
}

.process-tabs .nav-link.active {
    color: #fff;
    background-color: #7a5c3e;
    border-bottom: 3px solid #5a3f2e;
}

.process-card {
    background: #fff;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    margin-bottom: 30px;
}

.process-steps {
    background-color: #faf7f2;
    border-left: 5px solid #7a5c3e;
    padding: 20px;
    margin: 20px 0;
}

.process-steps ol {
    padding-left: 20px;
    margin-bottom: 0;
}

.process-steps li {
    margin-bottom: 15px;
    line-height: 1.8;
    color: #5a4a3a;
}

.pros-cons {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin: 20px 0;
}

.pros, .cons {
    padding: 20px;
    border-radius: 10px;
}

.pros {
    background-color: #e8f5e9;
    border-left: 5px solid #4caf50;
}

.cons {
    background-color: #ffebee;
    border-left: 5px solid #f44336;
}

.pros h5, .cons h5 {
    font-weight: 700;
    margin-bottom: 15px;
}

.pros h5 {
    color: #2e7d32;
}

.cons h5 {
    color: #c62828;
}

.pros ul, .cons ul {
    list-style: none;
    padding-left: 0;
}

.pros li:before {
    content: "✓ ";
    color: #4caf50;
    font-weight: bold;
    margin-right: 8px;
}

.cons li:before {
    content: "✗ ";
    color: #f44336;
    font-weight: bold;
    margin-right: 8px;
}

/* 手風琴式內容 */
.accordion .card {
    border: 1px solid #e0d5c7;
    margin-bottom: 10px;
    border-radius: 8px;
    overflow: hidden;
}

.accordion .card-header {
    padding: 0;
    background-color: transparent;
    border: none;
}

.accordion-button {
    width: 100%;
    background-color: #8b6f47;
    color: #fff;
    font-weight: 600;
    font-size: 1.1rem;
    padding: 15px 20px;
    border: none;
    text-align: left;
    cursor: pointer;
    transition: all 0.3s;
}

.accordion-button:hover {
    background-color: #7a5c3e;
}

.accordion-button:not(.collapsed) {
    background-color: #7a5c3e;
    color: #fff;
}

.accordion-button:focus {
    outline: none;
    box-shadow: none;
}

.accordion-body {
    padding: 25px;
    background-color: #fff;
}

.roast-level-card {
    background: linear-gradient(135deg, #f5f0e8 0%, #e8dcc8 100%);
    border-radius: 10px;
    padding: 25px;
    margin-bottom: 20px;
    border-left: 5px solid #7a5c3e;
}

.honey-comparison {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin: 30px 0;
}

.honey-card {
    padding: 25px;
    border-radius: 10px;
    text-align: center;
    color: #fff;
    transition: transform 0.3s;
}

.honey-card:hover {
    transform: translateY(-5px);
}

.honey-card h5 {
    font-weight: 700;
    margin-bottom: 15px;
}

.honey-yellow {
    background: linear-gradient(135deg, #ffd54f 0%, #ffb300 100%);
}

.honey-red {
    background: linear-gradient(135deg, #ff6f61 0%, #d84315 100%);
}

.honey-black {
    background: linear-gradient(135deg, #5d4037 0%, #3e2723 100%);
}

.flavor-badge {
    display: inline-block;
    background-color: #7a5c3e;
    color: #fff;
    padding: 8px 15px;
    border-radius: 20px;
    margin: 5px;
    font-size: 0.9rem;
}

@media (max-width: 768px) {
    .pros-cons {
        grid-template-columns: 1fr;
    }

    .process-tabs .nav-link {
        padding: 10px 15px;
        font-size: 0.95rem;
    }
}
</style>

<!-- 主標題區 -->
<section class="page-section about-heading">
    <div class="container">
        <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="img/about1.png" alt="鄒族咖啡">
        <div class="about-heading-content">
            <div class="row">
                <div class="col-xl-9 col-lg-10 mx-auto">
                    <div class="bg-faded rounded p-5">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper">鄒族咖啡農的堅持</span>
                            <span class="section-heading-lower">從種植到烘焙的勞動價值</span>
                        </h2>
                        <p class="coffee-intro">
                            每一杯咖啡的背後，都蘊含著咖啡農的辛勤付出與堅持。從高山上的咖啡樹種植、精心採收成熟果實，
                            到經過繁複的處理工序，再到精準的烘焙掌控，每個環節都是對品質的堅持。
                        </p>
                        <p class="coffee-intro mb-0">
                            讓我們一起了解咖啡從種子到杯中的精彩旅程，認識不同處理法如何影響咖啡的風味，
                            以及烘焙程度、海拔高度等因素如何造就一杯完美的咖啡。
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 咖啡知識區 -->
<section class="coffee-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h2 class="text-center mb-5">☕ 咖啡知識：從種植到烘焙</h2>

                <!-- 手風琴式內容 -->
                <div class="accordion" id="coffeeKnowledgeAccordion">

                    <!-- 烘焙程度 -->
                    <div class="card">
                        <div class="card-header">
                            <button class="accordion-button" type="button" data-toggle="collapse" data-target="#roastLevel">
                                🔥 烘焙程度：從淺烘焙到深烘焙
                            </button>
                        </div>
                        <div id="roastLevel" class="collapse show" data-parent="#coffeeKnowledgeAccordion">
                            <div class="accordion-body">
                                <p>烘焙將生咖啡豆轉化為我們研磨和沖泡的芳香瑰寶。烘焙程度會顯著影響咖啡的口感、酸度和醇厚度：</p>

                                <div class="roast-level-card">
                                    <h4>☕ 輕度烘焙 (Light Roast)</h4>
                                    <p><strong>溫度：</strong>175-190°C（第一爆）</p>
                                    <p><strong>特色：</strong>保留產地特有風味，酸度更高，柑橘或花香等清爽香氣更濃鬱，口感更輕盈。</p>
                                    <p><strong>適合：</strong>展現單一產地埃塞俄比亞或肯亞咖啡豆的果香。</p>
                                    <p><strong>注意：</strong>烘焙不足可能帶有草味。</p>
                                    <div class="mt-3">
                                        <span class="flavor-badge">柑橘</span>
                                        <span class="flavor-badge">花香</span>
                                        <span class="flavor-badge">明亮酸度</span>
                                        <span class="flavor-badge">輕盈口感</span>
                                    </div>
                                </div>

                                <div class="roast-level-card">
                                    <h4>☕ 中度烘焙 (Medium Roast)</h4>
                                    <p><strong>溫度：</strong>210-230°C</p>
                                    <p><strong>特色：</strong>完美平衡原產地風味與烘焙產生的焦糖化。酸度適中，口感較飽滿，帶有核果或淡淡巧克力香氣。</p>
                                    <p><strong>適合：</strong>哥倫比亞和巴西咖啡豆，帶來多味、令人愉悅的咖啡。</p>
                                    <div class="mt-3">
                                        <span class="flavor-badge">核果</span>
                                        <span class="flavor-badge">巧克力</span>
                                        <span class="flavor-badge">平衡酸度</span>
                                        <span class="flavor-badge">飽滿口感</span>
                                    </div>
                                </div>

                                <div class="roast-level-card">
                                    <h4>☕ 深度烘焙 (Dark Roast)</h4>
                                    <p><strong>溫度：</strong>230-250°C以上（第二爆）</p>
                                    <p><strong>特色：</strong>濃鬱、煙燻、苦甜交織的風味，酸度較低，口感醇厚。巧克力、堅果，甚至焦香的香氣佔主導。</p>
                                    <p><strong>適合：</strong>巴西拼配咖啡，獲得濃鬱的濃縮咖啡風味。</p>
                                    <p><strong>注意：</strong>咖啡因含量略少，但差異很小。可能掩蓋原產地的微妙之處。</p>
                                    <div class="mt-3">
                                        <span class="flavor-badge">濃鬱</span>
                                        <span class="flavor-badge">煙燻</span>
                                        <span class="flavor-badge">堅果</span>
                                        <span class="flavor-badge">醇厚口感</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 海拔高度 -->
                    <div class="card">
                        <div class="card-header">
                            <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#altitude">
                                ⛰️ 海拔很重要：為什麼海拔越高越好
                            </button>
                        </div>
                        <div id="altitude" class="collapse" data-parent="#coffeeKnowledgeAccordion">
                            <div class="accordion-body">
                                <p>咖啡生長在高海拔地區（通常海拔 1,200 至 2,200 公尺），較低的氣溫會減緩咖啡的成熟，從而產生密度更高、風味更濃鬱的咖啡豆。</p>

                                <h4>🏔️ 高海拔優勢</h4>
                                <div class="process-steps">
                                    <ul>
                                        <li><strong>酸度較明亮：</strong>產生清新、活潑的酸度，提升咖啡的複雜度</li>
                                        <li><strong>糖分較豐富：</strong>較長的成熟期讓咖啡櫻桃累積更多糖分</li>
                                        <li><strong>風味較細膩：</strong>呈現更多層次的風味特徵</li>
                                    </ul>
                                </div>

                                <h4>🌍 產地海拔比較</h4>
                                <div class="roast-level-card">
                                    <h5>埃塞俄比亞高原（1800-2200公尺）</h5>
                                    <p>果香濃鬱、莓果味濃，帶有花香和柑橘調性。</p>
                                </div>

                                <div class="roast-level-card">
                                    <h5>肯亞山峰（1500-2100公尺）</h5>
                                    <p>濃鬱的明亮口感，帶有紅醋栗、番茄般的酸度。</p>
                                </div>

                                <div class="roast-level-card">
                                    <h5>哥倫比亞內華達山脈（1200-2000公尺）</h5>
                                    <p>口感更甜美，花香更濃鬱，平衡的酸度。</p>
                                </div>

                                <div class="roast-level-card">
                                    <h5>巴西（800-1300公尺）</h5>
                                    <p>口感更溫和，酸度較低，帶有堅果和巧克力風味。</p>
                                </div>

                                <div class="alert alert-info mt-4">
                                    <strong>💡 選購建議：</strong>如果您追求咖啡的複雜度，可以留意包裝袋上標示「高海拔」或特定海拔的咖啡豆。
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 風味特徵 -->
                    <div class="card">
                        <div class="card-header">
                            <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#flavor">
                                🍓 風味特徵：水果口味 vs. 巧克力味
                            </button>
                        </div>
                        <div id="flavor" class="collapse" data-parent="#coffeeKnowledgeAccordion">
                            <div class="accordion-body">
                                <p>咖啡的口味並非隨機，而是受到產地、海拔、處理法等因素的影響。</p>

                                <div class="roast-level-card">
                                    <h4>🍇 果香型咖啡</h4>
                                    <p><strong>特徵：</strong>明亮、酸爽、活力四射－如同莓果、柑橘或熱帶水果的香氣。</p>
                                    <p><strong>來源：</strong>來自非洲高海拔單一產地（埃塞俄比亞和肯亞）的輕度烘焙咖啡豆。</p>
                                    <p><strong>處理法：</strong>日曬處理法能增添發酵莓果的香氣，讓果香更加明顯。</p>
                                    <div class="mt-3">
                                        <span class="flavor-badge">莓果</span>
                                        <span class="flavor-badge">柑橘</span>
                                        <span class="flavor-badge">熱帶水果</span>
                                        <span class="flavor-badge">明亮酸度</span>
                                    </div>
                                </div>

                                <div class="roast-level-card">
                                    <h4>🍫 巧克力風味咖啡</h4>
                                    <p><strong>特徵：</strong>濃鬱順滑，令人心曠神怡——帶有可可、堅果或焦糖的香氣。</p>
                                    <p><strong>來源：</strong>採用南美咖啡豆（哥倫比亞和巴西）的中度至深度烘焙。</p>
                                    <p><strong>特色：</strong>醇厚度逐漸增強，口感豐富，適合濃縮咖啡和拿鐵。</p>
                                    <div class="mt-3">
                                        <span class="flavor-badge">可可</span>
                                        <span class="flavor-badge">堅果</span>
                                        <span class="flavor-badge">焦糖</span>
                                        <span class="flavor-badge">醇厚口感</span>
                                    </div>
                                </div>

                                <div class="alert alert-success mt-4">
                                    <strong>🎯 品鑑建議：</strong>品嚐輪盤可以幫助您辨識這些風味－先從黑咖啡開始，感受咖啡的原始風味吧！
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 烘焙日期 -->
                    <div class="card">
                        <div class="card-header">
                            <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#roastDate">
                                📅 烘焙日期：新鮮度是關鍵
                            </button>
                        </div>
                        <div id="roastDate" class="collapse" data-parent="#coffeeKnowledgeAccordion">
                            <div class="accordion-body">
                                <p>咖啡很容易變質！包裝袋上的烘焙日期會告訴您咖啡的風味何時達到高峰。</p>

                                <h4>⏰ 最佳沖泡時間</h4>
                                <div class="process-steps">
                                    <ul>
                                        <li><strong>烘焙後 1-4 週：</strong>咖啡豆風味最佳的黃金期</li>
                                        <li><strong>前 24-48 小時：</strong>會釋放二氧化碳，建議稍作等候</li>
                                        <li><strong>4 週後：</strong>風味逐漸消退，酸度變得遲鈍，口感變得陳舊</li>
                                    </ul>
                                </div>

                                <h4>🏺 儲存小貼士</h4>
                                <div class="roast-level-card">
                                    <ul>
                                        <li>購買整豆，避免預先研磨</li>
                                        <li>存放於密封容器中</li>
                                        <li>避光、避熱、避潮</li>
                                        <li>沖泡前才研磨</li>
                                        <li>超過一個月可用於冷萃咖啡</li>
                                    </ul>
                                </div>

                                <div class="alert alert-warning mt-4">
                                    <strong>⚠️ 注意：</strong>生產商通常會標明「最佳食用日期」，但烘焙日期更準確——越新鮮意味著咖啡更明亮、更有活力。
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 處理法互動區 -->
<section class="coffee-section" style="background-color: #fff;">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h2 class="text-center mb-5">🌱 咖啡處理法：從果實到生豆</h2>
                <p class="text-center coffee-intro">
                    收穫後，咖啡櫻桃需要經過處理以去除果實並乾燥咖啡豆，不同的處理方法會對咖啡的風味產生重大影響。
                    讓我們透過互動式介紹，深入了解三種主要的咖啡處理法。
                </p>

                <!-- Tab 切換式處理法 -->
                <ul class="nav nav-tabs process-tabs justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="natural-tab" data-toggle="tab" href="#natural" role="tab">
                            ☀️ 日曬處理法
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="washed-tab" data-toggle="tab" href="#washed" role="tab">
                            💧 水洗處理法
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="honey-tab" data-toggle="tab" href="#honey" role="tab">
                            🍯 蜜處理法
                        </a>
                    </li>
                </ul>

                <div class="tab-content mt-4">
                    <!-- 日曬處理法 -->
                    <div class="tab-pane fade show active" id="natural" role="tabpanel">
                        <div class="process-card">
                            <h3>☀️ 日曬處理法 (Natural Process)</h3>
                            <p class="lead">咖啡豆最古老、最原始的處理方式，以陽光和時間創造獨特風味。</p>

                            <h4>📋 處理流程</h4>
                            <div class="process-steps">
                                <ol>
                                    <li><strong>採收與篩選：</strong>採收成熟的咖啡果實，並經過初步篩選，去除劣質豆或雜質。</li>
                                    <li><strong>曝曬乾燥：</strong>將咖啡果實平鋪在露台、水泥地或棚架上，利用陽光和空氣進行乾燥，通常約需 2 到 4 週。</li>
                                    <li><strong>翻動：</strong>在乾燥過程中，需要頻繁翻動果實，確保受熱和乾燥均勻，同時防止發霉。</li>
                                    <li><strong>脫殼：</strong>乾燥完成後，咖啡果實的含水量約降至 10-12%。之後再透過脫殼機去除外層的果皮、果肉與果膠，取出咖啡豆。</li>
                                </ol>
                            </div>

                            <h4>🎭 風味特色</h4>
                            <div class="roast-level-card">
                                <p>風味濃郁，常帶有明顯的<strong>果香、甜感和醇厚度</strong>，有時會有<strong>酒香</strong>或發酵感，口感豐富飽滿。</p>
                                <div class="mt-3">
                                    <span class="flavor-badge">濃郁果香</span>
                                    <span class="flavor-badge">甜感飽滿</span>
                                    <span class="flavor-badge">醇厚度高</span>
                                    <span class="flavor-badge">酒香發酵</span>
                                </div>
                            </div>

                            <h4>⚖️ 優缺點分析</h4>
                            <div class="pros-cons">
                                <div class="pros">
                                    <h5>✓ 優點</h5>
                                    <ul>
                                        <li>成本較低，不需要大量的水或昂貴的設備</li>
                                        <li>風味特色明顯，果香濃郁</li>
                                        <li>適合水資源匱乏的地區</li>
                                        <li>保留咖啡櫻桃的天然甜度</li>
                                    </ul>
                                </div>
                                <div class="cons">
                                    <h5>✗ 缺點</h5>
                                    <ul>
                                        <li>品質波動大，受天氣影響</li>
                                        <li>乾燥程度不易控制</li>
                                        <li>容易混入雜質、落葉或昆蟲</li>
                                        <li>需要人力頻繁翻動，耗費人力</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 水洗處理法 -->
                    <div class="tab-pane fade" id="washed" role="tabpanel">
                        <div class="process-card">
                            <h3>💧 水洗處理法 (Washed/Wet Process)</h3>
                            <p class="lead">利用水將咖啡果實的果皮、果肉與果膠層徹底分離，創造乾淨明亮的風味。</p>

                            <h4>📋 處理流程</h4>
                            <div class="process-steps">
                                <ol>
                                    <li><strong>篩選 (Density Sorting)：</strong>將採收的咖啡櫻桃放入水槽，成熟飽滿的果實會下沉，不良果實則上浮，進行初步篩選。</li>
                                    <li><strong>去皮 (Pulping)：</strong>使用去皮機去除大部分果皮和果肉，留下帶有黏質果膠的咖啡豆。</li>
                                    <li><strong>發酵 (Fermentation)：</strong>將帶果膠的咖啡豆浸泡在水槽中發酵（12-72小時），利用微生物分解殘留的果膠。</li>
                                    <li><strong>清洗 (Washing)：</strong>發酵後用清水徹底沖洗，將果膠與發酵菌洗淨。</li>
                                    <li><strong>乾燥 (Drying)：</strong>將洗淨的濕豆鋪在陽光下或使用機器烘乾，直到水分含量達標。</li>
                                    <li><strong>脫殼 (Hulling)：</strong>乾燥後，脫殼機去除剩餘的羊皮層，得到乾淨的生豆。</li>
                                </ol>
                            </div>

                            <h4>🎭 風味特色</h4>
                            <div class="roast-level-card">
                                <p>產生<strong>乾淨、明亮、酸度清晰</strong>的風味，能凸顯咖啡豆本身的產地特色與花果香氣，口感清爽純淨。</p>
                                <div class="mt-3">
                                    <span class="flavor-badge">乾淨明亮</span>
                                    <span class="flavor-badge">酸度清晰</span>
                                    <span class="flavor-badge">花果香氣</span>
                                    <span class="flavor-badge">口感清爽</span>
                                </div>
                            </div>

                            <h4>⚖️ 優缺點分析</h4>
                            <div class="pros-cons">
                                <div class="pros">
                                    <h5>✓ 優點</h5>
                                    <ul>
                                        <li>適合多雨地區</li>
                                        <li>忠實展現咖啡豆的品種特性</li>
                                        <li>風味純淨，酸度明亮</li>
                                        <li>品質穩定，較易控制</li>
                                    </ul>
                                </div>
                                <div class="cons">
                                    <h5>✗ 缺點</h5>
                                    <ul>
                                        <li>耗水量大，處理成本較高</li>
                                        <li>需要較多設備和技術</li>
                                        <li>發酵與清洗不當易產生異味</li>
                                        <li>環境負擔較大</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="alert alert-info mt-4">
                                <strong>🌍 適用產區：</strong>水洗處理法常見於中南美洲等精品咖啡產區，如哥倫比亞、哥斯達黎加、肯亞等地。
                            </div>
                        </div>
                    </div>

                    <!-- 蜜處理法 -->
                    <div class="tab-pane fade" id="honey" role="tabpanel">
                        <div class="process-card">
                            <h3>🍯 蜜處理法 (Honey Process)</h3>
                            <p class="lead">介於水洗與日曬之間的處理法，保留部分果膠層創造甜美風味，如蜜般黏稠甜美。</p>

                            <h4>📋 處理流程</h4>
                            <div class="process-steps">
                                <ol>
                                    <li><strong>採收 & 去皮：</strong>採收成熟咖啡果，用機器去除外層果皮，但保留果肉與果膠層。</li>
                                    <li><strong>日曬乾燥：</strong>帶有果膠層的咖啡豆直接在陽光下曝曬，果膠層吸收濕氣變得黏稠，糖分和酸質滲入豆中。</li>
                                    <li><strong>分級：</strong>依保留果膠比例和乾燥方式，分為黃蜜（少量果膠）、紅蜜（中量）、黑蜜（大量果膠）。</li>
                                </ol>
                            </div>

                            <h4>🎭 風味特色</h4>
                            <div class="roast-level-card">
                                <p>結合水洗的乾淨與日曬的甜感，<strong>酸度低、甜度高</strong>，常帶有蜂蜜、龍眼、芒果等甜美果香，口感豐富，尾韻有發酵感。</p>
                                <div class="mt-3">
                                    <span class="flavor-badge">平衡風味</span>
                                    <span class="flavor-badge">蜂蜜甜感</span>
                                    <span class="flavor-badge">熱帶水果</span>
                                    <span class="flavor-badge">豐富口感</span>
                                </div>

                                <div class="alert alert-warning mt-3">
                                    <strong>💡 命名由來：</strong>名字來自於果膠的黏稠感，而非真的加蜂蜜！
                                </div>
                            </div>

                            <h4>🍯 蜜處理分級比較</h4>
                            <div class="honey-comparison">
                                <div class="honey-card honey-yellow">
                                    <h5>☀️ 黃蜜 Yellow Honey</h5>
                                    <p><strong>果膠保留：</strong>約 25%</p>
                                    <p><strong>日曬時間：</strong>較長</p>
                                    <p><strong>風味：</strong>接近水洗，乾淨度高，酸度明亮</p>
                                </div>

                                <div class="honey-card honey-red">
                                    <h5>🌺 紅蜜 Red Honey</h5>
                                    <p><strong>果膠保留：</strong>約 50%</p>
                                    <p><strong>日曬時間：</strong>適中</p>
                                    <p><strong>風味：</strong>甜感與酸度平衡，最受歡迎</p>
                                </div>

                                <div class="honey-card honey-black">
                                    <h5>🌑 黑蜜 Black Honey</h5>
                                    <p><strong>果膠保留：</strong>100%</p>
                                    <p><strong>日曬時間：</strong>最長</p>
                                    <p><strong>風味：</strong>最甜、最濃郁，發酵程度高</p>
                                </div>
                            </div>

                            <div class="alert alert-success mt-4">
                                <strong>🎯 選購建議：</strong>想要平衡的風味選紅蜜，追求極致甜感選黑蜜，偏好清爽口感選黃蜜。
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
