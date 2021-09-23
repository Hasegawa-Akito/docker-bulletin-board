<template>
    <div class="create-display" v-bind:class="Display">
        <form v-bind:action="serch_room_url" method="post" autocomplete='off'>
            <input type="hidden" name="_token" v-bind:value="csrf" >
            <div class="form-group" v-bind:class="Display_show"  id='serch_display_target'>
                    <!-- 強制スクロール位置 -->
                <div class="col-12 mb-5 border border-success">
                    <label class="mt-3">ルームid：</label>
                    <input type="number" name="room_id" class="form-control" placeholder="指定なし">
                    <br>
                    <label class="mt-3">掲示板の題名：</label>
                    <input type="text" name="title" class="form-control" placeholder="指定なし">
                    <br>
                    <label>カテゴリー：</label>
                    <select class="form-control" name="category">
                        <option value="">
                            指定なし
                        </option>
                        <option v-for="cate in categories" v-bind:key="cate.category">
                            {{cate.category}}
                        </option>
                    </select>
                    <br>
                    <button type="submit" class="btn btn-success mb-3">検索</button>
                    <br>
                </div>         
            </div>
        </form>

    </div>
</template>

<script>
    function scroll(position){
        window.scrollTo({
                        top: position,
                        behavior: "smooth"
        });
    }
    
    export default {
        props: {
            Display:{
                type:String,
                required:true
            },
            serch_room_url:{
                type:String,
                required:true
            },
            csrf:{
                type:String,
                required:true
            },
            
        },
        data(){
            return{
                categories:[
                        {category:"エンターテイメント"},
                        {category:"社会・経済"},
                        {category:"健康・医療"},
                        {category:"動物"},
                        {category:"グルメ"},
                        {category:"育児"},
                        {category:"旅行・観光"},
                        {category:"趣味"},
                        {category:"恋愛・結婚"},
                        {category:"美容"},
                        {category:"スポーツ"},
                        {category:"アウトドア"},
                        {category:"ファッション"},
                        {category:"ゲーム"},
                        {category:"学問・科学"},
                        {category:"芸術・人文"},
                        {category:"IT"},
                        {category:"雑談・日記"},
                        {category:"ニュース"},
                        {category:"その他"},
                    ],
            };
        },
        computed:{
            Display_show:function(){
                
                if(this.Display=="serch_display_on"){
                    var element = document.getElementById('serch_display_target'); // 移動させたい位置の要素を取得
                    var rect = element.getBoundingClientRect();
                    var position = rect.top;    // 一番上からの位置を取得
                    scroll(position);
                    return "on";
                }
                else{
                    return "off";
                }
            }
        },
        
    }
</script>