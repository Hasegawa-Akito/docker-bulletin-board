<template>
<div>
        <div class="row row-cols-1 row-cols-md-1 mb-1 text-center">
            <div class="select_box mb-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 fw-normal">ルーム作成</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">新しくルームを作る</h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>自分の話したい話題のルームを作成しましょう</li>
                            <li>題名 , ジャンルを決めて作成できます</li>
                        </ul>
                        <button type="button" class="w-100 btn btn-lg btn-outline-primary" v-on:click="create_display">作成</button>
                    </div>
                </div>
            </div>
            

            <div class="select_box mb-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 fw-normal">ルーム検索</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">既存ルームに参加する</h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>自分の参加したい話題のルームを探しましょう</li>
                            <li>ルームid , 題名 , ジャンルから検索できます</li>
                        </ul>
                        
                        <button type="button" class="w-100 btn btn-lg btn-outline-success" v-on:click="serch_display">検索</button>
                        
                    </div>
                </div>
            </div>


        </div>
        
        <create-display-component
            v-bind:create_room_url="create_room_url"
            v-bind:csrf="csrf"
        ></create-display-component>

        <serch-display-component
            v-bind:serch_room_url="serch_room_url"
            v-bind:csrf="csrf"
        ></serch-display-component>

    
</div>
</template>

<script>
    
    export default {
        
        data(){
            return{
                Create_Display:"create_display_off",
                Serch_Display:"serch_display_off",
            };
        },
        props: {
            create_room_url:{
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
        methods:{
            create_display:function(){
                this.Create_Display="create_display_off";
                this.Create_Display="create_display_on";
                this.Serch_Display="serch_display_off";
                var element = document.getElementById('create_display_target'); // 移動させたい位置の要素を取得
                var rect = element.getBoundingClientRect();
                var position = rect.top-100;    // 一番上からの位置を取得
                this.scroll(position);
            },
            serch_display:function(){
                this.Serch_Display="serch_display_off";
                this.Create_Display="create_display_off";
                this.Serch_Display="serch_display_on";
                this.scroll(1000000);

            },
            scroll:function(position){
              window.scrollTo({
                          top: position,
                          behavior: "smooth"
              });
            },
        },
        mounted(){
              this.scroll(0);
              
        },
    }
</script>