<template>
  <v-app id="inspire">
    <v-card class="mx-auto overflow-hidden">
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
              v-for="card in cards"
              :key="card"
              cols="12"
            >
              <v-card>
                <v-subheader>{{ card }}</v-subheader>

                <v-list two-line>
                  <template v-for="n in 6">
                    <v-list-item

                      :key="n"
                    >
                      

                      <v-list-item-content>
                        <v-list-item-title>
                          <b>っっっっっっっっっっっっっっっっっs</b>
                        </v-list-item-title>

                        <v-list-item-subtitle>
                          <!--改行:style="white-space: pre-wrap;"-->
                          <p style="white-space: pre-wrap;">テスト投稿</p>
                        </v-list-item-subtitle>
                        <small>2021-08-16 22:00</small>
                      </v-list-item-content>
                    </v-list-item>

                    <v-divider
                      v-if="n !== 6"
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
    <v-card>
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
              label="メッセージ ※Enterでも送信できるよ"
              v-model="message"
              clearable
              @keyup.enter="send_onClick"
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
  export default {
    data(){
      return {
        cards: ['Today', 'Yesterday'],
        drawer: null,
        links: [
          ['mdi-inbox-arrow-down', 'Inbox'],
          ['mdi-send', 'Send'],
          ['mdi-delete', 'Trash'],
          ['mdi-alert-octagon', 'Spam'],
        ],
      };
    },
    props: {
            room_id:{
                type:String,
                required:true
            },
            title:{
                type:String,
                required:true
            },
        },

  }
</script>