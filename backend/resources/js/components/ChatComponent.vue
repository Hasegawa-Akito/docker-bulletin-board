<template>
  <v-app id="inspire">
    <v-card class="overflow-hidden">
      <v-app-bar
        color="deep-purple accent-4"
        dark
        prominent
      >
        <v-btn icon>
          <v-icon>mdi-arrow-left</v-icon>
        </v-btn>
        <v-toolbar-title>{{title}}　id:{{room_id}} </v-toolbar-title>
      </v-app-bar>

      <v-card-text>
        <v-main>
          <v-row>
            <v-col
              
              cols="12"
            >
              <v-card>
                

                <v-list two-line>
                  <template v-for="n in content_num">
                    <v-list-item

                      :key="n"
                    >
                      

                      <v-list-item-content>
                        <v-list-item-title>
                          <b>{{contents[n-1].name}}</b>
                        </v-list-item-title>

                        <v-list-item-subtitle>
                          <!--改行:style="white-space: pre-wrap;"-->
                          <p style="white-space: pre-wrap;">{{contents[n-1].message}}</p>
                        </v-list-item-subtitle>
                        <small>{{contents[n-1].updated_at}}</small>
                      </v-list-item-content>
                    </v-list-item>

                    <v-divider
                      v-if="n !== content_num"
                      :key="`divider-${n}`"
                      inset
                    ></v-divider>
                  </template>
                </v-list>
              </v-card>
            </v-col>
          </v-row>
        </v-main>
      </v-card-text>
    </v-card>
    <div class="hidden"></div>
    <v-card class="overflow-hidden">
      <v-card-text class="bottom-fixed" ref="input_box">
        <v-row>
          <v-col cols="3">
            <v-text-field
              label="名前"
              v-model="name"
              clearable
            ></v-text-field>
          </v-col>
          <v-col>
            <v-text-field
              autofocus
              label="メッセージ"
              v-model="message"
              clearable
              
            ></v-text-field>
          </v-col>
        </v-row>
        <v-btn class="info" small @click="send_onClick">
          <v-icon>mdi-play</v-icon>送信
        </v-btn>
      </v-card-text>
    </v-card>
  </v-app>
</template>

<script>

//非同期通信に必要(vueが使えるなら特に他にすることはない)
import axios from 'axios'

  export default {
    data(){
      return {
        name:"匿名希望",
        message:"",
        contents:"",
        content_num:0
      };
    },
    props: {
            room_id:{
                type:Number,
                required:true
            },
            title:{
                type:String,
                required:true
            },
            send_message_url:{
                type:String,
                required:true
            },
            show_content_url:{
                type:String,
                required:true
            },
    },
    methods:{
            send_onClick:function(){
              axios.post(this.send_message_url,{room_id:this.room_id,message:this.message,name:this.name})
                .then((response)=>{
                    this.content_num=response.data.contents.length;
                    this.contents=response.data.contents;
                    this.message="";
                    
                })
            },
            EndScroll:function(){
              window.scrollTo({
                          top: 10000000000,
                          behavior: "smooth"
              });
            },
    },
    created(){
              axios.post(this.show_content_url,{room_id:this.room_id})
                .then((response)=>{
                    this.content_num=response.data.contents.length;
                    this.contents=response.data.contents;
              })
    },
    updated() {
               this.EndScroll();
    },

  }
</script>