@extends("frontend/layouts/master")

@section('title', 'Home')

@section('content')
    {{-- === 第一區塊：樂野村小農心得分享 === --}}
    <section class="page-section cta">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <div class="cta-inner text-center rounded">
              
              {{-- 1. 主要大標題：樂野村 --}}
              <h2 class="section-heading mb-5">
                <span class="section-heading-upper">From Farm to Cup in Alishan</span>
                <span class="section-heading-lower">樂野村小農心得分享</span>
              </h2>
              
              {{-- --- 鄒築園區塊 --- --}}
              <hr class="my-5" style="border-top: 1px solid rgba(0, 0, 0, 0.1);">
              <h3 class="mt-4 mb-3" style="font-size: 1.8rem; color: #402f23;">
                鄒築園
              </h3>
              
              <div class="text-center mx-auto p-4">
                <p>
                  我們與嘉義阿里山樂野村的優質小農鄒築園緊密合作，確保每一批咖啡豆都來自高山環境、細心照料的莊園。
                </p>
                
                <div class="mb-4">
                    <img src="{{ asset('img/coffee1.jpg') }}" 
                         alt="鄒築園咖啡心得分享" 
                         class="img-fluid rounded shadow-sm" 
                         style="max-width: 80%; height: auto;">
                </div>
                <blockquote class="blockquote my-4 p-3 bg-light rounded shadow-sm" style="max-width: 80%; margin-left: auto; margin-right: auto;">
                    <p class="mb-0">「在阿里山樂野部落裡，我們種植的咖啡豆，每一顆都帶著山嵐的清新與陽光的熱情。從採摘到處理，每一步都充滿了對土地的尊重。品嚐它，就像是感受樂野部落的溫度。」</p>
                </blockquote>
                
                
                <p class="mb-0">
                  <a href="https://www.thecan.com.tw/tw/log/detail/330" target="_blank" class="btn btn-primary">點擊閱讀鄒築園小農完整網誌心得</a>
                </p>
              </div>

              {{-- --- 野牡丹咖啡莊園區塊 --- --}}
              <hr class="my-5" style="border-top: 1px solid rgba(0, 0, 0, 0.1);">
              <h3 class="mt-4 mb-3" style="font-size: 1.8rem; color: #402f23;">
                野牡丹咖啡莊園
              </h3>

              <div class="text-center mx-auto p-4">
                <p>
                  野牡丹咖啡莊園同樣位於阿里山區，致力於推廣台灣咖啡的多元風味，並專注於環境友善的種植方式。
                </p>
                <div class="mb-4">
                    <img src="{{ asset('img/coffee2.jpg') }}" 
                         alt="野牡丹咖啡心得分享" 
                         class="img-fluid rounded shadow-sm" 
                         style="max-width: 80%; height: auto;">
                </div>
                <blockquote class="blockquote my-4 p-3 bg-light rounded shadow-sm" style="max-width: 80%; margin-left: auto; margin-right: auto;">
                    <p class="mb-0">「高山種植雖辛苦，但回饋給我們的是獨特的山頭氣與水果甜感。我們堅信，好的咖啡來自於對土地的愛與永續的承諾。」</p>
                    
                </blockquote>
                
                <p class="mb-0">
                  <a href="https://www.foodnext.net/news/industry/paper/6611124562" target="_blank" class="btn btn-primary">點擊閱讀野牡丹莊園完整新聞報導</a>
                </p>
              </div>
              
              {{-- --- 柏香茗茶 區塊 --- --}}
              <hr class="my-5" style="border-top: 1px solid rgba(0, 0, 0, 0.1);">
              <h3 class="mt-4 mb-3" style="font-size: 1.8rem; color: #402f23;">
                柏香茗茶
              </h3>

              <div class="text-center mx-auto p-4">
                <p>
                  柏香茗茶在阿里山以高品質茶葉聞名，同時也將這份製茶的精緻工藝應用於高山咖啡的後製處理中。
                </p>
                <div class="mb-4">
                    <img src="{{ asset('img/coffee3.jpg') }}" 
                         alt="柏香茗茶咖啡心得分享" 
                         class="img-fluid rounded shadow-sm" 
                         style="max-width: 80%; height: auto;">
                </div>
                <blockquote class="blockquote my-4 p-3 bg-light rounded shadow-sm" style="max-width: 80%; margin-left: auto; margin-right: auto;">
                    <p class="mb-0">「將製茶的細膩融入咖啡，我們追求的是高山氣候下獨有的清香。無論是茶是咖啡，都是阿里山最好的味道。」</p>
                    
                </blockquote>
                
                <p class="mb-0">
                  <a href="https://www.cna.com.tw/postwrite/chi/366268" target="_blank" class="btn btn-primary">點擊閱讀柏香茗茶相關報導</a>
                </p>
              </div>

              {{-- --- 優遊吧斯 瑪翡咖啡莊園 區塊 --- --}}
              <hr class="my-5" style="border-top: 1px solid rgba(0, 0, 0, 0.1);">
              <h3 class="mt-4 mb-3" style="font-size: 1.8rem; color: #402f23;">
                優遊吧斯 瑪翡咖啡莊園
              </h3>

              <div class="text-center mx-auto p-4">
                <p>
                  優遊吧斯是結合鄒族文化與精緻農業的旅遊園區，其瑪翡咖啡莊園提供遊客親身體驗咖啡種植與鄒族風味結合的獨特體驗。
                </p>
                <div class="mb-4">
                    <img src="{{ asset('img/coffee4.jpg') }}" 
                         alt="優遊吧斯瑪翡咖啡莊園咖啡心得分享" 
                         class="img-fluid rounded shadow-sm" 
                         style="max-width: 80%; height: auto;">
                </div>
                <blockquote class="blockquote my-4 p-3 bg-light rounded shadow-sm" style="max-width: 80%; margin-left: auto; margin-right: auto;">
                    <p class="mb-0">「每一顆瑪翡咖啡豆都承載著鄒族的故事。在這裡，咖啡不僅是飲品，更是我們與山林、與傳統連結的橋樑。」</p>
                    
                </blockquote>
                
                <p class="mb-0">
                  <a href="https://www.yuyupastribe.com/" target="_blank" class="btn btn-primary">前往優遊吧斯官網了解更多</a>
                </p>
              </div>

              {{-- --- 鄒讚咖啡 區塊 --- --}}
              <hr class="my-5" style="border-top: 1px solid rgba(0, 0, 0, 0.1);">
              <h3 class="mt-4 mb-3" style="font-size: 1.8rem; color: #402f23;">
                鄒讚咖啡
              </h3>

              <div class="text-center mx-auto p-4">
                <p>
                  鄒讚咖啡以其獨特的「不插電手沖」體驗聞名，提供最純粹、最貼近大自然的咖啡品嚐方式，展現阿里山咖啡的原始魅力。
                </p>
                <div class="mb-4">
                    <img src="{{ asset('img/coffee5.jpg') }}" 
                         alt="鄒讚咖啡心得分享" 
                         class="img-fluid rounded shadow-sm" 
                         style="max-width: 80%; height: auto;">
                </div>
                <blockquote class="blockquote my-4 p-3 bg-light rounded shadow-sm" style="max-width: 80%; margin-left: auto; margin-right: auto;">
                    <p class="mb-0">「不需電力，只需耐心與熱水，就能萃取出阿里山咖啡最真實的層次。這是我們對咖啡工藝最誠摯的堅持。」</p>
                    
                </blockquote>
                
                <p class="mb-0">
                  <a href="https://kaitenslife.pixnet.net/blog/post/404300762" target="_blank" class="btn btn-primary">點擊閱讀鄒讚咖啡相關體驗文章</a>
                </p>
              </div>
              
            </div> {{-- .cta-inner 結束 --}}
          </div>
        </div>
      </div>
    </section>
    
    {{-- === 第二區塊：達邦小農心得分享 === --}}
    <section class="page-section cta">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <div class="cta-inner text-center rounded">
              
              {{-- 1. 達邦村的主要大標題 --}}
              <h2 class="section-heading mb-5">
                <span class="section-heading-upper">From Farm to Cup in Alishan</span>
                <span class="section-heading-lower">達邦小農心得分享</span>
              </h2>
              
              {{-- --- 飲山郁咖啡 區塊 (新增) --- --}}
              <hr class="my-5" style="border-top: 1px solid rgba(0, 0, 0, 0.1);">
              <h3 class="mt-4 mb-3" style="font-size: 1.8rem; color: #402f23;">
                飲山郁咖啡
              </h3>

              <div class="text-center mx-auto p-4">
                <p>
                  飲山郁咖啡坐落於阿里山達邦部落，致力於打造優質的咖啡品嚐體驗，其產品以達邦的高山獨特風味為特色。
                </p>
                <div class="mb-4">
                    <img src="{{ asset('img/coffee6.jpg') }}" 
                         alt="飲山郁咖啡心得分享" 
                         class="img-fluid rounded shadow-sm" 
                         style="max-width: 80%; height: auto;">
                </div>
                <blockquote class="blockquote my-4 p-3 bg-light rounded shadow-sm" style="max-width: 80%; margin-left: auto; margin-right: auto;">
                    <p class="mb-0">「日夜溫差大，雲霧繚繞，達邦獨有的氣候孕育了咖啡豐富的果酸和乾淨度。每一滴咖啡，都充滿了山林最純淨的氣息。」</p>
                    
                </blockquote>
                
                <p class="mb-0">
                  <a href="https://www.justincoffee.com.tw/zh-TW/products/taiwan_alishan_dabang?utm_source" target="_blank" class="btn btn-primary">點擊前往飲山郁咖啡產品介紹</a>
                </p>
              </div>
              
              {{-- --- 七彩琉璃咖啡莊園 區塊 --- --}}
              <hr class="my-5" style="border-top: 1px solid rgba(0, 0, 0, 0.1);">
              <h3 class="mt-4 mb-3" style="font-size: 1.8rem; color: #402f23;">
                七彩琉璃咖啡莊園
              </h3>

              <div class="text-center mx-auto p-4">
                <p>
                  七彩琉璃咖啡莊園致力於林下咖啡，特別在香樟樹下種植，賦予咖啡豆獨特的林間香氣，追求森林系精品咖啡的極致風味。
                </p>
                <div class="mb-4">
                    <img src="{{ asset('img/coffee7.jpg') }}" 
                         alt="七彩琉璃咖啡心得分享" 
                         class="img-fluid rounded shadow-sm" 
                         style="max-width: 80%; height: auto;">
                </div>
                <blockquote class="blockquote my-4 p-3 bg-light rounded shadow-sm" style="max-width: 80%; margin-left: auto; margin-right: auto;">
                    <p class="mb-0">「在香樟樹林中生長的咖啡豆，吸取了森林的芬多精，風味複雜而甜美。每一次品嚐，都是一場森林的饗宴。」</p>
                    
                </blockquote>
                
                <p class="mb-0">
                  <a href="https://www.welcometw.com/%E4%B8%83%E5%BD%A9%E7%90%89%E7%92%83%E7%94%9F%E6%85%8B%E8%BE%B2%E5%9C%92-%E9%A6%99%E6%A8%9F%E6%A8%B9%E4%B8%8B%E7%9A%84%E6%A3%AE%E6%9E%97%E7%B3%BB%E9%99%90%E9%87%8F%E5%92%96%E5%95%A1/?utm_source" target="_blank" class="btn btn-primary">點擊閱讀七彩琉璃莊園相關介紹</a>
                </p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    
    {{-- === 第三區塊：特富也小農心得分享 (新增雅慕伊) === --}}
    <section class="page-section cta">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <div class="cta-inner text-center rounded">
              
              {{-- 1. 特富也村的主要大標題 --}}
              <h2 class="section-heading mb-5">
                <span class="section-heading-upper">From Farm to Cup in Alishan</span>
                <span class="section-heading-lower">特富也小農心得分享</span>
              </h2>
              
              {{-- --- 豆御香藝伎咖啡莊園 區塊 --- --}}
              <hr class="my-5" style="border-top: 1px solid rgba(0, 0, 0, 0.1);">
              <h3 class="mt-4 mb-3" style="font-size: 1.8rem; color: #402f23;">
                豆御香藝伎咖啡莊園
              </h3>

              <div class="text-center mx-auto p-4">
                <p>
                  豆御香藝伎咖啡莊園位於特富野，專注於藝伎等稀有品種的栽種，並以嚴謹的後製工藝，多次在國際競賽中獲得殊榮。
                </p>
                <div class="mb-4">
                    <img src="{{ asset('img/coffee8.jpg') }}" 
                         alt="豆御香藝伎咖啡莊園心得分享" 
                         class="img-fluid rounded shadow-sm" 
                         style="max-width: 80%; height: auto;">
                </div>
                <blockquote class="blockquote my-4 p-3 bg-light rounded shadow-sm" style="max-width: 80%; margin-left: auto; margin-right: auto;">
                    <p class="mb-0">「藝伎咖啡的細膩風味，是我們對品質的承諾。在特富野的環境下，我們讓每一顆咖啡豆都能發揮其極致的潛力。」</p>
                    
                </blockquote>
                
                <p class="mb-0">
                  <a href="https://www.93coffee.tw/products/taiwan-alishan-tefuye-dubang-village-royal-bean-estate-washed-100g-2022pca-champion?utm_source" target="_blank" class="btn btn-primary">點擊前往豆御香產品介紹</a>
                </p>
              </div>
              
              {{-- --- TFU'YA 咖啡莊園 區塊 --- --}}
              <hr class="my-5" style="border-top: 1px solid rgba(0, 0, 0, 0.1);">
              <h3 class="mt-4 mb-3" style="font-size: 1.8rem; color: #402f23;">
                TFU'YA 咖啡莊園
              </h3>

              <div class="text-center mx-auto p-4">
                <p>
                  TFU'YA 咖啡莊園位於阿里山達邦村，由鄒族原住民農職人經營，堅持有機、友善土地的種植方式，將咖啡視為土地的恩賜。
                </p>
                <div class="mb-4">
                    <img src="{{ asset('img/coffee9.jpg') }}" 
                         alt="TFU'YA 咖啡莊園心得分享" 
                         class="img-fluid rounded shadow-sm" 
                         style="max-width: 80%; height: auto;">
                </div>
                <blockquote class="blockquote my-4 p-3 bg-light rounded shadow-sm" style="max-width: 80%; margin-left: auto; margin-right: auto;">
                    <p class="mb-0">「在神木群的庇蔭下，我們的有機咖啡自然生長。每一口咖啡，都帶有山林的靈魂與原住民的熱情。」</p>
                    
                </blockquote>
                
                <p class="mb-0">
                  <a href="https://alishan.welcometw.com/store/info/JEWd?utm_source" target="_blank" class="btn btn-primary">點擊閱讀 TFU'YA 莊園相關介紹</a>
                </p>
              </div>

              {{-- --- 飛鼠咖啡 Peisu Coffee 區塊 --- --}}
              <hr class="my-5" style="border-top: 1px solid rgba(0, 0, 0, 0.1);">
              <h3 class="mt-4 mb-3" style="font-size: 1.8rem; color: #402f23;">
                飛鼠咖啡 Peisu Coffee
              </h3>

              <div class="text-center mx-auto p-4">
                <p>
                  飛鼠咖啡位於阿里山特富野，專注於高品質的精品咖啡，其名稱靈感來自鄒族文化與山林動物，體現與自然的和諧共存。
                </p>
                <div class="mb-4">
                    <img src="{{ asset('img/coffee10.jpg') }}" 
                         alt="飛鼠咖啡心得分享" 
                         class="img-fluid rounded shadow-sm" 
                         style="max-width: 80%; height: auto;">
                </div>
                <blockquote class="blockquote my-4 p-3 bg-light rounded shadow-sm" style="max-width: 80%; margin-left: auto; margin-right: auto;">
                    <p class="mb-0">「就像飛鼠在山林間自由滑翔，我們的咖啡風味也追求輕盈、潔淨的口感。每一顆豆子都是在海拔千米的高山上細心孕育的禮物。」</p>
                    
                </blockquote>
                
                <p class="mb-0">
                  <a href="https://thiskp.com/2022/08/28/peisucoffee/?utm_source" target="_blank" class="btn btn-primary">點擊閱讀飛鼠咖啡相關介紹</a>
                </p>
              </div>
              
              {{-- --- 新增 雅慕伊咖啡莊園 區塊 --- --}}
              <hr class="my-5" style="border-top: 1px solid rgba(0, 0, 0, 0.1);">
              <h3 class="mt-4 mb-3" style="font-size: 1.8rem; color: #402f23;">
                雅慕伊咖啡莊園
              </h3>

              <div class="text-center mx-auto p-4">
                <p>
                  雅慕伊咖啡莊園位於阿里山特富野部落，莊園主雅慕伊·安古雅雅娜將製茶的專業經驗應用於咖啡種植，並榮獲 Q-Grader 認證，致力提供優質的阿里山咖啡。
                </p>
                <div class="mb-4">
                    <img src="{{ asset('img/coffee11.jpg') }}" 
                         alt="雅慕伊咖啡莊園心得分享" 
                         class="img-fluid rounded shadow-sm" 
                         style="max-width: 80%; height: auto;">
                </div>
                <blockquote class="blockquote my-4 p-3 bg-light rounded shadow-sm" style="max-width: 80%; margin-left: auto; margin-right: auto;">
                    <p class="mb-0">「曾經以製茶的決心走出困頓，如今深愛上咖啡獨特誘人的風味。我們將對茶葉的專業與用心，同樣傾注在阿里山咖啡上，為大家提供最優良的風味。」</p>
                </blockquote>
                
                <p class="mb-0">
                  <a href="https://goodmanroaster.tw/products/alisan-yangui?utm_source" target="_blank" class="btn btn-primary">點擊前往雅慕伊咖啡產品介紹</a>
                </p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
