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
                
                >
                <v-btn icon type="submit">
                    <v-icon>mdi-arrow-left</v-icon>
                </v-btn>
                </v-form>
                
                <v-toolbar-title>
                検索結果
                </v-toolbar-title>
                
            </v-app-bar>

            <v-card-text>
                <v-data-table
                    v-if="true"
                    :headers="headers"
                    :items="desserts"
                    class="elevation-1"
                >
                    <template v-slot:[`item.room_id`]="{ item }">
                        <v-chip
                            :color="'red'"
                            dark
                        >
                            {{ item.room_id }}
                        </v-chip>
                    </template>
                    <template v-slot:[`item.comment_num`]="{ item }">
                        <v-chip
                            :color="'red'"
                            dark
                        >
                            {{ item.comment_num }}
                        </v-chip>
                    </template>
                </v-data-table>
            </v-card-text>
        </v-card>
    </v-app>
</template>

<script>
  export default {
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
        desserts: [
          {
            title: 'あめ',
            room_id: 159,
            category: 6.0,
            comment_num: 24,
            created_at: "2021-1-2",
          },
          {
            title: 'はれ',
            room_id: 159,
            category: 6.0,
            comment_num: 24,
            created_at: "2021-1-4",
          },
          {
            title: 'くもり',
            room_id: 159,
            category: 6.0,
            comment_num: 24,
            created_at: "2021-1-13",
          },
        ],
      }
    },
    
  }
</script>