<template>
    <div class="create-display" v-bind:class="Display">
        <form v-bind:action="create_room_url" method="post" autocomplete='off'>
            <input type="hidden" name="_token" v-bind:value="csrf" >
            <div class="form-group" v-bind:class="Display_show"  id='create_display_target'>
                    <!-- 強制スクロール位置 -->
                <div class="col-12 mb-5 border border-primary">
                    <label class="mt-3">掲示板の題名：</label>
                    <input type="text" class="form-control" v-model="title" placeholder="題名(必須)">
                    <br>
                    <label>カテゴリー：</label>
                    <select class="form-control"  v-model="category">
                        <option v-for="cate in categories" v-bind:key="cate.category">
                            {{cate.category}}
                        </option>
                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary mb-3" v-on:click="not_empty">作成</button>
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
            create_room_url:{
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
                        {category:"指定なし"},
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
                title:"",
                category:"指定なし",
            };
        },
        computed:{
            Display_show:function(){
                
                if(this.Display=="create_display_on"){
                    var element = document.getElementById('create_display_target'); // 移動させたい位置の要素を取得
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
        methods:{
            not_empty:function(event){
                if(this.title==" "||!this.title||this.title=="　"){
                    const ans=alert('タイトルを記入してください');
                    event.preventDefault();
                }
            },
        },
        
    }
</script>