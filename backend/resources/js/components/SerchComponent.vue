<template>
    <v-app id="inspire">
        <v-card class="overflow-hidden">
            <v-app-bar
                color="deep-purple accent-4"
                dark
                prominent
            >
                <v-form
                method="get"
                v-bind:action="back_url"
                >
                <v-btn icon type="submit">
                    <v-icon>mdi-home-circle-outline</v-icon>
                </v-btn>
                </v-form>
                
                <v-toolbar-title>
                検索結果
                </v-toolbar-title>

                <v-spacer></v-spacer>
                <v-btn icon @click="reload_onClick">
                  <v-icon>mdi-sync</v-icon>
                </v-btn>
                
            </v-app-bar>

            <v-card-text>
                <v-data-table
                    v-if="true"
                    :headers="headers"
                    :items="desserts"
                    class="elevation-1"
                >
                    <template v-slot:[`item.title`]="{ item }">
                        <a v-bind:href="create_room_url(item.room_id)">
                        　{{ item.title }}
                        </a>
                    </template>
                    <template v-slot:[`item.room_id`]="{ item }">
                        <v-chip
                            :color="'blue'"
                            dark
                        >
                            {{ item.room_id }}
                        </v-chip>
                    </template>
                    
                    <template v-slot:[`item.created_at`]="{ item }">
                          {{ transform_Date(item.created_at) }}
                        
                    </template>
                </v-data-table>
            </v-card-text>
        </v-card>
    </v-app>
</template>

<script>
  export default {
    props: {
            serch_room_id:{
                type:Number,
                required:true
            },
            serch_title:{
                type:String,
                required:true
            },
            serch_category:{
                type:String,
                required:true
            },
            show_serch_url:{
                type:String,
                required:true
            },
            back_url:{
                type:String,
                required:true
            },
            room_url:{
                type:String,
                required:true
            },
            
    },
    data () {
      return {
        headers: [
          {
            text: '題目',
            align: 'start',
            
            value: 'title',
          },
          { text: 'ルームid', value: 'room_id' },
          { text: 'カテゴリー', value: 'category' },
          { text: 'コメント数', value: 'comment_num' },
          { text: '作成日', value: 'created_at' },
        ],
        desserts: [],
      }
    },
    methods:{
            show_serch:function(){
              axios.post(this.show_serch_url,{room_id:this.serch_room_id,
                                              title:this.serch_title,
                                              category:this.serch_category}
                        )
                .then((response)=>{
                    this.desserts=response.data.contents;
              })
            },
            reload_onClick:function(){
                this.desserts=[];
                this.show_serch();
            },
            create_room_url:function(room_id){
                var room_url=this.room_url+"/"+room_id;
                return room_url;
            },
            transform_Date:function(iso){
                var date = new Date(iso);
                return date.toLocaleString();
            },
    },
    created(){
              this.show_serch();
    },
    
    
  }
</script>