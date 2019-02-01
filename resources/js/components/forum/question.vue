<template>
     <v-card class="mt-2">     
        <v-card-title primary-title>
          <div>
            <h3 class="headline mb-0">
                <router-link :to="questionObject.path">
                    {{questionObject.title}}
                </router-link>                
            </h3>
            <div class="grey--text">{{questionObject.user}} said {{questionObject.created_on}}</div>
          </div>
        </v-card-title>
        <v-card-text>
           {{questionObject.body}}
        </v-card-text>
      </v-card>
</template>

<script>
export default {
    props: ['questionObject']
}
</script>

<style>

</style>
